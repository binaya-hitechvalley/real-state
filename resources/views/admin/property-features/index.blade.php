@extends('admin.layouts.master')

@section('title', 'Property Features')

@push('styles')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('content')
<div class="container mx-auto">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Property Features</h1>
            <p class="text-gray-600 mt-1">Manage property features</p>
        </div>
        <button onclick="openCreateModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg shadow-md transition duration-200 flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Add New Feature
        </button>
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

    <!-- Advanced Filter Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Advanced Filters</h3>
            <button type="button" id="toggleAdvancedFilters" class="text-blue-600 hover:text-blue-800 text-sm">
                <i class="fas fa-chevron-down mr-1"></i>Show More
            </button>
        </div>
        
        <form id="filterForm" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Property</label>
                    <select name="property_id" id="filter_property" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">All Properties</option>
                        @foreach($properties as $property)
                            <option value="{{ $property->id }}">{{ $property->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" name="title" id="filter_title" value="{{ request('title') }}" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Search by title">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Global Search</label>
                    <input type="text" name="search" id="filter_search" value="{{ request('search') }}" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Search all fields">
                </div>
                <div class="flex items-end">
                    <button type="button" id="filterBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg mr-2">
                        <i class="fas fa-search mr-2"></i>Filter
                    </button>
                    <button type="button" id="resetBtn" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">
                        <i class="fas fa-redo mr-2"></i>Reset
                    </button>
                </div>
            </div>
            
            <!-- Advanced Filters (Hidden by default) -->
            <div id="advancedFilters" class="hidden">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-4 border-t">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Date From</label>
                        <input type="date" name="date_from" id="filter_date_from" value="{{ request('date_from') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Date To</label>
                        <input type="date" name="date_to" id="filter_date_to" value="{{ request('date_to') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Sort By</label>
                        <select name="sort_by" id="sort_by" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Created Date</option>
                            <option value="title" {{ request('sort_by') == 'title' ? 'selected' : '' }}>Title</option>
                            <option value="id" {{ request('sort_by') == 'id' ? 'selected' : '' }}>ID</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Bulk Actions -->
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <label class="flex items-center">
                    <input type="checkbox" id="selectAll" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-700">Select All</span>
                </label>
                <span id="selectedCount" class="text-sm text-gray-600">0 selected</span>
                
                <div id="bulkActions" class="hidden flex items-center space-x-2">
                    <button type="button" id="bulkDeleteBtn" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm">
                        <i class="fas fa-trash mr-1"></i>Delete Selected
                    </button>
                    <button type="button" id="bulkUpdateBtn" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
                        <i class="fas fa-edit mr-1"></i>Update Selected
                    </button>
                </div>
            </div>
            
            <div class="text-sm text-gray-600">
                <span id="recordCount">Loading...</span>
            </div>
        </div>
    </div>

    <!-- Property Features Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <table id="property-features-table" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left">
                            <input type="checkbox" id="headerCheckbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Property</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Property Feature Modal -->
<div id="propertyFeatureModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 id="modalTitle" class="text-xl font-bold text-gray-900">Add Property Feature</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="propertyFeatureForm">
            <input type="hidden" id="propertyFeatureId" name="id">
            <input type="hidden" id="formMethod" value="POST">
            
            <div class="mb-4">
                <label for="property_id" class="block text-sm font-medium text-gray-700 mb-2">Property <span class="text-red-500">*</span></label>
                <select id="property_id" name="property_id" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Select Property</option>
                    @foreach($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->title }}</option>
                    @endforeach
                </select>
                <span class="text-red-500 text-sm error-message" id="error-property_id"></span>
            </div>

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                <input type="text" id="title" name="title" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <span class="text-red-500 text-sm error-message" id="error-title"></span>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                <span class="text-red-500 text-sm error-message" id="error-description"></span>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                    Cancel
                </button>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    <i class="fas fa-save mr-2"></i>Save
                </button>
            </div>
        </form>
    </div>
</div>

<!-- View Feature Modal -->
<div id="viewFeatureModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-gray-900">Property Feature Details</h3>
            <button onclick="closeViewModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div id="featureDetails" class="space-y-3">
            <!-- Content will be loaded dynamically -->
        </div>
        <div class="flex justify-end mt-6">
            <button onclick="closeViewModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                Close
            </button>
        </div>
    </div>
</div>

<!-- Bulk Update Modal -->
<div id="bulkUpdateModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-gray-900">Update Selected Features</h3>
            <button onclick="closeBulkUpdateModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="bulkUpdateForm">
            <div class="mb-4">
                <label for="bulk_property_id" class="block text-sm font-medium text-gray-700 mb-2">Property</label>
                <select id="bulk_property_id" name="property_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Keep Current Property</option>
                    @foreach($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeBulkUpdateModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                    Cancel
                </button>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">
                    <i class="fas fa-save mr-2"></i>Update Selected
                </button>
            </div>
        </form>
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

<script>
$(document).ready(function() {
    // Initialize DataTable
    window.propertyFeaturesTable = $('#property-features-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.property-features.index') }}",
            data: function(d) {
                d.property_id = $('#filter_property').val();
                d.title = $('#filter_title').val();
                d.search = $('#filter_search').val();
                d.date_from = $('#filter_date_from').val();
                d.date_to = $('#filter_date_to').val();
                d.sort_by = $('#sort_by').val();
            }
        },
        columns: [
            { 
                data: 'id', 
                name: 'id', 
                width: '40px',
                orderable: false,
                searchable: false,
                render: function(data, type, row) {
                    return '<input type="checkbox" class="row-checkbox rounded border-gray-300 text-blue-600 focus:ring-blue-500" value="' + data + '">';
                }
            },
            { data: 'id', name: 'id', width: '60px' },
            { data: 'property_title', name: 'property.title' },
            { data: 'title', name: 'title' },
            { data: 'description', name: 'description' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false, width: '180px', className: 'text-center' }
        ],
        order: [[5, 'desc']], // Order by created_at desc
        pageLength: 15,
        lengthMenu: [[10, 15, 25, 50, 100, -1], [10, 15, 25, 50, 100, 'All']],
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'excel',
                text: '<i class="fas fa-file-excel mr-1"></i> Excel',
                className: 'bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'csv',
                text: '<i class="fas fa-file-csv mr-1"></i> CSV',
                className: 'bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf mr-1"></i> PDF',
                className: 'bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded text-sm',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print mr-1"></i> Print',
                className: 'bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded text-sm',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5]
                }
            }
        ],
        language: {
            emptyTable: "No property features available",
            processing: '<div class="text-center"><i class="fas fa-spinner fa-spin fa-2x text-blue-500"></i><p class="mt-2">Loading...</p></div>'
        },
        responsive: true,
        autoWidth: false,
        initComplete: function() {
            updateRecordCount();
        },
        drawCallback: function() {
            updateRecordCount();
            updateSelectedCount();
        }
    });
});

