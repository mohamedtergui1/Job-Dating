<?php
namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Entreprise;
use App\Models\User;


class HomeController extends Controller
{
       function index()
       {


              // SELECT COUNT(*)  FROM  users INNER JOIN user_skill INNER JOIN skills ON users.id = user_skill.user_id INNER JOIN annonce_skill
              // INNER JOIN annonces 
              // ON
              // users.id = user_skill.user_id and skills.id = user_skill.skill_id
              // AND  annonces.id = annonce_skill.annonce_id and skills.id=annonce_skill.skill_id WHERE users.id = 1


              // SELECT COUNT(*) FROM  annonce_skill INNER join annonces INNER join skills 
              // ON annonce_skill.annonce_id = annonces.id and skills.id = annonce_skill.skill_id where annonces.id = 2


              $annonces = [];

              $annoncesAll = Annonce::with('Entreprise')->get();

              foreach ($annoncesAll as $annonce) {
                     $userCount = User::join('user_skill', 'users.id', '=', 'user_skill.user_id')
                            ->join('skills', function ($join) {
                                   $join->on('skills.id', '=', 'user_skill.skill_id');
                                   $join->on('users.id', '=', 'user_skill.user_id');
                            })
                            ->join('annonce_skill', function ($join) {
                                   $join->on('annonce_skill.skill_id', '=', 'skills.id');
                            })
                            ->join('annonces', 'annonces.id', '=', 'annonce_skill.annonce_id')
                            ->where('users.id', auth()->id())
                            ->where('annonces.id', $annonce->id)
                            ->count();




                     $annonceCount = Annonce::join('annonce_skill', 'annonces.id', '=', 'annonce_skill.annonce_id')
                            ->join('skills', 'skills.id', '=', 'annonce_skill.skill_id')
                            ->where('annonces.id', $annonce->id)
                            ->count();
                     if ($annonceCount > 0) {
                            if (($userCount / $annonceCount)  > 0.5) {
                                   array_push($annonces, $annonce);
                            }
                     }
              }






              $entreprises = Entreprise::all();
              return view("welcome", compact("annonces", "entreprises","annoncesAll"));

       }

}