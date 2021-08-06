<?php

namespace App\Http\Controllers;

use App\Models\TypeVoiture;
use Illuminate\Http\Request;
use DB;
Use Auth;

class TypeVoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $types = TypeVoiture::all();

         return view('type.index',compact('types'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('type.create');
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
            'nom' => 'required'
        ]);

      $type = new TypeVoiture;
      $type->nom = $request->nom;
      $type->save();

        return redirect()->route('typevoiture.index')
                        ->with('Type de Voiture a ete creé');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeVoiture  $typeVoiture
     * @return \Illuminate\Http\Response
     */
    public function show(TypeVoiture $typeVoiture)
    {
        return view('type.show', compact('typeVoiture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeVoiture  $typeVoiture
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeVoiture $typevoiture)
    {
        return view('type.edit', compact('typevoiture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeVoiture  $typeVoiture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeVoiture $typevoiture)
    {
         $request->validate([
               'nom' => 'required',
             ]);

         DB::table('typevoiture')->where('id', $typevoiture->id)
                                  ->update([
                                            'nom'=> $request->nom
                                            ]);

         return redirect()->route('typevoiture.index')
                          ->with('Type de Voiture a ete modifié');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeVoiture  $typeVoiture
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeVoiture $typevoiture)
    {
        $typevoiture->delete();

        return redirect()->route('typevoiture.index')
                         ->with('success','Type a ete supprimer');
    }
}
