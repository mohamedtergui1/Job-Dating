<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\SkillResquest;
class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $skills = Skill::latest()->paginate(5);

        return view("skills.view",compact('skills'))->with('i',(request()->input('page',1)-1)*5);
        
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
    public function store(SkillResquest $request)
    {
        //
        Skill::create($request->all());
    
       
        return Redirect::route('skills')->with('success', "Skill added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        //
        return view('skills.edit',compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkillResquest $request, Skill $skill)
    {
        //
        $skill->update($request->all());
        return Redirect::route('skills')->with('success', "skill updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        //
        $skill->delete();
   
        return redirect()->route('skills')->with('success', "skill deleted successfully");
    }
}
