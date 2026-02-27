<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Services\Admin\SliderService;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected SliderService $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    /**
     * Display a listing of sliders.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dataTable = new \App\DataTables\SlidersDataTable();
            return $dataTable->dataTable();
        }
        
        return view('admin.sliders.index');
    }

    /**
     * Show the form for creating a new slider.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created slider in storage.
     */
    public function store(SliderRequest $request)
    {
        $this->sliderService->create($request->validated());
        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully.');
    }

    /**
     * Display the specified slider.
     */
    public function show(int $id)
    {
        $slider = $this->sliderService->find($id);
        return view('admin.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified slider.
     */
    public function edit(int $id)
    {
        $slider = $this->sliderService->find($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified slider in storage.
     */
    public function update(SliderRequest $request, int $id)
    {
        $slider = $this->sliderService->find($id);
        $this->sliderService->update($slider, $request->validated());
        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully.');
    }

    /**
     * Remove the specified slider from storage.
     */
    public function destroy(int $id)
    {
        $slider = $this->sliderService->find($id);
        $this->sliderService->delete($slider);
        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully.');
    }

    /**
     * Toggle slider active status.
     */
    public function toggleStatus(int $id)
    {
        $slider = $this->sliderService->find($id);
        $this->sliderService->toggleStatus($slider);
        return response()->json(['success' => true, 'message' => 'Status updated successfully.']);
    }

    /**
     * Update order of sliders.
     */
    public function updateOrder(Request $request)
    {
        $this->sliderService->updateOrder($request->input('order', []));
        return response()->json(['success' => true, 'message' => 'Order updated successfully.']);
    }
}
