@extends('admin.layouts.master')

@section('title', 'Properties')

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
            <h1 class="text-3xl font-bold text-gray-800">Properties</h1>
            <p class="text-gray-600 mt-1">Manage all properties</p>
        </div>
        <a href="{{ route('admin.properties.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg shadow-md transition duration-200 flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Add New Property
        </a>
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
                <label class="block text-sm font-medium text-gray-700 mb-2">Property Type</label>
                <select name="property_type_id" id="filter_property_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">All Types</option>
                    @foreach($propertyTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Business Type</label>
                <select name="business_type_id" id="filter_business_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">All Types</option>
                    @foreach($businessTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">State</label>
                <select name="state_id" id="filter_state" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">All States</option>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="status" id="filter_status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">All Status</option>
                    <option value="available">Available</option>
                    <option value="sold">Sold</option>
                    <option value="rented">Rented</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Featured</label>
                <select name="is_featured" id="filter_featured" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">All</option>
                    <option value="1">Featured Only</option>
                    <option value="0">Non-Featured</option>
                </select>
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

    <!-- Properties Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <table id="properties-table" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Business</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Featured</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                </tbody>
            </table>
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
    window.propertiesTable = $('#properties-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.properties.index') }}",
            data: function(d) {
                d.title = $('#filter_title').val();
                d.property_type_id = $('#filter_property_type').val();
                d.business_type_id = $('#filter_business_type').val();
                d.state_id = $('#filter_state').val();
                d.status = $('#filter_status').val();
                d.is_featured = $('#filter_featured').val();
            }
        },
        columns: [
            { data: 'image', name: 'image', orderable: false, searchable: false, width: '80px' },
            { data: 'title', name: 'title' },
            { data: 'property_type', name: 'propertyType.name' },
            { data: 'business_type', name: 'businessType.name' },
            { data: 'location', name: 'location', orderable: false },
            { data: 'price_display', name: 'price' },
            { data: 'status_badge', name: 'status' },
            { data: 'featured', name: 'is_featured', orderable: false, searchable: false, width: '80px', className: 'text-center' },
            { data: 'action', name: 'action', orderable: false, searchable: false, width: '120px', className: 'text-center' }
        ],
        order: [[1, 'asc']], // Order by title
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
            emptyTable: "No properties available",
            processing: '<div class="text-center"><i class="fas fa-spinner fa-spin fa-2x text-blue-500"></i><p class="mt-2">Loading...</p></div>'
        },
        responsive: true,
        autoWidth: false
    });
});

// Filter functionality
$('#filterBtn').on('click', function() {
    window.propertiesTable.ajax.reload();
});

$('#resetBtn').on('click', function() {
    $('#filter_title').val('');
    $('#filter_property_type').val('');
    $('#filter_business_type').val('');
    $('#filter_state').val('');
    $('#filter_status').val('');
    $('#filter_featured').val('');
    window.propertiesTable.ajax.reload();
});

// Allow Enter key to trigger filter
$('#filterForm input').on('keypress', function(e) {
    if (e.which === 13) {
        e.preventDefault();
        $('#filterBtn').click();
    }
});

// Toggle featured status
window.toggleFeatured = function(id, checkbox) {
    $.ajax({
        url: '/admin/properties/' + id + '/toggle-featured',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function(response) {
            console.log('Featured status updated');
        },
        error: function() {
            checkbox.checked = !checkbox.checked;
            alert('Failed to update featured status');
        }
    });
};
</script>
@endpush
