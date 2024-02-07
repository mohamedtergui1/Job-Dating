<?php
namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Entreprise;

class HomeController extends Controller
{
       function index(){

        $entreprises = Entreprise::all();
        $annonces = Annonce::with('Entreprise')->latest()->paginate(6);
        return view("welcome", compact("annonces", "entreprises"))->with('i', (request()->input('page', 1) - 1) * 6);
        
       }
       // SELECT   COUNT(*)  FROM annonces INNER JOIN annonce_skill INNER JOIN users INNER JOIN user_skill INNER JOIN skills ON users.id = user_skill.user_id and skills.id = user_skill.skill_id AND annonces.id = annonce_skill.annonce_id and skills.id = annonce_skill.skill_id  WHERE users.id = 11 ;
       // SELECT COUNT(*) FROM users INNER JOIN user_skill INNER JOIN skills ON users.id = user_skill.user_id and skills.id = user_skill.skill_id WHERE users.id = 11;
      
}