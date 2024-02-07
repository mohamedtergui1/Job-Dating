<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    //
    function show (User $user) {
        
        
        $skills= Skill::all();
         
         $user = User::with('skills')->findOrFail($user->id);
           
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
    
}
