<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use Yajra\DataTables\Facades\DataTables;
use App\Services\AdminCommonService;

class EmailTemplateController extends Controller
{
    protected $adminCommonService;

    public function __construct(AdminCommonService $adminCommonService)
    {
        $this->adminCommonService = $adminCommonService;
    }
    protected function yajaraList()
    {
        $emailTemplates = EmailTemplate::latest();
        return DataTables::of($emailTemplates)
        ->addColumn('content', function ($row) {
            $fullContent = strip_tags($row->body); // remove HTML tags from Summernote
            $shortContent = \Illuminate\Support\Str::limit($fullContent, 15, '...');
        
            return '<span title="' . e($fullContent) . '">' . e($shortContent) . '</span>';
        })
        ->addColumn('actions', function ($row) {
            return view('admin.email_template.actions', compact('row'))->render();
        })
        ->rawColumns(['content','actions'])
            ->make(true);

    }
    public function update(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'id' => 'required',
                'subject' => 'required|string|max:255',
                'body' => 'required|string',
            ]);
            $emailTemplate = EmailTemplate::find(decrypt($request->id));
            $emailTemplate->subject = $request->subject;
            $emailTemplate->body = $request->body;
            $emailTemplate->save();
            return response()->json(['message' => 'Email template updated successfully.']);
        }catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['message' => $e->errors()], 422);
        }
         catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 403);
        }
        
    }
}

