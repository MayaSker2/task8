<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return response()->json([
            'status' => 'success',
            'department' => $departments
        ]);

        
    }public function getEmployees($id)
    {
        $department = Department::findOrFail($id);
        $employees = $department->employees;
        return response()->json($employees);
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
       
        $department = Department::create ([
            'department_name'  => $request->department_name,
            'department_id'=>$request->department_id,
            'description'  => $request->description,
            'position'  => $request->position,
        ]);

        // DB::commit();

        return response()->json([
            'status' => 'success',
            'department' => $department
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return response()->json([
            'status' => 'success',
            'department' => $department
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $request->valdepartment_idate([
            'department_name'  => 'required|string|max::255',
            'department_id'=>'required|string|max::255',
            'description'=>'required|string|max::255',
            'name'  => 'required|string|max::255',
        ]);
        $newData =[];

        if(isset($request->name)){
            $newData['department_name'] =  $request->department_name;
        }
        if(isset($request->name)){
            $newData['department_id'] =  $request->department_id;
        }
        if(isset($request->name)){
            $newData['description'] =  $request->description;
        }
        $department->update();

        return response() ->json([
            'status' => 'success',
            'department' => $employee
        ]);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return response() ->json([
            'status' => 'success',
        ]);
    }
}
