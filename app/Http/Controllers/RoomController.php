<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\AmenityRoom;
use App\Services\RoomService;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    private RoomService $roomService;
    public function __construct()
    {
        $this->roomService = new RoomService();
    }
    public function index(Request $request){
        $rooms=$this->roomService->getAllRooms($request);
        return view('rooms.index',['rooms'=>$rooms, 'title'=>'Wszystkie pokoje']);
    }

    public function editView(int $id){
        $rooms=$this->roomService->getRoomById($id);
        return view('rooms.edit',['room'=>$rooms,'title'=>'Edytuj pokoj']);
    }
    public function createView(){
        $rooms= $this->roomService->createRoom();
        return view('rooms.create',['room'=>$rooms,'title'=>'Dodaj nowy pokój']);
    }
    public function updateRoom(Request $request, int $id){
        $this->roomService->updateRoom($request, $id);
        return redirect('rooms');
    }
    public function addToDatabase(Request $request){
        $this->roomService->addRoom($request);
        return redirect('rooms');
    }

    public function addAmenity(int $id){
        $data=$this->roomService->addAmenity($id);
        return view('rooms.add-amenity',['amenityRoom'=>$data['amenityRoom'], "amenities"=> $data['amenities']]);

    }

    public function addAmenityToDatabase(Request $request, int $id){
        $this->roomService->addAmenityToDb($request, $id);
        return redirect('rooms');
    }

}