// Filter functionality
$('#filterBtn').on('click', function() {
    window.propertyFeaturesTable.ajax.reload();
});

$('#resetBtn').on('click', function() {
    $('#filter_property').val('');
    $('#filter_title').val('');
    $('#filter_search').val('');
    $('#filter_date_from').val('');
    $('#filter_date_to').val('');
    $('#sort_by').val('created_at');
    window.propertyFeaturesTable.ajax.reload();
});

// Toggle advanced filters
$('#toggleAdvancedFilters').on('click', function() {
    $('#advancedFilters').toggleClass('hidden');
    $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
    $(this).html($(this).html().replace('Show More', 'Show Less').replace('Show Less', 'Show More'));
});

// Allow Enter key to trigger filter
$('#filterForm input, #filterForm select').on('keypress', function(e) {
    if (e.which === 13) {
        e.preventDefault();
        $('#filterBtn').click();
    }
});

// Bulk actions functionality
$(document).on('change', '.row-checkbox', function() {
    updateSelectedCount();
});

$('#headerCheckbox').on('change', function() {
    $('.row-checkbox').prop('checked', $(this).prop('checked'));
    updateSelectedCount();
});

$('#selectAll').on('change', function() {
    $('.row-checkbox').prop('checked', $(this).prop('checked'));
    $('#headerCheckbox').prop('checked', $(this).prop('checked'));
    updateSelectedCount();
});

