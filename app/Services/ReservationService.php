<?php
namespace App\Services;


use Illuminate\Http\Request;
use App\Models\Reservation;
class ReservationService
{
    public function getAllReservations(Request $request)
    {
        $query = Reservation::where('is_active', 1);

        if ($request->filled('date_from')) {
            $query->where('date_from', '>=', $request->input('date_from'));
        }

        if ($request->filled('date_to')) {
            $query->where('date_to', '<=', $request->input('date_to'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('room_id')) {
            $query->where('room_id', $request->input('room_id'));
        }

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->input('user_id'));
        }

        if ($request->filled('search')) {
            $query->whereAny(
                ['guest_first_name', 'guest_last_name'],
                'like',
                '%' . $request->input('search') . '%'
            );
        }

        return $query->get();
    }

    public function getReservationById(int $id){
        return Reservation::find($id);
    }

    public function updateReservation(Request $request, int $id){
        $request->validate([
        'room_id' => 'required',
        'user_id' => 'required',
        'guest_first_name' => 'nullable|string|max:255',
        'guest_last_name' => 'nullable|string|max:255',
        'guest_email' => 'nullable|email|max:255',
        'guest_phone' => 'nullable|string|max:50',
        'date_from' => 'required|date',
        'date_to' => 'required|date|after:date_from',
        'total_price' => 'required|numeric|min:0',
        'status' => 'required',
        ]);
        $reservation = Reservation::find($id);
        $reservation->room_id=$request->input('room_id');
        $reservation->user_id=$request->input('user_id');
        $reservation->guest_first_name = $request->input('guest_first_name');
        $reservation->guest_last_name = $request->input('guest_last_name');
        $reservation->guest_email = $request->input('guest_email');
        $reservation->guest_phone = $request->input('guest_phone');
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
        'guest_first_name' => 'nullable|string|max:255',
        'guest_last_name' => 'nullable|string|max:255',
        'guest_email' => 'nullable|email|max:255',
        'guest_phone' => 'nullable|string|max:50',
        'date_from' => 'required|date',
        'date_to' => 'required|date|after:date_from',
        'total_price' => 'required|numeric|min:0',
        ]);
        $reservation = new Reservation();
        $reservation->Id = null;
        $reservation->room_id=$request->input('room_id');
        $reservation->user_id=$request->input('user_id');
        $reservation->guest_first_name = $request->input('guest_first_name');
        $reservation->guest_last_name = $request->input('guest_last_name');
        $reservation->guest_email = $request->input('guest_email');
        $reservation->guest_phone = $request->input('guest_phone');
        $reservation->date_from = $request->input('date_from');
        $reservation->date_to = $request->input('date_to');
        $reservation->total_price = $request->input('total_price');
        $reservation->status ='new';
        $reservation->save();
        return $reservation;
    }

    public function deleteReservation(int $id){
        $reservation = Reservation::find($id);

        if ($reservation == null) {
            return;
        }

        $reservation->is_active = 0;
        $reservation->save();
    }
}
