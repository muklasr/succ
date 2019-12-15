<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Family;

class FamilyController extends Controller
{
    public function index()
    {
        $data = Family::all();
        return view('admin.family')->with('family', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Family::updateOrCreate(
            ['id' => $request->id],
            ['name' => $request->name]
        );
        return redirect("/admin/family")->with('success', 'Family saved');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $family = Family::find($id);
        return response()->json($family);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $family = Family::find($id);
        $family->delete();

        return redirect("/admin/family")->with('success', 'Family deleted');
    }
}
