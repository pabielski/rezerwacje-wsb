<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HotelService;

class HotelsController extends Controller
{
    private HotelService $hotelService;

    public function __construct()
    {
        $this->hotelService = new HotelService();
    }

    public function index()
    {
        $hotels = $this->hotelService->getAllHotels();
        return view('hotel.index', ['hotels' => $hotels], ['title' => 'Hotels']);
    }
}
