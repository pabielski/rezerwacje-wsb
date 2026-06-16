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

    public function index(Request $request)
    {
        $hotels = $this->hotelService->getAllHotels($request);
        return view('hotels.index', ['hotels' => $hotels, 'title' => 'Hotels']);
    }

    public function editView(int $id){
        $model = $this->hotelService->getHotelById($id);
        return view('hotels.edit', ['model' => $model, 'title' => 'Edit Hotel']);
    }

    public function update(Request $request, int $id){
        $this->hotelService->updateHotel($request, $id);
        return redirect('hotels');
    }   

    public function createView(){
        $model = $this->hotelService->createhotel();
        return view('hotels.create', ['model' => $model, 'title' => 'Create Hotel']);
    }

    public function addToDatabase(Request $request){
        $this->hotelService->addToDatabase($request);
        return redirect('hotels');
    }

    public function delete(int $id)
    {
        $this->hotelService->deleteHotel($id);
        return redirect('hotels');
    }
}
