@extends('admin.layouts.master')

@section('title', 'Manage Testimonials')

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Testimonials</h1>
            <p class="text-gray-600 mt-1">Manage client testimonials displayed on the homepage</p>
        </div>
        <button onclick="openCreateModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg shadow-md transition duration-200 flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Add Testimonial
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
                <label class="block text-sm font-medium text-gray-700 mb-2">Client Name</label>
                <input type="text" id="filter_client_name" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Search by name">
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
            <table id="testimonials-table" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
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

<!-- Testimonial Modal -->
<div id="testimonialModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-10 mx-auto p-5 border w-full max-w-xl shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 id="modalTitle" class="text-xl font-bold text-gray-900">Add Testimonial</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="testimonialForm">
            <input type="hidden" id="testimonialId" name="id">
            <input type="hidden" id="formMethod" value="POST">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="client_name" class="block text-sm font-medium text-gray-700 mb-2">Client Name <span class="text-red-500">*</span></label>
                    <input type="text" id="client_name" name="client_name" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <span class="text-red-500 text-sm error-message" id="error-client_name"></span>
                </div>
                <div>
                    <label for="client_designation" class="block text-sm font-medium text-gray-700 mb-2">Designation</label>
                    <input type="text" id="client_designation" name="client_designation"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="e.g. Corporate Director">
                    <span class="text-red-500 text-sm error-message" id="error-client_designation"></span>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Client Photo</label>
                <div class="flex items-center gap-4">
                    <div id="photoPreviewContainer" class="w-16 h-16 rounded-full bg-gray-100 border-2 border-dashed border-gray-300 flex items-center justify-center overflow-hidden cursor-pointer hover:border-blue-400 transition-colors" onclick="document.getElementById('client_photo').click()">
                        <img id="photoPreview" src="" alt="" class="w-full h-full object-cover hidden">
                        <i id="photoPlaceholderIcon" class="fas fa-user text-gray-400 text-xl"></i>
                    </div>
                    <div class="flex-1">
                        <button type="button" onclick="document.getElementById('client_photo').click()" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                            <i class="fas fa-upload mr-2"></i>Upload Photo
                        </button>
                        <p class="text-xs text-gray-400 mt-1">PNG, JPG, WebP up to 1MB</p>
                        <input type="file" id="client_photo" name="client_photo" accept="image/*" class="hidden" onchange="previewPhoto(this)">
                    </div>
                </div>
                <span class="text-red-500 text-sm error-message" id="error-client_photo"></span>
                <div id="currentPhotoInfo" class="hidden mt-2 text-xs text-gray-500 flex items-center gap-2">
                    <i class="fas fa-image text-blue-400"></i>
                    <span>Current photo will be kept if no new file is selected</span>
                </div>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Testimonial Content <span class="text-red-500">*</span></label>
                <textarea id="content" name="content" rows="4" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="What the client said..."></textarea>
                <span class="text-red-500 text-sm error-message" id="error-content"></span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">Rating <span class="text-red-500">*</span></label>
                    <select id="rating" name="rating" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="5">5.0 - Excellent</option>
                        <option value="4.5">4.5 - Great</option>
                        <option value="4">4.0 - Very Good</option>
                        <option value="3.5">3.5 - Good</option>
                        <option value="3">3.0 - Average</option>
                        <option value="2.5">2.5 - Below Average</option>
                        <option value="2">2.0 - Poor</option>
                        <option value="1.5">1.5 - Very Poor</option>
                        <option value="1">1.0 - Terrible</option>
                    </select>
                    <span class="text-red-500 text-sm error-message" id="error-rating"></span>
                </div>
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                    <input type="number" id="sort_order" name="sort_order" value="0" min="0"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <span class="text-red-500 text-sm error-message" id="error-sort_order"></span>
                </div>
            </div>

            <div class="mb-4">
                <label class="flex items-center">
                    <input type="checkbox" id="is_active" name="is_active" value="1" checked
                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-700">Active</span>
                </label>
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
    window.testimonialsTable = $('#testimonials-table').DataTable({
        processing: true, serverSide: true,
        ajax: {
            url: "{{ route('admin.testimonials.index') }}",
            data: function(d) {
                d.client_name = $('#filter_client_name').val();
                d.is_active = $('#filter_status').val();
            }
        },
        columns: [
            { data: 'id', name: 'id', width: '50px' },
            { data: 'client_info', name: 'client_name' },
            { data: 'rating_display', name: 'rating', width: '150px' },
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
            emptyTable: "No testimonials available",
            processing: '<div class="text-center"><i class="fas fa-spinner fa-spin fa-2x text-blue-500"></i><p class="mt-2">Loading...</p></div>'
        },
        responsive: true, autoWidth: false
    });
});

