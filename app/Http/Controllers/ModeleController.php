<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use Illuminate\Http\Request;
use DB;
Use Auth;
use App\Models\Marque;

class ModeleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $modeles = Modele::all();

         return view('modele.index',compact('modeles'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $marques = Marque::all();
        return view('modele.create', compact('marques'));
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
            'annee' => ['required'],
            'marque_id' => 'required',
        ]);

      $modele = new Modele;
      $modele->nom = $request->nom;
      $modele->annee = $request->annee;
      $modele->marque_id = $request->marque_id;
      $modele->save();

        return redirect()->route('modele.index')
                        ->with('Modele a ete creé');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function show(Modele $modele)
    {
        return view('modele.show', compact('modele'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function edit(Modele $modele)
    {
        $marques = Marque::all();
        return view('modele.edit', compact('modele','marques'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modele $modele)
    {
                  $request->validate([
                            'nom' => 'required',
                            'annee' => 'required',
                            'marque_id' => 'required',

                        ]);

                  DB::table('modele') ->where('id', $modele->id)
                                      ->update([
                                                'nom'=> $request->nom,
                                                'annee'=> $request->annee,
                                                'marque_id'=>$request->marque_id
                                                ]);

                  return redirect()->route('modele.index')
                                  ->with('Modele a ete modifié');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modele $modele)
    {
        $modele->delete();

        return redirect()->route('modele.index')
                         ->with('success','Modele a ete supprimer');
    }
}
