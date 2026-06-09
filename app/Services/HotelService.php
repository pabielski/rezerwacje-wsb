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
}