<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data=Subject::all();
       $title='Subjects List';
       return view('admin.pages.subjects.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Subject Create';
        return view('admin.pages.subjects.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
              'name'=>'required|unique:subjects,name,'.$request->id,
        ]);

        try
        {
           DB::beginTransaction();
            Subject::store($request);
           DB::commit();
           return redirect()->route('subjects.index');
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
    public function edit(Subject $subject)
    {
         $result=$subject;
         $title='Subject Edit';
       return view('admin.pages.subjects.create',compact('result','title'));
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
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->back();
    }
}