function updateSelectedCount() {
    const selectedCount = $('.row-checkbox:checked').length;
    $('#selectedCount').text(selectedCount + ' selected');
    
    if (selectedCount > 0) {
        $('#bulkActions').removeClass('hidden');
    } else {
        $('#bulkActions').addClass('hidden');
    }
}

function updateRecordCount() {
    const info = window.propertyFeaturesTable.page.info();
    $('#recordCount').text('Showing ' + info.start + ' to ' + info.end + ' of ' + info.recordsTotal + ' entries');
}

// Bulk delete
$('#bulkDeleteBtn').on('click', function() {
    const selectedIds = $('.row-checkbox:checked').map(function() {
        return $(this).val();
    }).get();
    
    if (selectedIds.length === 0) {
        showNotification('Please select at least one item to delete.', 'error');
        return;
    }
    
    if (confirm('Are you sure you want to delete ' + selectedIds.length + ' property features?')) {
        $.ajax({
            url: "{{ route('admin.property-features.bulk-delete') }}",
            method: 'POST',
            data: {
                ids: selectedIds,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                showNotification(response.message, 'success');
                window.propertyFeaturesTable.ajax.reload();
                $('#selectAll').prop('checked', false);
                $('#headerCheckbox').prop('checked', false);
            },
            error: function(xhr) {
                showNotification('An error occurred. Please try again.', 'error');
            }
        });
    }
});

// Bulk update
$('#bulkUpdateBtn').on('click', function() {
    const selectedIds = $('.row-checkbox:checked').map(function() {
        return $(this).val();
    }).get();
    
    if (selectedIds.length === 0) {
        showNotification('Please select at least one item to update.', 'error');
        return;
    }
    
    $('#bulkUpdateModal').removeClass('hidden');
});

$('#bulkUpdateForm').on('submit', function(e) {
    e.preventDefault();
    
    const selectedIds = $('.row-checkbox:checked').map(function() {
        return $(this).val();
    }).get();
    
    $.ajax({
        url: "{{ route('admin.property-features.bulk-update') }}",
        method: 'POST',
        data: $(this).serialize() + '&ids=' + selectedIds.join(',') + '&_token={{ csrf_token() }}',
        success: function(response) {
            showNotification(response.message, 'success');
            closeBulkUpdateModal();
            window.propertyFeaturesTable.ajax.reload();
            $('#selectAll').prop('checked', false);
            $('#headerCheckbox').prop('checked', false);
        },
        error: function(xhr) {
            showNotification('An error occurred. Please try again.', 'error');
        }
    });
});

// Modal Functions
function openCreateModal() {
    document.getElementById('modalTitle').textContent = 'Add Property Feature';
    document.getElementById('propertyFeatureForm').reset();
    document.getElementById('propertyFeatureId').value = '';
    document.getElementById('formMethod').value = 'POST';
    clearErrors();
    document.getElementById('propertyFeatureModal').classList.remove('hidden');
}

