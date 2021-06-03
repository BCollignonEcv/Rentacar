<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TypeVehicule;
use App\Models\TypeBoite;
use App\Models\TypeCarburant;
use App\Models\Marque;
use App\Models\Vehicule;
use App\Models\ControleConformite;
use App\Models\ControleAV;
use App\Models\ControleAP;



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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexSearch(Request $request)
    {
        $data = (object) array();
        $query = Vehicule::query();
        if(isset($request->typeVehicule)){
            $query->where('id_typeVehicule', $request->typeVehicule);
        }
        if(isset($request->typeBoite)){
            $query->where('id_typeBoite', $request->typeBoite);
        }
        if(isset($request->typeCarburant)){
            $query->where('id_typeCarburant', $request->typeCarburant);
        }
        if(isset($request->nbPlace)){
            $query->where('nb_place', '>=', $request->nbPlace);
        }

        $data->vehicules = $query->get();
        // dd($data);
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
        $vehicule->nb_serie = $request->nbSerie;
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
        $data = (object) array();
        $data->vehicule = Vehicule::find($id);
        $data->controleConformites = $data->vehicule->controleConformites;
        $data->controleAP = $data->vehicule->controleAP;
        return view('vehicule', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = (object) array();
        $data->vehicule = Vehicule::find($id);
        $data->typeVehicules = TypeVehicule::all();
        $data->typeBoites = TypeBoite::all();
        $data->typeCarburants = TypeCarburant::all();
        $data->marques = Marque::all();
        return view('form/formVehicule', ['data' => $data]);
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
        $vehicule = Vehicule::find($id);
        $vehicule->nb_serie = $request->nbSerie;
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vehicule::destroy($id);
        ControleConformite::where('id_vehicule', $id)->delete();
        Vehicule::destroy($id);
        Vehicule::destroy($id);
        return redirect()->route('vehicules');
    }
}
