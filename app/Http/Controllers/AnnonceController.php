<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Entreprise;

use App\Http\Requests\AnnonceRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
            $entreprises = Entreprise::get(["id","name"]);
            $annonces = Annonce::with('Entreprise')->latest()->paginate(5);
            return view("annonces.view",compact("annonces","entreprises"))->with('i',(request()->input('page',1)-1)*5);
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
    public function store(AnnonceRequest $request)
    {
        if($request->image){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $path = 'uploads/ennonces/';
            $file->move($path, $fileName);
            Annonce::create([
                'title' => $request->title,
                'entreprise_id' => $request->entreprise_id,
                'image' => $fileName,
                'description' => $request->description,
            ]);
            
        }
        else{
        
        Annonce::create([
            'title' => $request->title,
            'entreprise_id' => $request->entreprise_id,
        
            'description' => $request->description
        ]);
        
       }
        return Redirect::route('annonces')->with('success', "Entreprise added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Annonce $annonce)
    {
        //
        
        return view("single_page",compact('annonce'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annonce $annonce)
    {
        //
      
        $entreprises = Entreprise::where('id', '!=', $annonce->entreprise_id)
                             ->get(["id", "name"]);
        
        return view('annonces.edit',compact('annonce',"entreprises"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnonceRequest $request, Annonce $annonce)
    {
        //
        if($request->image){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $path = 'uploads/ennonces/';
            $file->move($path, $fileName);
            $annonce->update([
                'title' => $request->title,
                'entreprise_id' => $request->entreprise_id,
                'image' => $fileName,
                'description' => $request->description,
            ]);
        }else{
        $annonce->update([
            'title' => $request->title,
            'entreprise_id' => $request->entreprise_id,
            'description' => $request->description,
        ]);
        }
       
       
        return Redirect::route('annonces')->with('success', "Entreprise updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annonce $annonce)
    {
        //
        $annonce->delete();
    
        return Redirect::route('annonces')->with('success', "Entreprise deleted successfully");
    }
    function  search(Request $request){
        
        
        $annonces = Annonce::with('Entreprise')->where('title', 'like', '%' . $request->search_string . '%')->get();
        
        if(count($annonces))  
        return response()->json($annonces);
       
        else response()->json(
           [ 'status' => 'not found']
        );
            
    }
}
