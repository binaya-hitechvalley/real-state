@extends('admin.layouts.master')

@section('title', 'Sliders')

@push('styles')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
<!-- SortableJS for drag and drop -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.css">
<style>
.sortable-ghost {
    opacity: 0.4;
    background: #f0f9ff;
}
.sortable-drag {
    opacity: 0.9;
}
.drag-handle {
    cursor: move;
    color: #6b7280;
}
.drag-handle:hover {
    color: #374151;
}
.image-preview-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.9);
}
.image-preview-content {
    position: relative;
    margin: 5% auto;
    padding: 20px;
    width: 90%;
    max-width: 800px;
}
.image-preview-img {
    max-width: 100%;
    max-height: 70vh;
    margin: 0 auto;
    display: block;
}
.close-preview {
    position: absolute;
    top: 10px;
    right: 25px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
}
.close-preview:hover {
    color: #bbb;
}
.bulk-actions {
    display: none;
}
.status-toggle {
    transition: all 0.3s ease;
}
.status-toggle.loading {
    opacity: 0.5;
    pointer-events: none;
}
</style>
@endpush

@section('content')
<div class="container mx-auto">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Sliders</h1>
            <p class="text-gray-600 mt-1">Manage website sliders</p>
        </div>
        <div class="flex space-x-3">
            <button id="bulkActionsBtn" class="bulk-actions bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg shadow-md transition duration-200 flex items-center">
                <i class="fas fa-tasks mr-2"></i>
                Bulk Actions
            </button>
            <a href="{{ route('admin.sliders.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg shadow-md transition duration-200 flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Add New Slider
            </a>
        </div>
    </div>

    <!-- Bulk Actions Panel -->
    <div id="bulkActionsPanel" class="bulk-actions bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6" style="display: none;">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <span class="text-sm font-medium text-yellow-800">
                    <span id="selectedCount">0</span> items selected
                </span>
                <button id="bulkActivate" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm">
                    <i class="fas fa-check mr-1"></i>Activate
                </button>
                <button id="bulkDeactivate" class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded text-sm">
                    <i class="fas fa-times mr-1"></i>Deactivate
                </button>
                <button id="bulkDelete" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded text-sm">
                    <i class="fas fa-trash mr-1"></i>Delete
                </button>
            </div>
            <button id="clearSelection" class="text-gray-600 hover:text-gray-800 text-sm">
                Clear Selection
            </button>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert">
        <div class="flex">
            <i class="fas fa-check-circle mr-3 mt-1"></i>
            <p>{{ session('success') }}</p>
        </div>
    </div>
    @endif

    <!-- Filter Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form id="filterForm" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                <input type="text" name="title" id="filter_title" value="{{ request('title') }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Search by title">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="is_active" id="filter_status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">All Status</option>
                    <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="button" id="filterBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg mr-2">
                    <i class="fas fa-search mr-2"></i>Filter
                </button>
                <button type="button" id="resetBtn" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">
                    <i class="fas fa-redo mr-2"></i>Reset
                </button>
            </div>
            <div class="flex items-end">
                <label class="flex items-center">
                    <input type="checkbox" id="enableBulkSelect" class="mr-2">
                    <span class="text-sm text-gray-700">Enable Bulk Selection</span>
                </label>
            </div>
        </form>
    </div>

    <!-- Sliders Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <table id="sliders-table" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="bulk-select-header px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" style="display: none;">
                            <input type="checkbox" id="selectAll" class="bulk-checkbox">
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtitle</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="sortable-tbody">
                </tbody>
            </table>
        </div>
    </div>

    <!-- Image Preview Modal -->
    <div id="imagePreviewModal" class="image-preview-modal">
        <div class="image-preview-content">
            <span class="close-preview">&times;</span>
            <img id="previewImage" class="image-preview-img" src="" alt="">
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<!-- SortableJS for drag and drop -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

