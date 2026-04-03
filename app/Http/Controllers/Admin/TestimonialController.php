<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TestimonialRequest;
use App\Services\Admin\TestimonialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    protected TestimonialService $testimonialService;

    public function __construct(TestimonialService $testimonialService)
    {
        $this->testimonialService = $testimonialService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dataTable = new \App\DataTables\TestimonialsDataTable();
            return $dataTable->dataTable();
        }
        
        return view('admin.testimonials.index');
    }

    public function store(TestimonialRequest $request)
    {
        $data = $request->validated();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        
        // Handle photo upload
        if ($request->hasFile('client_photo')) {
            $file = $request->file('client_photo');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('testimonials', $fileName, 'public');
            $data['client_photo_url'] = '/storage/testimonials/' . $fileName;
        }
        
        unset($data['client_photo']);
        
        $this->testimonialService->create($data);
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Testimonial created successfully.'
            ]);
        }
        
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function update(TestimonialRequest $request, int $id)
    {
        $testimonial = $this->testimonialService->find($id);
        $data = $request->validated();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        
        // Handle photo upload
        if ($request->hasFile('client_photo')) {
            // Delete old uploaded photo if it's a local file
            if ($testimonial->client_photo_url && str_starts_with($testimonial->client_photo_url, '/storage/testimonials/')) {
                $oldPath = str_replace('/storage/', '', $testimonial->client_photo_url);
                Storage::disk('public')->delete($oldPath);
            }
            
            $file = $request->file('client_photo');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('testimonials', $fileName, 'public');
            $data['client_photo_url'] = '/storage/testimonials/' . $fileName;
        }
        
        unset($data['client_photo']);
        
        $this->testimonialService->update($testimonial, $data);
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Testimonial updated successfully.'
            ]);
        }
        
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(int $id)
    {
        $testimonial = $this->testimonialService->find($id);
        
        // Delete uploaded photo
        if ($testimonial->client_photo_url && str_starts_with($testimonial->client_photo_url, '/storage/testimonials/')) {
            $oldPath = str_replace('/storage/', '', $testimonial->client_photo_url);
            Storage::disk('public')->delete($oldPath);
        }
        
        $this->testimonialService->delete($testimonial);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
