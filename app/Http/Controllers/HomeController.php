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
}