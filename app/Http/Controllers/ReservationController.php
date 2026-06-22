<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Services\ReservationService;
use Illuminate\Http\Request;
use App\Services\RoomService;
class ReservationController extends Controller
{
   private ReservationService $reservationService;
   private RoomService $roomService;
    public function __construct()
    {
        $this->reservationService = new ReservationService();
        $this->roomService = new RoomService();
    }
    public function index(Request $request){
        $reservations=$this->reservationService->getAllReservations($request);
        return view('reservations.index',['reservations'=>$reservations, 'title'=>'Wszystkie rezerwacje']);
    }


    public function editView(Request $request, int $id){
        $reservation=$this->reservationService->getReservationById($id);
        $rooms = $this->roomService->getAllRooms($request);
        return view('reservations.edit',['reservation'=>$reservation,'title'=>'Edytuj rezerwacje', 'rooms' => $rooms]);
    }

    public function createView(Request $request){
        $rooms = $this->roomService->getAllRooms($request);
        $reservation= $this->reservationService->createReservation();
        return view('reservations.create',['reservation'=>$reservation,'title'=>'Dodaj nową rezerwację', 'rooms' => $rooms]);
    }
    public function updateReservation(Request $request, int $id){
        $this->reservationService->updateReservation($request, $id);
        return redirect('reservations');
    }
    public function addToDatabase(Request $request){
        $this->reservationService->addReservation($request);
        return redirect('reservations');
    }
    public function deleteReservation(int $id){
        $this->reservationService->deleteReservation($id);
         return redirect('reservations'); 
    }
}