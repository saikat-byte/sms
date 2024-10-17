<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student_class = StudentClass::all();


        return view('admin.student_class.list', compact('student_class'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student_class.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "class_name" => "required|string"
        ]);

        $data = new StudentClass();
        $data->class_name = $request->class_name;
        $data->save();

        return redirect()->route('student.class.create')->with("success", "Class created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $student_class = StudentClass::find($id);

        return view('admin.student_class.edit', compact('student_class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $request->validate([
            "class_name" => "required|string"
        ]);

        $data = StudentClass::find($request->id);
        $data->class_name = $request->class_name;
        $data->update();

        return redirect()->back()->with("success", "Student class updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student_class = StudentClass::find($id);
        $student_class->delete();

        return redirect()->back()->with("success", "Student class deleted successfully");
    }
}
