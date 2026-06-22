<?php
namespace App\Services;

use App\Models\AmenityRoom;
use App\Models\Amenity;
use Illuminate\Http\Request;
use App\Models\Room;
class RoomService
{
    public function getAllRooms(Request $request){
        $query = Room::where('is_active', 1);

        if ($request->filled('search')) {
            $query->whereAny(
                ['name', 'room_number', 'description'],
                'like',
                '%' . $request->input('search') . '%'
            );
        }

        if ($request->filled('hotel_id')) {
            $query->where('hotel_id', $request->input('hotel_id'));
        }

        if ($request->filled('capacity_min')) {
            $query->where('capacity', '>=', $request->input('capacity_min'));
        }

        return $query->get();
    }

    public function getRoomById(int $id){
        return Room::find($id);
    }

    public function updateRoom(Request $request, int $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'hotel_id' => 'required|integer|min:1',
            'room_number' => 'required|string|max:50',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
        ]);

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
        $request->validate([
            'name' => 'required|string|max:255',
            'hotel_id' => 'required|integer|min:1',
            'room_number' => 'required|string|max:50',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
        ]);

        $room = new Room();
        $room->name = $request->input('name');
        $room->hotel_id=$request->input('hotel_id');
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
        $request->validate([
            'amenity_id' => 'required|integer|exists:amenities,id',
        ]);

        $amenityRoom  = new AmenityRoom();
        $amenityRoom ->room_id=$id;
        $amenityRoom ->amenity_id=$request->input('amenity_id');
        $amenityRoom ->save();
    }

    public function deleteRoom(int $id): void
    {
        $room = Room::find($id);

        if ($room == null) {
            return;
        }

        $room->is_active = 0;
        $room->save();
    }
}