<?php
namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Entreprise;
use App\Models\User;


class HomeController extends Controller
{
       function index()
       {

 

        
              $annonces = Annonce::with('Entreprise', 'skills')->latest()->paginate(6);
              $entreprises = Entreprise::all();
              return view("welcome", compact("annonces", "entreprises"))->with('i',(request()->input('page',1)-1)*6);

       }

       function allannonces() {
              $annonces = Annonce::with('Entreprise', 'skills')->get();
              if ($annonces->isNotEmpty()) {
                  return response()->json(["status" => "1", "annonces" => $annonces , "_token" => csrf_token()]);
              } else {
                  return response()->json(["status" => "0", "message" => "No announcements found"]);
              }
          }
          
       function matchannonces(){
              

              $annonces = [];

              $annoncesAll = Annonce::with('Entreprise', 'skills')->get();

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

              if (count( $annonces)) {
                     return response()->json(["status" => "1", "annonces" => $annonces  , "_token" => csrf_token()]);
                 } else {
                     return response()->json(["status" => "0", "message" => "No announcements found"]);
                 }
       }

}