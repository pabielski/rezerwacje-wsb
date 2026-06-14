<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Services\ReservationService;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
   private ReservationService $reservationService;

    public function __construct()
    {
        $this->reservationService = new ReservationService();
    }
    public function index(){
        $reservations=$this->reservationService->getAllReservations();
        return view('reservations.index',['reservations'=>$reservations, 'title'=>'Wszystkie rezerwacje']);
    }


    public function editView(int $id){
        $reservation=$this->reservationService->getReservationById($id);
        return view('reservations.edit',['reservation'=>$reservation,'title'=>'Edytuj rezerwacje']);
    }

    public function createView(){
        $reservation= $this->reservationService->createReservation();
        return view('reservations.create',['reservation'=>$reservation,'title'=>'Dodaj nową rezerwację']);
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