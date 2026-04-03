@extends('admin.layouts.master')

@section('title', 'Create Blog Post')

@push('styles')
<style>
    .ck-editor__editable_inline { min-height: 350px !important; border: 1px solid #d1d5db !important; border-radius: 0 0 8px 8px !important; }
    .ck.ck-toolbar { border-radius: 8px 8px 0 0 !important; }
    .seo-preview { background: #fff; border: 1px solid #e5e7eb; border-radius: 8px; padding: 16px; }
    .seo-preview .seo-title { color: #1a0dab; font-size: 18px; line-height: 1.3; margin-bottom: 4px; cursor: pointer; }
    .seo-preview .seo-url { color: #006621; font-size: 14px; margin-bottom: 4px; }
    .seo-preview .seo-desc { color: #545454; font-size: 13px; line-height: 1.5; }
    .char-count { font-size: 12px; color: #9ca3af; }
    .char-count.warning { color: #f59e0b; }
    .char-count.danger { color: #ef4444; }
</style>
@endpush

@section('content')
<div class="container mx-auto max-w-5xl">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Create Blog Post</h1>
            <p class="text-gray-600 mt-1">Write a new blog post with SEO-optimized content</p>
        </div>
        <a href="{{ route('admin.blogs.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg shadow-md transition duration-200 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to List
        </a>
    </div>

    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content Column -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Title & Slug -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4"><i class="fas fa-pen-fancy text-blue-500 mr-2"></i>Post Details</h3>
                    
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-lg @error('title') border-red-500 @enderror"
                            placeholder="Enter an engaging blog title"
                            oninput="updateSeoPreview(); generateSlug()">
                        @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                            Slug 
                            <span class="text-xs text-gray-400">(auto-generated from title)</span>
                        </label>
                        <div class="flex items-center">
                            <span class="px-3 py-3 bg-gray-100 border border-r-0 border-gray-300 rounded-l-lg text-sm text-gray-500">/blogs/</span>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-r-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('slug') border-red-500 @enderror"
                                placeholder="auto-generated-slug"
                                oninput="updateSeoPreview()">
                        </div>
                        @error('slug')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Excerpt</label>
                        <textarea name="excerpt" id="excerpt" rows="3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('excerpt') border-red-500 @enderror"
                            placeholder="A short summary that appears on blog cards (max 500 chars)">{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Content - CKEditor -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4"><i class="fas fa-file-alt text-blue-500 mr-2"></i>Content</h3>
                    <textarea name="content" id="content">{{ old('content') }}</textarea>
                    @error('content')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- SEO Section -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800"><i class="fas fa-search text-green-500 mr-2"></i>SEO Settings</h3>
                        <button type="button" onclick="toggleSeoSection()" class="text-sm text-blue-600 hover:text-blue-800">
                            <i class="fas fa-chevron-down" id="seoToggleIcon"></i> Toggle
                        </button>
                    </div>
                    
                    <div id="seoSection">
                        <!-- Google Preview -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-500 mb-2">Google Search Preview</label>
                            <div class="seo-preview">
                                <div class="seo-title" id="seoPreviewTitle">Blog Title - Your Site Name</div>
                                <div class="seo-url" id="seoPreviewUrl">{{ url('/blogs') }}/your-slug</div>
                                <div class="seo-desc" id="seoPreviewDesc">Your meta description will appear here. Write a compelling description to improve click-through rates from search engines.</div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">
                                Meta Title 
                                <span class="char-count" id="metaTitleCount">0/60</span>
                            </label>
                            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('meta_title') border-red-500 @enderror"
                                placeholder="SEO title (leave empty to use post title)"
                                oninput="updateCharCount('meta_title', 60); updateSeoPreview()"
                                maxlength="255">
                            @error('meta_title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">
                                Meta Description 
                                <span class="char-count" id="metaDescCount">0/160</span>
                            </label>
                            <textarea name="meta_description" id="meta_description" rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('meta_description') border-red-500 @enderror"
                                placeholder="Compelling description for search engines (recommended: 120-160 chars)"
                                oninput="updateCharCount('meta_description', 160); updateSeoPreview()"
                                maxlength="500">{{ old('meta_description') }}</textarea>
                            @error('meta_description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="meta_keywords" class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('meta_keywords') border-red-500 @enderror"
                                placeholder="real estate, nepal, property investment (comma separated)">
                            @error('meta_keywords')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Column -->
            <div class="space-y-6">
                <!-- Publish Settings -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4"><i class="fas fa-cog text-gray-500 mr-2"></i>Publish</h3>
                    
                    <div class="mb-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm font-medium text-gray-700">Active</span>
                        </label>
                        <p class="text-xs text-gray-500 ml-6">Uncheck to save as draft</p>
                    </div>

                    <div class="mb-4">
                        <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">Publish Date</label>
                        <input type="date" name="published_at" id="published_at" value="{{ old('published_at', date('Y-m-d')) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('published_at') border-red-500 @enderror">
                        @error('published_at')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                        <input type="text" name="category" id="category" value="{{ old('category') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('category') border-red-500 @enderror"
                            placeholder="e.g. Invest, Legal, Tips">
                        @error('category')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('sort_order') border-red-500 @enderror">
                        @error('sort_order')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4"><i class="fas fa-image text-purple-500 mr-2"></i>Featured Image</h3>
                    
                    <div id="imageUploadArea" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors cursor-pointer" onclick="document.getElementById('image').click()">
                        <div id="imagePreviewContainer" class="hidden mb-3">
                            <img id="imagePreview" src="" alt="Preview" class="mx-auto max-h-48 rounded-lg object-cover">
                            <button type="button" class="mt-2 text-xs text-red-500 hover:text-red-700" onclick="event.stopPropagation(); removeImage()">
                                <i class="fas fa-trash mr-1"></i>Remove
                            </button>
                        </div>
                        <div id="imagePlaceholder">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                            <p class="text-sm text-gray-500 font-medium">Click to upload</p>
                            <p class="text-xs text-gray-400 mt-1">PNG, JPG, GIF, WebP up to 2MB</p>
                        </div>
                        <input type="file" id="image" name="image" accept="image/*" class="hidden" onchange="previewImage(this)">
                    </div>
                    @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="space-y-3">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition duration-200">
                            <i class="fas fa-save mr-2"></i>Publish Post
                        </button>
                        <a href="{{ route('admin.blogs.index') }}" class="block w-full text-center bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-medium transition duration-200">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    // Initialize CKEditor
    ClassicEditor
        .create(document.querySelector('#content'), {
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'underline', 'strikethrough', '|',
                    'fontSize', 'fontColor', '|',
                    'bulletedList', 'numberedList', '|',
                    'alignment', '|',
                    'link', 'blockQuote', 'insertTable', '|',
                    'imageUpload', 'mediaEmbed', '|',
                    'undo', 'redo', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' }
                ]
            },
            placeholder: 'Start writing your blog content here...',
            language: 'en'
        })
        .catch(error => { console.error(error); });

    // Slug generation
    function generateSlug() {
        const title = document.getElementById('title').value;
        const slug = title.toLowerCase()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_]+/g, '-')
            .replace(/^-+|-+$/g, '');
        document.getElementById('slug').value = slug;
        updateSeoPreview();
    }

    // Image preview
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('imagePreviewContainer').classList.remove('hidden');
                document.getElementById('imagePlaceholder').classList.add('hidden');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeImage() {
        document.getElementById('image').value = '';
        document.getElementById('imagePreviewContainer').classList.add('hidden');
        document.getElementById('imagePlaceholder').classList.remove('hidden');
    }

    // SEO Preview
    function updateSeoPreview() {
        const title = document.getElementById('title').value;
        const metaTitle = document.getElementById('meta_title').value;
        const metaDesc = document.getElementById('meta_description').value;
        const slug = document.getElementById('slug').value;

        document.getElementById('seoPreviewTitle').textContent = (metaTitle || title || 'Blog Title') + ' - Sapphire Investment';
        document.getElementById('seoPreviewUrl').textContent = '{{ url("/blogs") }}/' + (slug || 'your-slug');
        document.getElementById('seoPreviewDesc').textContent = metaDesc || 'Your meta description will appear here. Write a compelling description to improve click-through rates.';
    }

    function updateCharCount(fieldId, maxRecommended) {
        const field = document.getElementById(fieldId);
        const count = field.value.length;
        let countId = fieldId === 'meta_title' ? 'metaTitleCount' : 'metaDescCount';
        const el = document.getElementById(countId);
        el.textContent = count + '/' + maxRecommended;
        el.className = 'char-count' + (count > maxRecommended ? ' danger' : (count > maxRecommended * 0.9 ? ' warning' : ''));
    }

    function toggleSeoSection() {
        const section = document.getElementById('seoSection');
        const icon = document.getElementById('seoToggleIcon');
        section.classList.toggle('hidden');
        icon.classList.toggle('fa-chevron-down');
        icon.classList.toggle('fa-chevron-up');
    }
</script>
@endpush