function openEditModal(id, propertyId, title, description) {
    document.getElementById('modalTitle').textContent = 'Edit Property Feature';
    document.getElementById('propertyFeatureId').value = id;
    document.getElementById('property_id').value = propertyId;
    document.getElementById('title').value = title;
    document.getElementById('description').value = description;
    document.getElementById('formMethod').value = 'PUT';
    clearErrors();
    document.getElementById('propertyFeatureModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('propertyFeatureModal').classList.add('hidden');
    document.getElementById('propertyFeatureForm').reset();
    clearErrors();
}

function closeViewModal() {
    document.getElementById('viewFeatureModal').classList.add('hidden');
}

function closeBulkUpdateModal() {
    document.getElementById('bulkUpdateModal').classList.add('hidden');
    document.getElementById('bulkUpdateForm').reset();
}

function clearErrors() {
    document.querySelectorAll('.error-message').forEach(function(el) {
        el.textContent = '';
    });
}

// View feature details
function viewPropertyFeature(id) {
    $.ajax({
        url: `/admin/property-features/${id}/details`,
        method: 'GET',
        success: function(response) {
            const data = response.data;
            const detailsHtml = `
                <div class="space-y-3">
                    <div>
                        <label class="text-sm font-medium text-gray-600">ID:</label>
                        <p class="text-gray-900">${data.id}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-600">Property:</label>
                        <p class="text-gray-900">${data.property}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-600">Title:</label>
                        <p class="text-gray-900">${data.title}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-600">Description:</label>
                        <p class="text-gray-900">${data.description || '-'}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-600">Created:</label>
                        <p class="text-gray-900">${data.created_at}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-600">Updated:</label>
                        <p class="text-gray-900">${data.updated_at}</p>
                    </div>
                </div>
            `;
            
            document.getElementById('featureDetails').innerHTML = detailsHtml;
            document.getElementById('viewFeatureModal').classList.remove('hidden');
        },
        error: function(xhr) {
            showNotification('Failed to load feature details.', 'error');
        }
    });
}

// Notification function
function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transform transition-all duration-300 ${
        type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
    }`;
    notification.innerHTML = `
        <div class="flex items-center">
            <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'} mr-2"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    // Auto remove after 3 seconds
    setTimeout(() => {
        notification.style.opacity = '0';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Form submission with validation
$('#propertyFeatureForm').on('submit', function(e) {
    e.preventDefault();
    clearErrors();
    
    // Client-side validation
    let isValid = true;
    
    // Validate property selection
    if (!$('#property_id').val()) {
        $('#error-property_id').text('Please select a property.');
        isValid = false;
    }
    
    // Validate title
    if (!$('#title').val().trim()) {
        $('#error-title').text('Title is required.');
        isValid = false;
    } else if ($('#title').val().trim().length > 150) {
        $('#error-title').text('Title must not exceed 150 characters.');
        isValid = false;
    }
    
    if (!isValid) {
        return false;
    }
    
    const id = $('#propertyFeatureId').val();
    const method = $('#formMethod').val();
    let url = "{{ route('admin.property-features.store') }}";
    
    if (method === 'PUT') {
        url = "/admin/property-features/" + id;
    }
    
    $.ajax({
        url: url,
        method: 'POST',
        data: $(this).serialize() + '&_method=' + method,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        beforeSend: function() {
            // Show loading state
            $('button[type="submit"]').prop('disabled', true).html('<i class="fas fa-spinner fa-spin mr-2"></i>Saving...');
        },
        success: function(response) {
            closeModal();
            window.propertyFeaturesTable.ajax.reload();
            // Show success message
            showNotification(response.message, 'success');
        },
        error: function(xhr) {
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                for (let field in errors) {
                    $('#error-' + field).text(errors[field][0]);
                }
            } else {
                showNotification('An error occurred. Please try again.', 'error');
            }
        },
        complete: function() {
            // Reset button state
            $('button[type="submit"]').prop('disabled', false).html('<i class="fas fa-save mr-2"></i>Save');
        }
    });
});

// Global function for edit button
window.editPropertyFeature = function(id, propertyId, title, description) {
    openEditModal(id, propertyId, title, description);
};

</script>
@endpush
