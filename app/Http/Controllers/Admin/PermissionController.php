<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Permission::all();
        $title='Permissions List';
        return view('admin.pages.user_managements.permissions.index',compact('data','title'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Permission Create';
        return view('admin.pages.user_managements.permissions.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['title'=>'required|unique:permissions,title,'.$request->id]);

        try
        {
            DB::beginTransaction();
           Permission::store($request);
           DB::commit();
           return redirect()->route('permissions.index');
        }
        catch(\Exception $e)
        {
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
    public function edit(Permission $permission)
    {
        $title='Permission Edit';
        $result=$permission;
        return view('admin.pages.user_managements.permissions.create',compact('title','result'));

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
    public function destroy(Permission $permission)
    {
       $permission->delete();
       return redirect()->route('permissions.index');
    }
}
