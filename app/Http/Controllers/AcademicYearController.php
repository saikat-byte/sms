<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academic_year = AcademicYear::all();


        return view('admin.academic_year.list', compact('academic_year'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.academic_year.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "academic_year" => "required|string"
        ]);

        $data = new AcademicYear();
        $data->academic_year = $request->academic_year;
        $data->save();

        return redirect()->route('academic.year')->with("success", "Academic year created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicYear $academicYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $academic_y = AcademicYear::find($id);

        return view('admin.academic_year.edit', compact('academic_y'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $request->validate([
            "academic_year" => "required|string"
        ]);

        $data = AcademicYear::find($request->id);
        $data->academic_year = $request->academic_year;
        $data->update();

        return redirect()->back()->with("success", "Academic year updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $academic_year = AcademicYear::find($id);
        $academic_year->delete();

        return redirect()->back()->with("success", "Academic year deleted successfully");
    }
}
