<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelService
{
    public function getAllHotels()
    {
        return Hotel::all();
    }

    public function getHotelById(int $id)
    {
        return Hotel::find($id);
    }

    public function updateHotel(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);
        $hotel = Hotel::find($id);
        $hotel->name = $request->input('name');
        $hotel->description = $request->input('description');
        $hotel->city = $request->input('city');
        $hotel->address = $request->input('address');
        $hotel->save();
    }
    public function createHotel(){
        $hotel = new Hotel();
        return $hotel;
    }
    public function addToDatabase(Request $request){
        $hotel = new Hotel();
        $hotel->Id = null;
        $hotel->name = $request->input('name');
        $hotel->description = $request->input('description');
        $hotel->city = $request->input('city');
        $hotel->address = $request->input('address');
        $hotel->save();
        return $hotel;
    }
}