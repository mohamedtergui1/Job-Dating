<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //
    function show () {
        
        
        $skills= Skill::all();
         
         $user = User::with('skills')->findOrFail(auth()->user()->id);
           
        return view('profileUser',compact('skills','user'));
    }
    public function addSkill(Request $request)
{
    $validator = Validator::make($request->all(), [
        'user_id' => 'required|exists:users,id',
        'skill_ids' => 'required|array',
        'skill_ids.*' => 'exists:skills,id'
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }   
    $user = User::findOrFail($request->input('user_id'));
    $user->skills()->sync($request->input('skill_ids'));    
    return response()->json(['message' => 'Skills added successfully'], 200);
}

public function postuler(Request $request){

    Validator::make($request->all(), [
        'annonce_ids' => 'required|array',
        'annonce_ids.*' => 'exists:annonces,id'
    ])->validate();
    
    $user = User::findOrFail(auth()->user()->id);

    // Sync without detaching to avoid duplicate entries
    $user->annonces()->syncWithoutDetaching($request->input('annonce_ids'));

    return Redirect::route('welcome')->with('success', "Postuler with success");
    
}

 
public function edit( )
{  
    $user = User::find(auth()->user()->id);
    return view("editUserProfile",compact('user'));
}

 
    
}
