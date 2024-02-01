<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EntrepriseRequest;
class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //   
            $entreprises = Entreprise::latest()->paginate(5);
            return view('entreprises.view',compact('entreprises'))->with('i',(request()->input('page',1)-1)*5);
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

    public function store(EntrepriseRequest $request)
    {
    
       
        Entreprise::create($request->all());
    
       
        return Redirect::route('entreprises')->with('success', "Entreprise added successfully");
    }
    


    /**
     * Display the specified resource.
     */
    public function show(Entreprise $entreprise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entreprise $entreprise)
    {
        //
        return view('entreprises.edit',compact('entreprise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EntrepriseRequest $request, Entreprise $entreprise)
    {
        //
        $entreprise->update($request->all());
        return Redirect::route('entreprises')->with('success', "Entreprise updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entreprise $entreprise)
    {
    
    $entreprise->delete();
   
    return redirect()->route('entreprises')->with('success', "Entreprise deleted successfully");
    }

}
