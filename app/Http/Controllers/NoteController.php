<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function store(Request $request)
    {
        $employee=Employee::where('id',$request->employee_id)->first();
        $employee->notes()->create([
            'note'=>$request->note,
        ]);
    }

}
