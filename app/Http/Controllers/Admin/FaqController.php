<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use DB;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data=Faq::all();
       $title='Faqs List';
       return view('admin.pages.faqs.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Faq Create';
        return view('admin.pages.faqs.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
              'question'=>'required',
              'answer'=>'required'
        ]);

        try
        {
           DB::beginTransaction();
           $faq=Faq::store($request);
           DB::commit();
           return redirect()->route('faqs.index');
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return $e->getMessage();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
         $result=$faq;
         $title='Faq Edit';
       return view('admin.pages.faqs.create',compact('result','title'));
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
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->back();
    }
}
