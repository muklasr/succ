<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Succulent;
use App\Family;
use App\Type;

class SucculentController extends Controller
{
    public function index()
    {
        $data = Succulent::all();
        $data2 = Family::all();
        $data3 = Type::all();
        return view('admin.succulent')->with('succulent', $data)->with('family', $data2)->with('type', $data3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('img'), $imageName);
        Succulent::updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->name,
                'origin' => $request->origin,
                'description' => $request->description,
                'id_family' => $request->family,
                'id_type' => $request->type,
                'mature_size' => $request->mature_size,
                'hardiness_zone' => $request->hardiness_zone,
                'light' => $request->light,
                'water' => $request->water,
                'temperature' => $request->temperature,
                'soil' => $request->soil,
                'soil_ph' => $request->soil_ph,
                'flower_color' => $request->flower_color,
                'special_features' => $request->special_features,
                'image' => $imageName
            ]
        );
        return redirect("/admin/succulent")->with('success', 'Succulent saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $succulent = Succulent::find($id);

        return response()->json($succulent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $succulent = Succulent::find($id);
        $succulent->delete();

        return redirect("/admin/succulent")->with('success', 'Succulent deleted');
    }
}
