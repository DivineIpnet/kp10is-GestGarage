<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use Illuminate\Http\Request;
use DB;
use Storage;
Use Auth;
use App\Models\TypeVoiture;
use App\Models\Proprietaire;
use App\Models\Marque;

class VoitureController extends Controller
{

public function __construct()
{
$this->middleware('auth')->except('home');
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$voitures = Voiture::latest()->paginate(5);
        $voitures = Voiture::all();
        //$v = DB::table('voiture')->get();
       // dd($v);

        return view('voiture.index',compact('voitures'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
//         return view('voiture.template');
    }

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function home()
        {
            return view('voiture.home');
        }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typevoitures = TypeVoiture::all();
        $proprietaires = Proprietaire::all();
        $marques = Marque::all();
        return view('voiture.create', compact('typevoitures', 'proprietaires', 'marques'));
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
            'image' => ['required', 'image'],
            'matricule' => ['required', 'max:10', 'min:6', 'unique:voiture'],
            'status' => 'required',
            'type_voiture_id' => 'required',
            'marque_id' => 'required',
            'proprietaire_id' => ['required'],
        ]);
      //Storage::makeDirectory('public', 'upload');

      $image = Request()->file('image')->store('/', 'local');
      $request->image = $image;
       // Voiture::create($request->all());

      $voiture = new Voiture;
      $voiture->image = $request->image;
      $voiture->matricule = $request->matricule;
      $voiture->status = $request->status;
      $voiture->type_voiture_id = $request->type_voiture_id;
      $voiture->marque_id = $request->marque_id;
      $voiture->proprietaire_id = $request->proprietaire_id;

      $voiture->save();

        return redirect()->route('voiture.index')
                        ->with('Voiture a ete creé');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function show(Voiture $voiture)
    {
        return view('voiture.show', compact('voiture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function edit(Voiture $voiture)
    {
        $typevoitures = TypeVoiture::all();
        $proprietaires = Proprietaire::all();
        $marques = Marque::all();
        return view('voiture.edit', compact('voiture','typevoitures', 'proprietaires', 'marques'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voiture $voiture)
    {
        //dd($request->all());
          $request->validate([
                    'image' => 'required',
                    'matricule' => 'required',
                    'status' => 'required',
                    'type_voiture_id' => 'required',
                    'marque_id' => 'required',
                    'proprietaire_id' => 'required',
                ]);
            $image = $request->image;
        if($request->has('update_image')){
              $image = Request()->file('update_image')->store('/', 'local');
        }

                  DB::table('voiture') ->where('id', $voiture->id)
                                       ->update([
                                                 'image'=> $image,
                                                 'matricule'=> $request->matricule,
                                                 'status'=> $request->status,
                                                 'type_voiture_id'=>$request->type_voiture_id,
                                                 'marque_id'=>$request->marque_id,
                                                 'proprietaire_id'=>$request->proprietaire_id
                                                  ]);

          return redirect()->route('voiture.index')
                          ->with('Voiture a ete modifié');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voiture $voiture)
    {
        $voiture->delete();

        return redirect()->route('voiture.index')
                                ->with('success','Voiture a ete supprimer');

    }
}
