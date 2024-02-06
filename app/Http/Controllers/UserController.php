<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\User;


class UserController extends Controller
{
    //
    function show () {
        $skills= Skill::all();
        return view('profileUser',compact('skills'));
    }
    public function addSkill(Request $request)
    {
         
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'skill_ids' => 'required|array',
            'skill_ids.*' => 'exists:skills,id'
        ]);
    
         
        $user = User::findOrFail($request->input('user_id'));
    
         
        $user->skills()->attach($request->input('skill_ids'));
    
       
        echo "1";
    }
    
}
