<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data= EmailTemplate::all();
       $title='Email Templates List';
       return view('admin.pages.email_templates.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Email Template Create';
        return view('admin.pages.email_templates.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title'=>'required|unique:email_templates,title,'.$request->id,
                'subject'=>'required',
                'content'=>'required'
            ]);
            try
            {
                DB::beginTransaction();
                EmailTemplate::store($request);
                DB::commit();
                return redirect()->route('email_templates.index');

            }
            catch(\Exception $e)
            {
                DB::rollBack();
                return $e->getMessage();
            }

    }

    /**
     * Display the specified resource.
     */
    public function show(EmailTemplate $emailTemplate)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailTemplate $emailTemplate)
    {
        $result=$emailTemplate;
        $title='Email Template Edit';
        return view('admin.pages.email_templates.create',compact('result','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailTemplate $emailTemplate)
    {
        $emailTemplate->delete();
        return redirect()->route('email_templates.index');
    }
}
