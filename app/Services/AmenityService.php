<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Amenity;

class AmenityService
{
    public function getAllAmenities(Request $request){
        $query = Amenity::where('is_active', 1);

        if ($request->filled('search')) {
            $query->whereAny(
                ['name', 'description'],
                'like',
                '%' . $request->input('search') . '%'
            );
        }

        return $query->get();
    }

    //widok edycji
    public function getAmenityById($id){
    return Amenity::find($id);
    }

    //widok tworzenia
    public function getCreateView(){
        $amenity = new Amenity();
        return $amenity;
    }
     public function updateAmenity(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);
        $amenity = Amenity::find($id);
        $amenity->name = $request->input('name');
        $amenity->description = $request->input('description');
        $amenity->save();
    }
     public function addAmenity(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $amenity = new Amenity();
        $amenity->Id = null; //??
        $amenity->name = $request->input('name');
        $amenity->description = $request->input('description');
        $amenity->save();
        return $amenity;
    }

    public function deleteAmenity($id){
        $amenity = Amenity::find($id);

        if ($amenity == null) {
            return;
        }

        $amenity->is_active = 0;
        $amenity->save();
    }
}