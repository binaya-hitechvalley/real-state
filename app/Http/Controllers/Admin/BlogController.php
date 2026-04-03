<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Services\Admin\BlogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    protected BlogService $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dataTable = new \App\DataTables\BlogsDataTable();
            return $dataTable->dataTable();
        }
        
        return view('admin.blogs.index');
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(BlogRequest $request)
    {
        $data = $request->validated();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('blogs', $fileName, 'public');
            $data['image_url'] = '/storage/blogs/' . $fileName;
        }
        
        unset($data['image']);
        
        $this->blogService->create($data);
        
        return redirect()->route('admin.blogs.index')->with('success', 'Blog post created successfully.');
    }

    public function edit(int $id)
    {
        $blog = $this->blogService->find($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(BlogRequest $request, int $id)
    {
        $blog = $this->blogService->find($id);
        $data = $request->validated();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old uploaded image if it's a local file
            if ($blog->image_url && str_starts_with($blog->image_url, '/storage/blogs/')) {
                $oldPath = str_replace('/storage/', '', $blog->image_url);
                Storage::disk('public')->delete($oldPath);
            }
            
            $file = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('blogs', $fileName, 'public');
            $data['image_url'] = '/storage/blogs/' . $fileName;
        }
        
        unset($data['image']);
        
        $this->blogService->update($blog, $data);
        
        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy(int $id)
    {
        $blog = $this->blogService->find($id);
        
        // Delete uploaded image
        if ($blog->image_url && str_starts_with($blog->image_url, '/storage/blogs/')) {
            $oldPath = str_replace('/storage/', '', $blog->image_url);
            Storage::disk('public')->delete($oldPath);
        }
        
        $this->blogService->delete($blog);
        return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted successfully.');
    }
}
