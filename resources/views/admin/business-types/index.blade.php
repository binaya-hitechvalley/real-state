@extends('admin.layouts.master')

@section('title', 'Business Types')

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
            <h1 class="text-3xl font-bold text-gray-800">Business Types</h1>
            <p class="text-gray-600 mt-1">Manage business types</p>
        </div>
        <button onclick="openCreateModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg shadow-md transition duration-200 flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Add New Business Type
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

    <!-- Filter Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form id="filterForm" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                <input type="text" name="name" id="filter_name" value="{{ request('name') }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Search by name">
            </div>
            <div class="flex items-end">
                <button type="button" id="filterBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg mr-2">
                    <i class="fas fa-search mr-2"></i>Filter
                </button>
                <button type="button" id="resetBtn" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">
                    <i class="fas fa-redo mr-2"></i>Reset
                </button>
            </div>
        </form>
    </div>

    <!-- Business Types Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <table id="business-types-table" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
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

<!-- Business Type Modal -->
<div id="businessTypeModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 id="modalTitle" class="text-xl font-bold text-gray-900">Add Business Type</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="businessTypeForm">
            <input type="hidden" id="businessTypeId" name="id">
            <input type="hidden" id="formMethod" value="POST">
            
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name <span class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <span class="text-red-500 text-sm error-message" id="error-name"></span>
            </div>

            <div class="mb-4">
                <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
                <input type="text" id="slug" name="slug"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Auto-generated from name">
                <span class="text-red-500 text-sm error-message" id="error-slug"></span>
                <p class="text-xs text-gray-500 mt-1">Leave blank to auto-generate from name</p>
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
    window.businessTypesTable = $('#business-types-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.business-types.index') }}",
            data: function(d) {
                d.name = $('#filter_name').val();
            }
        },
        columns: [
            { data: 'id', name: 'id', width: '60px' },
            { data: 'name', name: 'name' },
            { data: 'slug', name: 'slug' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false, width: '120px', className: 'text-center' }
        ],
        order: [[1, 'asc']], // Order by name
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
            emptyTable: "No business types available",
            processing: '<div class="text-center"><i class="fas fa-spinner fa-spin fa-2x text-blue-500"></i><p class="mt-2">Loading...</p></div>'
        },
        responsive: true,
        autoWidth: false
    });
});

// Filter functionality
$('#filterBtn').on('click', function() {
    window.businessTypesTable.ajax.reload();
});

$('#resetBtn').on('click', function() {
    $('#filter_name').val('');
    window.businessTypesTable.ajax.reload();
});

// Allow Enter key to trigger filter
$('#filterForm input').on('keypress', function(e) {
    if (e.which === 13) {
        e.preventDefault();
        $('#filterBtn').click();
    }
});

// Modal Functions
function openCreateModal() {
    document.getElementById('modalTitle').textContent = 'Add Business Type';
    document.getElementById('businessTypeForm').reset();
    document.getElementById('businessTypeId').value = '';
    document.getElementById('formMethod').value = 'POST';
    clearErrors();
    document.getElementById('businessTypeModal').classList.remove('hidden');
}

function openEditModal(id, name, slug) {
    document.getElementById('modalTitle').textContent = 'Edit Business Type';
    document.getElementById('businessTypeId').value = id;
    document.getElementById('name').value = name;
    document.getElementById('slug').value = slug;
    document.getElementById('formMethod').value = 'PUT';
    clearErrors();
    document.getElementById('businessTypeModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('businessTypeModal').classList.add('hidden');
    document.getElementById('businessTypeForm').reset();
    clearErrors();
}

function clearErrors() {
    document.querySelectorAll('.error-message').forEach(function(el) {
        el.textContent = '';
    });
}

// Form submission
$('#businessTypeForm').on('submit', function(e) {
    e.preventDefault();
    clearErrors();
    
    const id = $('#businessTypeId').val();
    const method = $('#formMethod').val();
    let url = "{{ route('admin.business-types.store') }}";
    
    if (method === 'PUT') {
        url = "/admin/business-types/" + id;
    }
    
    $.ajax({
        url: url,
        method: 'POST',
        data: $(this).serialize() + '&_method=' + method,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function(response) {
            closeModal();
            window.businessTypesTable.ajax.reload();
            // Show success message
            alert(response.message);
        },
        error: function(xhr) {
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                for (let field in errors) {
                    $('#error-' + field).text(errors[field][0]);
                }
            } else {
                alert('An error occurred. Please try again.');
            }
        }
    });
});

// Global function for edit button
window.editBusinessType = function(id, name, slug) {
    openEditModal(id, name, slug);
};
</script>
@endpush
