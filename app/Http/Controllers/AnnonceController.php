<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Entreprise;

use App\Http\Requests\AnnonceRequest;
use App\Models\Skill;
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
            $skills = Skill::all();
            $annonces = Annonce::with('Entreprise')->latest()->paginate(5);
            return view("annonces.view",compact("annonces","entreprises",'skills'))->with('i',(request()->input('page',1)-1)*5);
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
            $announce =  Annonce::create([
                'title' => $request->title,
                'entreprise_id' => $request->entreprise_id,
                'image' => $fileName,
                'description' => $request->description,
            ]);
            
        }
        else{
        
        $announce =Annonce::create([
            'title' => $request->title,
            'entreprise_id' => $request->entreprise_id,
            'description' => $request->description
        ]);
        
       }

        $announce->skills
        ()->attach($request->input('skill_ids', []));
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
        $skills = Skill::all();
        $entreprises = Entreprise::where('id', '!=', $annonce->entreprise_id)
                             ->get(["id", "name"]);
        
        return view('annonces.edit',compact('annonce',"entreprises",'skills'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnonceRequest $request, Annonce $annonce)
    {
        //
        if($request->hasFile('image')){
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
    public function update(AnnouncementsRequest $request, Announcements $announcement)
{
    $data = [
        'title' => $request->title,
        'description' => $request->description,
        'company_id' => $request->company_id,
    ];

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $fileName = time().'.'.$extension;
        $path = 'uploads/announcements/';
        $file->move($path, $fileName);
        $data['image'] = $fileName;
    }

    // Update the announcement details
    $announcement->update($data);

    // Sync the skills
    $announcement->skills()->sync($request->input('skill_ids', []));

    return redirect()->route('announcements')->with('success', 'Announcement updated successfully.');
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
