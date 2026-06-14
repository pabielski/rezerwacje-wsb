<?php
namespace App\Services;


use Illuminate\Http\Request;
use App\Models\Reservation;
class ReservationService
{
    public function getAllReservations(){
        return Reservation::where('is_active', 1)->get();;
    }

    public function getReservationById(int $id){
        return Reservation::find($id);
    }

    public function updateReservation(Request $request, int $id){
        $request->validate([
        'room_id' => 'required',
        'user_id' => 'required',
        'date_from' => 'required|date',
        'date_to' => 'required|date|after:date_from',
        'total_price' => 'required|numeric|min:0',
        'status' => 'required',
        ]);
        $reservation = Reservation::find($id);
        $reservation->room_id=$request->input('room_id');
        $reservation->user_id=$request->input('user_id');
        $reservation->date_from = $request->input('date_from');
        $reservation->date_to = $request->input('date_to');
        $reservation->total_price = $request->input('total_price');
        $reservation->status = $request->input('status');
        $reservation->save();
    }
  public function createReservation(){
        $reservation = new Reservation();
        return $reservation;
    }
    public function addReservation(Request $request){
        $request->validate([
        'room_id' => 'required',
        'user_id' => 'required',
        'date_from' => 'required|date',
        'date_to' => 'required|date|after:date_from',
        'total_price' => 'required|numeric|min:0',
        ]);
        $reservation = new Reservation();
        $reservation->Id = null;
        $reservation->room_id=$request->input('room_id');
        $reservation->user_id=$request->input('user_id');
        $reservation->date_from = $request->input('date_from');
        $reservation->date_to = $request->input('date_to');
        $reservation->total_price = $request->input('total_price');
        $reservation->status ='new';
        $reservation->save();
        return $reservation;
    }

    public function deleteReservation(int $id){
        $reservation = Reservation::find($id);
        $reservation->is_active=0;
        $reservation->save();
    }
}