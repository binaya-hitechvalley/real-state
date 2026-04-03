<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Services\Admin\FaqService;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    protected FaqService $faqService;

    public function __construct(FaqService $faqService)
    {
        $this->faqService = $faqService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dataTable = new \App\DataTables\FaqsDataTable();
            return $dataTable->dataTable();
        }
        
        return view('admin.faqs.index');
    }

    public function store(FaqRequest $request)
    {
        $data = $request->validated();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        
        $this->faqService->create($data);
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'FAQ created successfully.'
            ]);
        }
        
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully.');
    }

    public function update(FaqRequest $request, int $id)
    {
        $faq = $this->faqService->find($id);
        $data = $request->validated();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        
        $this->faqService->update($faq, $data);
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'FAQ updated successfully.'
            ]);
        }
        
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy(int $id)
    {
        $faq = $this->faqService->find($id);
        $this->faqService->delete($faq);
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}
