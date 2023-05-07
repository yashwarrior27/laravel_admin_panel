<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data=ClassCategory::all();
       $title='Class Categories List';
       return view('admin.pages.class_categories.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Class Category Create';
        return view('admin.pages.class_categories.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
              'name'=>'required|unique:class_categories,name,'.$request->id,
        ]);

        try
        {
           DB::beginTransaction();
            ClassCategory::store($request);
           DB::commit();
           return redirect()->route('class_categories.index');
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
    public function edit(ClassCategory $classCategory)
    {
         $result=$classCategory;
         $title='Class Category Edit';
       return view('admin.pages.class_categories.create',compact('result','title'));
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
    public function destroy(ClassCategory $classCategory)
    {
        $classCategory->delete();
        return redirect()->back();
    }
}
