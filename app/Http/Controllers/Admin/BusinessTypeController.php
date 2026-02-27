<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BusinessTypeRequest;
use App\Services\Admin\BusinessTypeService;
use Illuminate\Http\Request;

class BusinessTypeController extends Controller
{
    protected BusinessTypeService $businessTypeService;

    public function __construct(BusinessTypeService $businessTypeService)
    {
        $this->businessTypeService = $businessTypeService;
    }

    /**
     * Display a listing of business types.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dataTable = new \App\DataTables\BusinessTypesDataTable();
            return $dataTable->dataTable();
        }
        
        return view('admin.business-types.index');
    }

    /**
     * Store a newly created business type in storage.
     */
    public function store(BusinessTypeRequest $request)
    {
        $this->businessTypeService->create($request->validated());
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Business type created successfully.'
            ]);
        }
        
        return redirect()->route('admin.business-types.index')->with('success', 'Business type created successfully.');
    }

    /**
     * Update the specified business type in storage.
     */
    public function update(BusinessTypeRequest $request, int $id)
    {
        $businessType = $this->businessTypeService->find($id);
        $this->businessTypeService->update($businessType, $request->validated());
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Business type updated successfully.'
            ]);
        }
        
        return redirect()->route('admin.business-types.index')->with('success', 'Business type updated successfully.');
    }

    /**
     * Remove the specified business type from storage.
     */
    public function destroy(int $id)
    {
        $businessType = $this->businessTypeService->find($id);
        $this->businessTypeService->delete($businessType);
        return redirect()->route('admin.business-types.index')->with('success', 'Business type deleted successfully.');
    }
}
