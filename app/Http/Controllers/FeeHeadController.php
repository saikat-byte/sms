<?php

namespace App\Http\Controllers;

use App\Models\FeeHead;
use Illuminate\Http\Request;

class FeeHeadController extends Controller
{

    public function index()
    {
        $fee_head = FeeHead::all();


        return view('admin.fee_head.list', compact('fee_head'));

    }


    public function create()
    {
        return view('admin.fee_head.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string"
        ]);

        $data = new FeeHead();
        $data->name = $request->name;
        $data->save();

        return redirect()->route('fee.head.create')->with("success", "Fee head created successfully!");
    }



    public function edit($id)
    {

        $fee_head = FeeHead::find($id);

        return view('admin.fee_head.edit', compact('fee_head'));

    }

    public function update(Request $request)
    {

        $request->validate([
            "name" => "required|string"
        ]);

        $data = FeeHead::find($request->id);

        $data->name = $request->name;
        $data->update();

        return redirect()->back()->with("success", "Fee head updated successfully!");
    }

    public function destroy($id)
    {
        $fee_head = FeeHead::find($id);
        $fee_head->delete();

        return redirect()->back()->with("success", "Fee head deleted successfully");
    }
}
