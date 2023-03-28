<?php

namespace App\Http\Controllers;

use App\Models\Sections;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Sections::all();
        return view('Sections.Section', compact('sections'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'section_name' => 'required|unique:sections|max:255',
            'description' => 'required',
        ]);

        Sections::create([
            'section_name' => $request->section_name,
            'description' => $request->description,

        ]);


        return redirect()->route('section.index');


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Sections $sections
     * @return \Illuminate\Http\Response
     */
    public function show(Sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Sections $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(Sections $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sections $sections
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id = $request->id;

        $validated = $request->validate([
            'section_name' => 'required|unique:sections|max:255'. $id,
            'description' => 'required',
        ]);

        Sections::findorFail($id)->update([
            'section_name' => $request->section_name,
            'description' => $request->description,
        ]);

        return redirect()->route('section.index');

    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\Sections $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id= $request->id;
        Sections::findorfail($id)->delete();
        return redirect()->route('section.index');

    }
}