$('#filterBtn').on('click', function() { window.testimonialsTable.ajax.reload(); });
$('#resetBtn').on('click', function() { $('#filter_client_name').val(''); $('#filter_status').val(''); window.testimonialsTable.ajax.reload(); });
$('#filterForm input').on('keypress', function(e) { if (e.which === 13) { e.preventDefault(); $('#filterBtn').click(); } });

function openCreateModal() {
    document.getElementById('modalTitle').textContent = 'Add Testimonial';
    document.getElementById('testimonialForm').reset();
    document.getElementById('testimonialId').value = '';
    document.getElementById('formMethod').value = 'POST';
    document.getElementById('is_active').checked = true;
    document.getElementById('rating').value = '5';
    resetPhotoPreview();
    clearErrors();
    document.getElementById('testimonialModal').classList.remove('hidden');
}

function resetPhotoPreview() {
    document.getElementById('photoPreview').src = '';
    document.getElementById('photoPreview').classList.add('hidden');
    document.getElementById('photoPlaceholderIcon').classList.remove('hidden');
    document.getElementById('currentPhotoInfo').classList.add('hidden');
    document.getElementById('client_photo').value = '';
}

function previewPhoto(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('photoPreview').src = e.target.result;
            document.getElementById('photoPreview').classList.remove('hidden');
            document.getElementById('photoPlaceholderIcon').classList.add('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function closeModal() {
    document.getElementById('testimonialModal').classList.add('hidden');
    document.getElementById('testimonialForm').reset();
    clearErrors();
}

function clearErrors() { document.querySelectorAll('.error-message').forEach(el => el.textContent = ''); }

window.editTestimonial = function(data) {
    document.getElementById('modalTitle').textContent = 'Edit Testimonial';
    document.getElementById('testimonialId').value = data.id;
    document.getElementById('client_name').value = data.client_name;
    document.getElementById('client_designation').value = data.client_designation || '';
    document.getElementById('content').value = data.content;
    document.getElementById('rating').value = data.rating;
    document.getElementById('sort_order').value = data.sort_order || 0;
    document.getElementById('is_active').checked = data.is_active === '1';
    document.getElementById('formMethod').value = 'PUT';
    
    // Show existing photo preview
    resetPhotoPreview();
    if (data.client_photo_url) {
        document.getElementById('photoPreview').src = data.client_photo_url;
        document.getElementById('photoPreview').classList.remove('hidden');
        document.getElementById('photoPlaceholderIcon').classList.add('hidden');
        document.getElementById('currentPhotoInfo').classList.remove('hidden');
    }
    
    clearErrors();
    document.getElementById('testimonialModal').classList.remove('hidden');
};

$('#testimonialForm').on('submit', function(e) {
    e.preventDefault();
    clearErrors();
    const id = $('#testimonialId').val();
    const method = $('#formMethod').val();
    let url = "{{ route('admin.testimonials.store') }}";
    if (method === 'PUT') url = "/admin/testimonials/" + id;
    
    // Use FormData for file upload
    var formData = new FormData(this);
    formData.append('_method', method);
    
    if (!$('#is_active').is(':checked')) {
        formData.delete('is_active');
    }
    
    $.ajax({
        url: url, method: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        success: function(response) { closeModal(); window.testimonialsTable.ajax.reload(); alert(response.message); },
        error: function(xhr) {
            if (xhr.status === 422) { const errors = xhr.responseJSON.errors; for (let field in errors) { $('#error-' + field).text(errors[field][0]); } }
            else { alert('An error occurred. Please try again.'); }
        }
    });
});
</script>
@endpush
