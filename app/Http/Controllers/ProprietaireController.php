<?php

namespace App\Http\Controllers;

use App\Models\Proprietaire;
use Illuminate\Http\Request;
use DB;
Use Auth;

class ProprietaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $proprietaires = Proprietaire::all();

         return view('proprietaire.index',compact('proprietaires'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proprietaire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'nom' => ['required'],
            'prenom' => ['required'],
            'telephone' => 'required',
            'adresse' => 'required',
        ]);

      $proprietaire = new Proprietaire;
      $proprietaire->nom = $request->nom;
      $proprietaire->prenom = $request->prenom;
      $proprietaire->telephone = $request->telephone;
      $proprietaire->adresse = $request->adresse;
      $proprietaire->save();

        return redirect()->route('proprietaire.index')
                        ->with('Proprietaire a ete creé');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proprietaire  $proprietaire
     * @return \Illuminate\Http\Response
     */
    public function show(Proprietaire $proprietaire)
    {
        return view('proprietaire.show', compact('proprietaire'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proprietaire  $proprietaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Proprietaire $proprietaire)
    {
        return view('proprietaire.edit', compact('proprietaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proprietaire  $proprietaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proprietaire $proprietaire)
    {
                  $request->validate([
                            'nom' => 'required',
                            'prenom' => 'required',
                            'telephone' => 'required',
                            'adresse' => 'required',

                        ]);

                          DB::table('proprietaire') ->where('id', $proprietaire->id)
                                                    ->update([
                                                         'nom'=> $request->nom,
                                                         'prenom'=> $request->prenom,
                                                         'telephone'=> $request->telephone,
                                                         'adresse'=>$request->adresse,

                                                          ]);

                  return redirect()->route('proprietaire.index')
                                  ->with('Proprietaire a ete modifié');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proprietaire  $proprietaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proprietaire $proprietaire)
    {
        $proprietaire->delete();

        return redirect()->route('proprietaire.index')
                         ->with('success','Proprietaire a ete supprimer');
    }
}
