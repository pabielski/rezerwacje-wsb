<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\AmenityRoom;
use App\Services\RoomService;
use Illuminate\Http\Request;
use App\Services\HotelService;
class RoomController extends Controller
{
    private RoomService $roomService;
    private HotelService $hotelService;
    public function __construct()
    {
        $this->roomService = new RoomService();
        $this->hotelService = new HotelService();
    }
    public function index(Request $request){
        $rooms=$this->roomService->getAllRooms($request);
        return view('rooms.index',['rooms'=>$rooms, 'title'=>'Wszystkie pokoje']);
    }

    public function editView(Request $request, int $id){
        $rooms=$this->roomService->getRoomById($id);
        $hotels=$this->hotelService->getAllHotels($request);
        return view('rooms.edit',['room'=>$rooms,'title'=>'Edytuj pokoj','hotels' => $hotels]);
    }
    public function createView(Request $request){
        $rooms= $this->roomService->createRoom();
        $hotels=$this->hotelService->getAllHotels($request);
        return view('rooms.create',['room'=>$rooms,'title'=>'Dodaj nowy pokój','hotels' => $hotels]);
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

    public function delete(int $id)
    {
        $this->roomService->deleteRoom($id);
        return redirect('rooms');
    }
}