<script>
$(document).ready(function() {
    let sortable;
    let bulkSelectEnabled = false;
    let selectedItems = new Set();

    // Initialize DataTable
    window.slidersTable = $('#sliders-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.sliders.index') }}",
            data: function(d) {
                d.title = $('#filter_title').val();
                d.is_active = $('#filter_status').val();
            },
            complete: function() {
                initializeDragDrop();
                initializeBulkSelection();
                initializeImagePreview();
            }
        },
        columns: [
            { 
                data: 'bulk_select', 
                name: 'bulk_select', 
                orderable: false, 
                searchable: false, 
                width: '40px',
                className: 'bulk-select-column',
                visible: false
            },
            { data: 'id', name: 'id', width: '60px' },
            { data: 'drag_handle', name: 'drag_handle', orderable: false, searchable: false, width: '50px' },
            { data: 'image', name: 'image', orderable: false, searchable: false, width: '120px' },
            { data: 'title', name: 'title' },
            { data: 'subtitle', name: 'subtitle' },
            { data: 'status', name: 'status', orderable: false, searchable: false, width: '100px' },
            { data: 'action', name: 'action', orderable: false, searchable: false, width: '150px', className: 'text-center' }
        ],
        order: [[1, 'asc']], // Order by ID initially
        pageLength: 15,
        lengthMenu: [[10, 15, 25, 50, 100, -1], [10, 15, 25, 50, 100, 'All']],
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'excel',
                text: '<i class="fas fa-file-excel mr-1"></i> Excel',
                className: 'bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded'
            },
            {
                extend: 'csv',
                text: '<i class="fas fa-file-csv mr-1"></i> CSV',
                className: 'bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded'
            },
            {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf mr-1"></i> PDF',
                className: 'bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded'
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print mr-1"></i> Print',
                className: 'bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded'
            }
        ],
        language: {
            emptyTable: "No sliders available",
            processing: '<div class="text-center"><i class="fas fa-spinner fa-spin fa-2x text-blue-500"></i><p class="mt-2">Loading...</p></div>'
        },
        responsive: true,
        autoWidth: false
    });

    // Initialize drag and drop
    function initializeDragDrop() {
        if (sortable) {
            sortable.destroy();
        }
        
        const tbody = document.getElementById('sortable-tbody');
        if (tbody) {
            sortable = Sortable.create(tbody, {
                handle: '.drag-handle',
                animation: 150,
                ghostClass: 'sortable-ghost',
                dragClass: 'sortable-drag',
                onEnd: function(evt) {
                    updateSliderOrder();
                }
            });
        }
    }

    // Update slider order
    function updateSliderOrder() {
        const rows = document.querySelectorAll('#sortable-tbody tr');
        const order = [];
        
        rows.forEach((row, index) => {
            const sliderId = row.getAttribute('data-slider-id');
            if (sliderId) {
                order.push(sliderId);
            }
        });

        if (order.length > 0) {
            fetch("{{ route('admin.sliders.update-order') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ order: order })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.slidersTable.ajax.reload(null, false);
                }
            })
            .catch(error => console.error('Error updating order:', error));
        }
    }

    // Bulk selection functionality
    function initializeBulkSelection() {
        // Handle individual checkboxes
        $('.bulk-checkbox-item').off('change').on('change', function() {
            const sliderId = $(this).data('slider-id');
            if ($(this).is(':checked')) {
                selectedItems.add(sliderId);
            } else {
                selectedItems.delete(sliderId);
            }
            updateBulkActionsUI();
        });

        // Handle select all checkbox
        $('#selectAll').off('change').on('change', function() {
            const isChecked = $(this).is(':checked');
            $('.bulk-checkbox-item').prop('checked', isChecked);
            
            if (isChecked) {
                $('.bulk-checkbox-item').each(function() {
                    selectedItems.add($(this).data('slider-id'));
                });
            } else {
                selectedItems.clear();
            }
            updateBulkActionsUI();
        });
    }

    // Update bulk actions UI
    function updateBulkActionsUI() {
        const count = selectedItems.size;
        $('#selectedCount').text(count);
        
        if (count > 0) {
            $('#bulkActionsPanel').show();
        } else {
            $('#bulkActionsPanel').hide();
        }
    }

    // Toggle bulk selection mode
    $('#enableBulkSelect').on('change', function() {
        bulkSelectEnabled = $(this).is(':checked');
        
        if (bulkSelectEnabled) {
            $('.bulk-select-column, .bulk-select-header').show();
            window.slidersTable.column(0).visible(true);
        } else {
            $('.bulk-select-column, .bulk-select-header').hide();
            window.slidersTable.column(0).visible(false);
            selectedItems.clear();
            updateBulkActionsUI();
        }
    });

    // Bulk action handlers
    $('#bulkActivate').on('click', function() {
        performBulkAction('activate');
    });

    $('#bulkDeactivate').on('click', function() {
        performBulkAction('deactivate');
    });

    $('#bulkDelete').on('click', function() {
        if (confirm(`Are you sure you want to delete ${selectedItems.size} slider(s)?`)) {
            performBulkAction('delete');
        }
    });

    $('#clearSelection').on('click', function() {
        selectedItems.clear();
        $('.bulk-checkbox-item, #selectAll').prop('checked', false);
        updateBulkActionsUI();
    });

    // Perform bulk action
    function performBulkAction(action) {
        const ids = Array.from(selectedItems);
        
        fetch(`/admin/sliders/bulk-${action}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ ids: ids })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.slidersTable.ajax.reload();
                selectedItems.clear();
                $('.bulk-checkbox-item, #selectAll').prop('checked', false);
                updateBulkActionsUI();
            }
        })
        .catch(error => console.error('Error performing bulk action:', error));
    }

    // Image preview functionality
    function initializeImagePreview() {
        $('.image-preview').off('click').on('click', function(e) {
            e.preventDefault();
            const imageUrl = $(this).data('image-url');
            $('#previewImage').attr('src', imageUrl);
            $('#imagePreviewModal').show();
        });
    }

    // Close image preview
    $('.close-preview, #imagePreviewModal').on('click', function(e) {
        if (e.target === this) {
            $('#imagePreviewModal').hide();
        }
    });

    // Enhanced status toggle with loading state
    window.toggleStatus = function(id) {
        const button = event.target.closest('button');
        $(button).addClass('loading');
        
        fetch(`/admin/sliders/${id}/toggle-status`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            console.log('Response status:', response.status);
            return response.json();
        })
        .then(data => {
            console.log('Response data:', data);
            if (data.success) {
                window.slidersTable.ajax.reload(null, false);
            } else {
                alert(data.message || 'Error updating status');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Network error occurred while updating status');
        })
        .finally(() => {
            $(button).removeClass('loading');
        });
    };

    // Real-time search functionality
    let searchTimeout;
    $('#filter_title').on('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(function() {
            window.slidersTable.ajax.reload();
        }, 500);
    });

    $('#filter_status').on('change', function() {
        window.slidersTable.ajax.reload();
    });

    // Filter functionality
    $('#filterBtn').on('click', function() {
        window.slidersTable.ajax.reload();
    });

    $('#resetBtn').on('click', function() {
        $('#filter_title').val('');
        $('#filter_status').val('');
        window.slidersTable.ajax.reload();
    });

    // Allow Enter key to trigger filter
    $('#filterForm input').on('keypress', function(e) {
        if (e.which === 13) {
            e.preventDefault();
            $('#filterBtn').click();
        }
    });
});
</script>
@endpush
