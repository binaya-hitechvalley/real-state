@extends('admin.layouts.master')

@section('title', 'Manage FAQs')

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">FAQs</h1>
            <p class="text-gray-600 mt-1">Manage frequently asked questions displayed on the homepage</p>
        </div>
        <button onclick="openCreateModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg shadow-md transition duration-200 flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Add FAQ
        </button>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert">
        <div class="flex">
            <i class="fas fa-check-circle mr-3 mt-1"></i>
            <p>{{ session('success') }}</p>
        </div>
    </div>
    @endif

    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form id="filterForm" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Question</label>
                <input type="text" id="filter_question" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Search by question">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select id="filter_status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">All</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
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

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <table id="faqs-table" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Question</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Answer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200"></tbody>
            </table>
        </div>
    </div>
</div>

<!-- FAQ Modal -->
<div id="faqModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-full max-w-xl shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 id="modalTitle" class="text-xl font-bold text-gray-900">Add FAQ</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="faqForm">
            <input type="hidden" id="faqId" name="id">
            <input type="hidden" id="formMethod" value="POST">
            
            <div class="mb-4">
                <label for="question" class="block text-sm font-medium text-gray-700 mb-2">Question <span class="text-red-500">*</span></label>
                <input type="text" id="question" name="question" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="e.g. How do I buy a property?">
                <span class="text-red-500 text-sm error-message" id="error-question"></span>
            </div>

            <div class="mb-4">
                <label for="answer" class="block text-sm font-medium text-gray-700 mb-2">Answer <span class="text-red-500">*</span></label>
                <textarea id="answer" name="answer" rows="5" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Provide a detailed answer..."></textarea>
                <span class="text-red-500 text-sm error-message" id="error-answer"></span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                    <input type="number" id="sort_order" name="sort_order" value="0" min="0"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <span class="text-red-500 text-sm error-message" id="error-sort_order"></span>
                </div>
                <div class="flex items-end pb-2">
                    <label class="flex items-center">
                        <input type="checkbox" id="is_active" name="is_active" value="1" checked
                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-700">Active</span>
                    </label>
                </div>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">Cancel</button>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg"><i class="fas fa-save mr-2"></i>Save</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script>
$(document).ready(function() {
    window.faqsTable = $('#faqs-table').DataTable({
        processing: true, serverSide: true,
        ajax: {
            url: "{{ route('admin.faqs.index') }}",
            data: function(d) {
                d.question = $('#filter_question').val();
                d.is_active = $('#filter_status').val();
            }
        },
        columns: [
            { data: 'id', name: 'id', width: '50px' },
            { data: 'question', name: 'question' },
            { data: 'short_answer', name: 'answer' },
            { data: 'status', name: 'is_active', width: '80px' },
            { data: 'sort_order', name: 'sort_order', width: '70px' },
            { data: 'action', name: 'action', orderable: false, searchable: false, width: '100px', className: 'text-center' }
        ],
        order: [[4, 'asc']],
        pageLength: 15,
        dom: 'Blfrtip',
        buttons: [
            { extend: 'excel', text: '<i class="fas fa-file-excel mr-1"></i> Excel', className: 'bg-green-600 text-white px-4 py-2 rounded' },
            { extend: 'pdf', text: '<i class="fas fa-file-pdf mr-1"></i> PDF', className: 'bg-red-600 text-white px-4 py-2 rounded' }
        ],
        language: {
            emptyTable: "No FAQs available",
            processing: '<div class="text-center"><i class="fas fa-spinner fa-spin fa-2x text-blue-500"></i><p class="mt-2">Loading...</p></div>'
        },
        responsive: true, autoWidth: false
    });
});

$('#filterBtn').on('click', function() { window.faqsTable.ajax.reload(); });
$('#resetBtn').on('click', function() { $('#filter_question').val(''); $('#filter_status').val(''); window.faqsTable.ajax.reload(); });
$('#filterForm input').on('keypress', function(e) { if (e.which === 13) { e.preventDefault(); $('#filterBtn').click(); } });

function openCreateModal() {
    document.getElementById('modalTitle').textContent = 'Add FAQ';
    document.getElementById('faqForm').reset();
    document.getElementById('faqId').value = '';
    document.getElementById('formMethod').value = 'POST';
    document.getElementById('is_active').checked = true;
    clearErrors();
    document.getElementById('faqModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('faqModal').classList.add('hidden');
    document.getElementById('faqForm').reset();
    clearErrors();
}

function clearErrors() { document.querySelectorAll('.error-message').forEach(el => el.textContent = ''); }

window.editFaq = function(data) {
    document.getElementById('modalTitle').textContent = 'Edit FAQ';
    document.getElementById('faqId').value = data.id;
    document.getElementById('question').value = data.question;
    document.getElementById('answer').value = data.answer;
    document.getElementById('sort_order').value = data.sort_order || 0;
    document.getElementById('is_active').checked = data.is_active === '1';
    document.getElementById('formMethod').value = 'PUT';
    clearErrors();
    document.getElementById('faqModal').classList.remove('hidden');
};

$('#faqForm').on('submit', function(e) {
    e.preventDefault();
    clearErrors();
    const id = $('#faqId').val();
    const method = $('#formMethod').val();
    let url = "{{ route('admin.faqs.store') }}";
    if (method === 'PUT') url = "/admin/faqs/" + id;
    
    $.ajax({
        url: url, method: 'POST',
        data: $(this).serialize() + '&_method=' + method,
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        success: function(response) { closeModal(); window.faqsTable.ajax.reload(); alert(response.message); },
        error: function(xhr) {
            if (xhr.status === 422) { const errors = xhr.responseJSON.errors; for (let field in errors) { $('#error-' + field).text(errors[field][0]); } }
            else { alert('An error occurred. Please try again.'); }
        }
    });
});
</script>
@endpush
