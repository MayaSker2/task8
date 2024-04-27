<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $employees = Employee::all();

        return response()->json([
            'status' => 'success',
            'employee' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            
        ]);
       
        $employee = Employee::create ([
            'first_name'  => $request->first_name,
            'last_name'=>$request->last_name,
            'email'  => $request->email,
            'position'  => $request->position,
        ]);

        // DB::commit();

        return response()->json([
            'status' => 'success',
            'employee' => $employee
        ]);
        Employee::onlyTrashed()->restore();
        Employee::onlyTrashed()->forceDelete();

    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return response()->json([
            'status' => 'success',
            'employee' => $employee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->valdepartment_idate([
            'first_name'  => 'required|string|max::255',
            'last_name'=>'required|string|max::255',
            'email'  => 'required|string|max::255',
            'name'  => 'required|string|max::255',
        ]);
        $newData =[];
        if(isset($request->name)){
            $newData['first_name'] =  $request->first_name;
        }
        if(isset($request->name)){
            $newData['last_name'] =  $request->last_name;
        }
        if(isset($request->name)){
            $newData['email'] =  $request->email;
        }
        
        if(isset($request->name)){
            $newData['position'] =  $request->position;
        }
        $employee->update();

        return response() ->json([
            'status' => 'success',
            'employee' => $employee
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response() ->json([
            'status' => 'success',
        ]);
    }
}
