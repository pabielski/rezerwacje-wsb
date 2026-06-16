<?php

namespace App\Http\Controllers;

use App\Services\ReservationService;
use Illuminate\Http\Request;
use App\Services\RoomService;
use Illuminate\Support\Facades\Auth;
class ClientReservationController extends Controller
{
    private ReservationService $reservationService;
    private RoomService $roomService;

    public function __construct()
    {
        $this->reservationService = new ReservationService();
        $this->roomService = new RoomService();
    }

    public function index()
    {
        $reservations = $this->reservationService
        ->getReservationsByUserId(Auth::id());
    
        return view('clientReservations.index', [
            'reservations' => $reservations,
            'title' => 'Moje rezerwacje'
        ]);
    }

    public function createView(Request $request)
    {
        $rooms = $this->roomService->getAllRooms($request);
    
        return view('clientReservations.create', [
            'rooms' => $rooms,
            'title' => 'Nowa rezerwacja'
        ]);
    }
    public function addToDatabase(Request $request)
{
    $reservation = $this->reservationService->addClientReservation($request);

    if ($reservation == null) {
        return back()
            ->withErrors(['room_id' => 'Ten pokój jest zajęty w wybranym terminie.'])
            ->withInput();
    }

    return redirect('/my-reservations');
}
}