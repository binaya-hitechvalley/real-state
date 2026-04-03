<?php

namespace App\DataTables;

use App\Models\Faq;
use Yajra\DataTables\Facades\DataTables;

class FaqsDataTable
{
    public function dataTable()
    {
        $query = Faq::query();

        if ($question = request('question')) {
            $query->where('question', 'like', '%' . $question . '%');
        }

        if (request('is_active') !== null && request('is_active') !== '') {
            $query->where('is_active', request('is_active'));
        }

        return DataTables::eloquent($query)
            ->addColumn('status', function (Faq $faq) {
                return $faq->is_active
                    ? '<span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Active</span>'
                    : '<span class="px-2 py-1 text-xs bg-red-100 text-red-800 rounded-full">Inactive</span>';
            })
            ->addColumn('short_answer', function (Faq $faq) {
                return '<span title="' . e($faq->answer) . '">' . e(\Illuminate\Support\Str::limit($faq->answer, 80)) . '</span>';
            })
            ->addColumn('action', function (Faq $faq) {
                $deleteUrl = route('admin.faqs.destroy', $faq->id);
                $editData = htmlspecialchars(json_encode([
                    'id' => $faq->id,
                    'question' => $faq->question,
                    'answer' => $faq->answer,
                    'is_active' => $faq->is_active ? '1' : '0',
                    'sort_order' => $faq->sort_order,
                ]), ENT_QUOTES, 'UTF-8');

                return '
                    <div class="flex items-center space-x-2">
                        <button onclick=\'editFaq(' . $editData . ')\' class="text-blue-600 hover:text-blue-900" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="' . $deleteUrl . '" method="POST" class="inline-block" onsubmit="return confirm(\'Are you sure you want to delete this FAQ?\');">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="text-red-600 hover:text-red-900" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                ';
            })
            ->rawColumns(['status', 'short_answer', 'action'])
            ->make(true);
    }
}
