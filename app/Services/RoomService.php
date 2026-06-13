<?php
namespace App\Services;

use App\Models\AmenityRoom;
use App\Models\Amenity;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomService
{
    public function getAllRooms(){
        return Room::all();
    }

    public function getRoomById(int $id){
        return Room::find($id);
    }

    public function updateRoom(Request $request, int $id){
        $room = Room::find($id);
        $room->name = $request->input('name');
        $room->hotel_id=$request->input('hotel_id');
        $room->description = $request->input('description');
        $room->room_number = $request->input('room_number');
        $room->capacity = $request->input('capacity');
        $room->price_per_night = $request->input('price');
        $room->save();
    }
  public function createRoom(){
        $hotel = new Room();
        return $hotel;
    }
    public function addRoom(Request $request){
        $room = new Room();
        $room->Id = null;
        $room->name = $request->input('name');
        $room->hotel_id=$request->inpit('hotel_id');
        $room->description = $request->input('description');
        $room->room_number = $request->input('room_number');
        $room->capacity = $request->input('capacity');
        $room->price_per_night = $request->input('price');
        $room->save();
        return $room;
    }

    public function addAmenity(int $id){
        $amenityRoom = new AmenityRoom();
        $amenityRoom->room_id=$id;
        $amenities=Amenity::all();
         return [
        'amenityRoom' => $amenityRoom,
        'amenities' => $amenities
    ];
    }
    public function addAmenityToDb(Request $request, int $id){
        $amenityRoom  = new AmenityRoom();
        $amenityRoom ->room_id=$id;
        $amenityRoom ->amenity_id=$request->input('amenity_id');
        $amenityRoom ->save();
    }   

}