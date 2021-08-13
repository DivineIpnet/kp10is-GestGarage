<?php

namespace App\Http\Controllers;

use App\Chart;
use Illuminate\Http\Request;
use DB;
use App\Models\Voiture;
use App\Models\Modele;
use App\Models\Marque;
use App\Models\TypeVoiture;
use App\Models\Piece;
use Carbon\Carbon;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bar()
    {
        $voitures= Voiture::all();
        $modeles= Modele::all();
        $marques= Marque::all();
        $pieces= Piece::all();
        $date= Carbon::now()->toDateString();
        $datas=array();
        $label=array();
        $dt = Carbon::now();
        $dats= $dt->subDays(30);
// Recuperer les jours de la date actu -30
        for ($date = strtotime($date); $date >= strtotime($dats); $date = strtotime("-1 day", $date)) {
            $label[]= date("Y-m-d", $date);
        }
        $labels= array_reverse($label);
        $labelss= array_reverse($label);

//Avoir le nombre de voiture par date
        for($a=0; $a<=count($labels)-1;$a++){
            $cpt=0;
            foreach($voitures as $voiture){
                if($voiture->created_at->toDateString() == $labels[$a]){
                    $cpt++;
                }
            }
            $datas[] = $cpt;
        }

//Avoir le nombre de Modele par jour
        for($a=0; $a<=count($labels)-1;$a++){
            $cpt=0;
            foreach($modeles as $modele){
                if($modele->created_at->toDateString() == $labels[$a]){
                    $cpt++;
                }
            }
            $datasMd[] = $cpt;
        }
//Avoir le nombre de Piece par jour
        for($a=0; $a<=count($labels)-1;$a++){
            $cpt=0;
            foreach($pieces as $piece){
                if($piece->created_at->toDateString() == $labels[$a]){
                    $cpt++;
                }
            }
            $datasP[] = $cpt;
        }
//Avoir le nombre de Marque par jour
        for($a=0; $a<=count($labels)-1;$a++){
            $cpt=0;
            foreach($marques as $marque){
                if($marque->created_at->toDateString() == $labels[$a]){
                    $cpt++;
                }
            }
            $datasM[] = $cpt;
        }

// Recuperer la liste des voitures par pieces
        foreach($pieces as $piece){
            $labelsP[] = $piece->nom;
            $color[] = array("lightblue", "lightcyan");
            $cpt=0;
            foreach($voitures as $voiture){
                if($voiture->piece == $piece){
                    $cpt++;
                }
            }
            $dtp[] = $cpt;
        }

        $nbrsV= DB::table('voiture')->count();
        $nbrsMark= DB::table('marque')->count();
        $nbrsMod= DB::table('modele')->count();
        $nbrsType= DB::table('typevoiture')->count();
        $nbrsP= DB::table('piece')->count();
        $nbrsPro= DB::table('proprietaire')->count();



        return view('admin.home', compact('nbrsV', 'nbrsMark', 'nbrsMod', 'nbrsP', 'nbrsType', 'nbrsPro', 'pieces', 'voitures'))
                    ->with('datas',json_encode($datas,JSON_NUMERIC_CHECK))
                    ->with('datasMd',json_encode($datasMd,JSON_NUMERIC_CHECK))
                    ->with('datasM',json_encode($datasM,JSON_NUMERIC_CHECK))
                    ->with('datasP',json_encode($datasP,JSON_NUMERIC_CHECK))
                    ->with('dtp',json_encode($dtp,JSON_NUMERIC_CHECK))
                    ->with('labels',json_encode($labels,JSON_NUMERIC_CHECK))
                    ->with('color',json_encode($color,JSON_NUMERIC_CHECK))
                    ->with('labelsP',json_encode($labelsP,JSON_NUMERIC_CHECK));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function show(Chart $chart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function edit(Chart $chart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chart $chart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chart $chart)
    {
        //
    }
}
