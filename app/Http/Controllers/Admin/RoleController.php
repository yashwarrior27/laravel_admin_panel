<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Role::all();
        $title='Roles List';
        return view('admin.pages.user_managements.roles.index',compact('data','title'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Role Create';
        return view('admin.pages.user_managements.roles.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['title'=>'required|unique:roles,title,'.$request->id]);

        try
        {
            DB::beginTransaction();
           Role::store($request);
           DB::commit();
           return redirect()->route('roles.index');
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
    public function edit(Role $role)
    {
        $title='Role Edit';
        $result=$role;
        return view('admin.pages.user_managements.roles.create',compact('title','result'));

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
    public function destroy(Role $role)
    {
       $role->delete();
       return redirect()->route('roles.index');
    }
}
