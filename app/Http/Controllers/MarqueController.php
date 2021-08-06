<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;
use DB;
Use Auth;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $marques = Marque::all();

         return view('marque.index',compact('marques'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marque.create');
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

        ]);

      $marque = new Marque;
      $marque->nom = $request->nom;
      $marque->save();

        return redirect()->route('marque.index')
                        ->with('Marque a ete creé');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function show(Marque $marque)
    {
        return view('marque.show', compact('marque'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function edit(Marque $marque)
    {
        return view('marque.edit', compact('marque'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marque $marque)
    {
                  $request->validate([
                            'nom' => 'required',

                        ]);

                  DB::table('marque') ->where('id', $marque->id)
                                               ->update([
                                                         'nom'=> $request->nom

                                                          ]);

                  return redirect()->route('marque.index')
                                  ->with('Marque a ete modifié');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marque $marque)
    {
        $marque->delete();

                return redirect()->route('marque.index')
                                 ->with('success','Marque a ete supprimer');
    }
}
