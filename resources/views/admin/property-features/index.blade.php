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

    <!-- Filter Section -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form id="filterForm" class="grid grid-cols-1 md:grid-cols-4 gap-4">
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
            <div class="flex items-end col-span-2">
                <button type="button" id="filterBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg mr-2">
                    <i class="fas fa-search mr-2"></i>Filter
                </button>
                <button type="button" id="resetBtn" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">
                    <i class="fas fa-redo mr-2"></i>Reset
                </button>
            </div>
        </form>
    </div>

    <!-- Property Features Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <table id="property-features-table" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
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
            }
        },
        columns: [
            { data: 'id', name: 'id', width: '60px' },
            { data: 'property_title', name: 'property.title' },
            { data: 'title', name: 'title' },
            { data: 'description', name: 'description' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false, width: '120px', className: 'text-center' }
        ],
        order: [[1, 'asc']], // Order by property
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
            emptyTable: "No property features available",
            processing: '<div class="text-center"><i class="fas fa-spinner fa-spin fa-2x text-blue-500"></i><p class="mt-2">Loading...</p></div>'
        },
        responsive: true,
        autoWidth: false
    });
});

// Filter functionality
$('#filterBtn').on('click', function() {
    window.propertyFeaturesTable.ajax.reload();
});

$('#resetBtn').on('click', function() {
    $('#filter_property').val('');
    $('#filter_title').val('');
    window.propertyFeaturesTable.ajax.reload();
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

function clearErrors() {
    document.querySelectorAll('.error-message').forEach(function(el) {
        el.textContent = '';
    });
}

// Form submission
$('#propertyFeatureForm').on('submit', function(e) {
    e.preventDefault();
    clearErrors();
    
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
        success: function(response) {
            closeModal();
            window.propertyFeaturesTable.ajax.reload();
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
window.editPropertyFeature = function(id, propertyId, title, description) {
    openEditModal(id, propertyId, title, description);
};
</script>
@endpush
