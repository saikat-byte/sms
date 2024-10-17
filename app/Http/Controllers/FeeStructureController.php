<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\FeeHead;
use App\Models\FeeStructure;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class FeeStructureController extends Controller
{

    public function index(Request $request)
    {
        // Keep the original query
        $query = FeeStructure::with(['AcademicYear', 'StudentClasses', 'FeeHead']);


        // Apply filtering based on year_id (from the request)
        if ($request->has('academic_years_id') && !empty($request->input('academic_years_id'))) {
            $query->whereHas('AcademicYear', function ($q) use ($request) {
                $q->where('id', $request->input('academic_years_id'));
            });
        }

        // Apply filtering based on student_classes_id (from the request)
        if ($request->has('student_classes_id') && !empty($request->input('student_classes_id'))) {
            $query->whereHas('StudentClasses', function ($q) use ($request) {
                $q->where('id', $request->input('student_classes_id'));
            });
        }

        // Get the filtered or unfiltered data
        $data = $query->latest()->get();

        // No changes to fetching the list of classes and academic years for dropdowns
        $class_name = StudentClass::latest()->get();
        $academic_year = AcademicYear::latest()->get();

        // Return the view with the same variable names
        return view('admin.fee_structure.list', compact('data', 'class_name', 'academic_year'));
    }



    public function create()
    {
        $class_name = StudentClass::all();
        $academic_year = AcademicYear::all();
        $fee_head = FeeHead::all();

        return view('admin.fee_structure.create', compact('class_name','academic_year','fee_head'));
    }


    public function store(Request $request)
    {


        $request->validate([
            "student_classes_id" => "required",
            "academic_years_id" => "required",
            "fee_heads_id" => "required",
        ]);


        $data = new FeeStructure();
        $data->academic_years_id  = $request->academic_years_id;
        $data->student_classes_id = $request->student_classes_id;
        $data->fee_heads_id = $request->fee_heads_id;
        $data->january = $request->january;
        $data->february = $request->february;
        $data->march = $request->march;
        $data->april = $request->april;
        $data->may = $request->may;
        $data->june = $request->june;
        $data->july = $request->july;
        $data->august = $request->august;
        $data->september = $request->september;
        $data->october = $request->october;
        $data->november = $request->november;
        $data->december = $request->december;
        $data->save();

        return redirect()->route('fee.structure.create')->with("success", "Fee structure created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(FeeStructure $feeStructure)
    {
        //
    }

    public function edit($id)
    {

        $data = FeeStructure::find($id);
        $class_name = StudentClass::all();
        $academic_year = AcademicYear::all();
        $fee_head = FeeHead::all();

        return view('admin.fee_structure.edit', compact('data', 'class_name', 'academic_year', 'fee_head'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        $request->validate([
            "student_classes_id" => "required",
            "academic_years_id" => "required",
            "fee_heads_id" => "required",
        ]);


        $data = FeeStructure::find( $id);
        $data->student_classes_id = $request->student_classes_id;
        $data->academic_years_id  = $request->academic_years_id;
        $data->fee_heads_id = $request->fee_heads_id;
        $data->january = $request->january;
        $data->february = $request->february;
        $data->march = $request->march;
        $data->april = $request->april;
        $data->may = $request->may;
        $data->june = $request->june;
        $data->july = $request->july;
        $data->august = $request->august;
        $data->september = $request->september;
        $data->october = $request->october;
        $data->november = $request->november;
        $data->december = $request->december;
        $data->update();

        return redirect()->back()->with("success", "Fee structure updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = FeeStructure::find($id);
        $data->delete();

        return redirect()->back()->with('success', 'Fee structure deleted successfully');
    }
}
