@extends('admin.layouts.master')

@section('title', 'Property Types')

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
            <h1 class="text-3xl font-bold text-gray-800">Property Types</h1>
            <p class="text-gray-600 mt-1">Manage property types</p>
        </div>
        <button onclick="openCreateModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg shadow-md transition duration-200 flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Add New Property Type
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

    <!-- Property Types Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <table id="property-types-table" class="min-w-full divide-y divide-gray-200">
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

    <!-- Create/Edit Modal -->
    <div id="propertyTypeModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-md bg-white">
            <div class="flex justify-between items-center pb-3 border-b">
                <h3 id="modalTitle" class="text-xl font-semibold text-gray-900">Add Property Type</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <form id="propertyTypeForm" class="mt-4">
                <input type="hidden" id="propertyTypeId" name="id">
                <input type="hidden" id="formMethod" value="POST">
                
                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                        name="name" 
                        id="name" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Enter property type name"
                        required>
                    <span class="text-red-500 text-xs hidden" id="nameError"></span>
                </div>

                <!-- Slug -->
                <div class="mb-4">
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                        Slug <span class="text-gray-500 text-xs">(Optional - Auto-generated from name)</span>
                    </label>
                    <input type="text" 
                        name="slug" 
                        id="slug" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="property-type-slug">
                    <p class="text-xs text-gray-500 mt-1">Leave empty to auto-generate from name</p>
                    <span class="text-red-500 text-xs hidden" id="slugError"></span>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-3 pt-4 border-t">
                    <button type="button" onclick="closeModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">
                        Cancel
                    </button>
                    <button type="submit" id="submitBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                        <i class="fas fa-save mr-2"></i>
                        <span id="submitBtnText">Create</span>
                    </button>
                </div>
            </form>
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

<script>
$(document).ready(function() {
    // Initialize DataTable
    window.propertyTypesTable = $('#property-types-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.property-types.index') }}",
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
            emptyTable: "No property types available",
            processing: '<div class="text-center"><i class="fas fa-spinner fa-spin fa-2x text-blue-500"></i><p class="mt-2">Loading...</p></div>'
        },
        responsive: true,
        autoWidth: false
    });
});

// Filter functionality
$('#filterBtn').on('click', function() {
    window.propertyTypesTable.ajax.reload();
});

$('#resetBtn').on('click', function() {
    $('#filter_name').val('');
    window.propertyTypesTable.ajax.reload();
});

// Allow Enter key to trigger filter
$('#filterForm input').on('keypress', function(e) {
    if (e.which === 13) {
        e.preventDefault();
        $('#filterBtn').click();
    }
});

// Modal functions
function openCreateModal() {
    $('#modalTitle').text('Add Property Type');
    $('#submitBtnText').text('Create');
    $('#formMethod').val('POST');
    $('#propertyTypeId').val('');
    $('#propertyTypeForm')[0].reset();
    clearErrors();
    $('#propertyTypeModal').removeClass('hidden');
}

function openEditModal(id, name, slug) {
    $('#modalTitle').text('Edit Property Type');
    $('#submitBtnText').text('Update');
    $('#formMethod').val('PUT');
    $('#propertyTypeId').val(id);
    $('#name').val(name);
    $('#slug').val(slug);
    clearErrors();
    $('#propertyTypeModal').removeClass('hidden');
}

function closeModal() {
    $('#propertyTypeModal').addClass('hidden');
    $('#propertyTypeForm')[0].reset();
    clearErrors();
}

function clearErrors() {
    $('#nameError').addClass('hidden').text('');
    $('#slugError').addClass('hidden').text('');
    $('#name').removeClass('border-red-500');
    $('#slug').removeClass('border-red-500');
}

// Form submission
$('#propertyTypeForm').on('submit', function(e) {
    e.preventDefault();
    clearErrors();
    
    const formData = {
        name: $('#name').val(),
        slug: $('#slug').val() || null,
        _token: '{{ csrf_token() }}'
    };
    
    const method = $('#formMethod').val();
    const id = $('#propertyTypeId').val();
    let url = '{{ route("admin.property-types.store") }}';
    
    if (method === 'PUT') {
        url = `/admin/property-types/${id}`;
        formData._method = 'PUT';
    }
    
    $('#submitBtn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin mr-2"></i>Saving...');
    
    $.ajax({
        url: url,
        method: 'POST',
        data: formData,
        success: function(response) {
            closeModal();
            window.propertyTypesTable.ajax.reload(null, false);
            
            // Show success message
            const successMsg = $('<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert"><div class="flex"><i class="fas fa-check-circle mr-3 mt-1"></i><p>' + response.message + '</p></div></div>');
            $('.container').prepend(successMsg);
            setTimeout(() => successMsg.fadeOut(() => successMsg.remove()), 3000);
        },
        error: function(xhr) {
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                if (errors.name) {
                    $('#nameError').removeClass('hidden').text(errors.name[0]);
                    $('#name').addClass('border-red-500');
                }
                if (errors.slug) {
                    $('#slugError').removeClass('hidden').text(errors.slug[0]);
                    $('#slug').addClass('border-red-500');
                }
            } else {
                alert('An error occurred. Please try again.');
            }
        },
        complete: function() {
            $('#submitBtn').prop('disabled', false).html('<i class="fas fa-save mr-2"></i><span id="submitBtnText">' + $('#submitBtnText').text() + '</span>');
        }
    });
});

// Make edit function globally accessible
window.editPropertyType = function(id, name, slug) {
    openEditModal(id, name, slug);
};

// Close modal on outside click
$('#propertyTypeModal').on('click', function(e) {
    if (e.target.id === 'propertyTypeModal') {
        closeModal();
    }
});
</script>
@endpush
