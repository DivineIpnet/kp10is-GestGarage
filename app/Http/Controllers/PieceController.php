<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use Illuminate\Http\Request;
use DB;
Use Auth;

class PieceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $pieces = Piece::all();

         return view('piece.index',compact('pieces'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('piece.create');
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

      $piece = new Piece;
      $piece->nom = $request->nom;
      $piece->save();

        return redirect()->route('piece.index')
                        ->with('Piece a ete creé');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function show(Piece $piece)
    {
        return view('piece.show', compact('piece'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function edit(Piece $piece)
    {
        return view('piece.edit', compact('piece'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Piece $piece)
    {
                  $request->validate([
                            'nom' => 'required',
                        ]);

                  DB::table('piece') ->where('id', $piece->id)
                                     ->update([
                                               'nom'=> $request->nom,

                                               ]);

                  return redirect()->route('piece.index')
                                  ->with('Piece a ete modifié');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function destroy(Piece $piece)
    {
       $piece->delete();

      return redirect()->route('piece.index')
                       ->with('success','Piece a ete supprimer');
    }
}
