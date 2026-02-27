@extends('admin.layouts.master')

@section('title', 'Sliders')

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
            <h1 class="text-3xl font-bold text-gray-800">Sliders</h1>
            <p class="text-gray-600 mt-1">Manage website sliders</p>
        </div>
        <a href="{{ route('admin.sliders.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg shadow-md transition duration-200 flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Add New Slider
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
        </form>
    </div>

    <!-- Sliders Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <table id="sliders-table" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtitle</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
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
    window.slidersTable = $('#sliders-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('admin.sliders.index') }}",
            data: function(d) {
                d.title = $('#filter_title').val();
                d.is_active = $('#filter_status').val();
            }
        },
        columns: [
            { data: 'id', name: 'id', width: '60px' },
            { data: 'image', name: 'image', orderable: false, searchable: false, width: '120px' },
            { data: 'title', name: 'title' },
            { data: 'subtitle', name: 'subtitle' },
            { data: 'order_column', name: 'order_column', width: '80px' },
            { data: 'status', name: 'status', orderable: false, searchable: false, width: '100px' },
            { data: 'action', name: 'action', orderable: false, searchable: false, width: '120px', className: 'text-center' }
        ],
        order: [[4, 'asc']], // Order by order_column
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

function toggleStatus(id) {
    if (confirm('Are you sure you want to toggle the status?')) {
        fetch(`/admin/sliders/${id}/toggle-status`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.slidersTable.ajax.reload(null, false);
            }
        })
        .catch(error => console.error('Error:', error));
    }
}
</script>
@endpush
