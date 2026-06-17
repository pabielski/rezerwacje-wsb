<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelService
{
    public function getAllHotels(Request $request)
    {
        $query = Hotel::where('is_active', 1);

        if ($request->filled('search')) {
            $query->whereAny(
                ['name', 'city', 'address'],
                'like',
                '%' . $request->input('search') . '%'
            );
        }

        if ($request->filled('city')) {
            $query->where('city', 'like', '%' . $request->input('city') . '%');
        }

        return $query->get();
    }

    public function getHotelById(int $id)
    {
        return Hotel::find($id);
    }

    public function updateHotel(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
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
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);
        $hotel = new Hotel();
        $hotel->name = $request->input('name');
        $hotel->description = $request->input('description');
        $hotel->city = $request->input('city');
        $hotel->address = $request->input('address');
        $hotel->save();
        return $hotel;
    }

    public function deleteHotel(int $id): void
    {
        $hotel = Hotel::find($id);

        if ($hotel == null) {
            return;
        }

        $hotel->is_active = 0;
        $hotel->save();
    }
}