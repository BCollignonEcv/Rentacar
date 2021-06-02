<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TypeVehicule;
use App\Models\TypeBoite;
use App\Models\TypeCarburant;
use App\Models\Marque;
use App\Models\Vehicule;


class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = (object) array();
        $data->vehicules = Vehicule::paginate(12);
        return view('vehicules', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = (object) array();
        $data->typeVehicules = TypeVehicule::all();
        $data->typeBoites = TypeBoite::all();
        $data->typeCarburants = TypeCarburant::all();
        $data->marques = Marque::all();
        return view('form/formVehicule', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicule = new Vehicule();
        $vehicule->nom = $request->nom;
        $vehicule->tarif = $request->tarif;
        $vehicule->annee = $request->annee;
        $vehicule->nb_place = $request->nbPlace;
        $vehicule->id_marque = $request->marque;
        $vehicule->id_typeVehicule = $request->typeVehicule;
        $vehicule->id_typeBoite = $request->typeBoite;
        $vehicule->id_typeCarburant = $request->typeCarburant;
        $vehicule->img = $request->img;
        $vehicule->age_minimum = $request->age_minimum;

        $vehicule->save();
        // How to get the id back ?
        return redirect()->route('vehicules');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicule = Vehicule::find($id);
        return view('vehicule', ['vehicule' => $vehicule]);
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
}
