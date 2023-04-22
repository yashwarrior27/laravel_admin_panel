<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StaticPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaticPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=StaticPage::all();
       $title='Static Pages List';
       return view('admin.pages.static_pages.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Static Page Create';
        return view('admin.pages.static_pages.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title'=>'required|unique:static_pages,title,'.$request->id,
            'content'=>'required'
         ]);
         try
         {
            DB::beginTransaction();
            StaticPage::store($request);
            DB::commit();
            return redirect()->route('static_pages.index');

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
    public function edit(StaticPage $staticPage)
    {
        $result=$staticPage;
         $title='Static Page Edit';
       return view('admin.pages.static_pages.create',compact('result','title'));
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
    public function destroy(StaticPage $staticPage)
    {
        $staticPage->delete();
        return redirect()->route('static_pages.index');
    }
}
