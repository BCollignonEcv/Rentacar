<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reservation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = (object) array();
        $reservations = Reservation::all();
        foreach($reservations as $reservation){
            if($reservation->date_begin > date('Y-m-d')){
                $data->incomingReservations[] = $reservation;
            }else{
                $data->pastedReservations[] = $reservation;
            }
        }
        return view('reservations', ['data' => $data]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userIndex($id)
    {
        $data = (object) array();
        $reservations = Reservation::where('id_client', $id)->get();
        foreach($reservations as $reservation){
            if($reservation->date_begin > date('Y-m-d')){
                $data->incomingReservations[] = $reservation;
            }else{
                $data->pastedReservations[] = $reservation;
            }
        }
        return view('reservations', ['data' => $data]);
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
        $reservation = new Reservation();
        $reservation->id_vehicule = $request->id_vehicule;
        $reservation->id_client = $request->id_client;
        $reservation->date_begin = $request->dateBegin;
        $reservation->date_end = $request->dateEnd;
        $reservation->save();
        
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
        $reservation = Reservation::find($id);
        return view('reservation', ['reservation' => $reservation]);
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
