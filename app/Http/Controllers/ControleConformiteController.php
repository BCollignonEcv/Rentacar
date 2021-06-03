<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ControleConformite;

class ControleConformiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

        /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function createControleConformite($id_vehicule)
    {
        $data = (object) array();
        $data->id_vehicule = $id_vehicule;
        return view('form/formControleConformite', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grade = array();
        $controleConformite = new ControleConformite();
        $controleConformite->id_vehicule = $request->id_vehicule;
        $controleConformite->etat_pneu = $request->etatPneu;
        array_push($grade, $controleConformite->etat_pneu);
        $controleConformite->etat_frein = $request->etatFrein;
        array_push($grade, $controleConformite->etat_frein);
        $controleConformite->etat_moteur = $request->etatMoteur;
        array_push($grade, $controleConformite->etat_moteur);
        $controleConformite->etat_feu = $request->etatFeu;
        array_push($grade, $controleConformite->etat_feu);

        dd($grade);
        // Set global statut of controle
        $controleConformite->statut->getStatut($grade);

        $controleConformite->save();
        return redirect()->route('vehicule', ['id', $controleConformite->id_vehicule]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Return globale statut of vehicule.
     *
     * @param  Array $attrs
     * @return Boolean
     */
    private function getStatut($attrs){
        $n = 0;
        $sum = 0;
        foreach ($attrs as $k => $v) {
            $n++;
            $sum += $v;
        }
        $statut = $sum / $n;
        return $statut > 5;
    }
}