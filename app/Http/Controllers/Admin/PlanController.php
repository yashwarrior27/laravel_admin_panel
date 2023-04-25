<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data=Plan::all();
       $title='Plans List';
       return view('admin.pages.plans.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title='Plan Create';
        return view('admin.pages.plans.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
              'name'=>'required|unique:plans,name,'.$request->id,
        ]);

        try
        {
           DB::beginTransaction();
           Plan::store($request);
           DB::commit();
           return redirect()->route('plans.index');
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
    public function edit(Plan $plan)
    {
         $result=$plan;
         $title='Class Category Edit';
       return view('admin.pages.plans.create',compact('result','title'));
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
    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->back();
    }
}
