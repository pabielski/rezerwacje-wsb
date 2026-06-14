<?php

namespace App\Http\Controllers;

use App\Services\AmenityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AmenityController extends Controller
{
    private AmenityService $amenityService;

    public function __construct()
    {
        $this->amenityService= new AmenityService();
    }
    public function index (Request $request){
        $amenities= $this->amenityService->getAllAmenities($request);
        return view('amenity.index',['amenities' =>  $amenities, 'title'=>'Strona z wyposażeniem']);
    }

    public function getAmenityView(int $id){
        $amenity = $this->amenityService->getAmenityById($id);
        return view('amenity.edit',['amenity' => $amenity, 'title' => "Edytuj to wyposażenie"]);
    }

    public function getCreateView(){
        $amenity = $this->amenityService->getCreateView();
        return view('amenity.create',['amenity'=>$amenity, 'title'=> "Dodaj nowe wyposażenie"]);
    }

    public function update(Request $request, int $id){
        $this->amenityService->updateAmenity($request,$id);
        return redirect('amenities');
    }
    public function create(Request $request){
        $this->amenityService->addAmenity($request);
        return redirect('amenities');
    }
    public function delete(int $id){
        $this->amenityService->deleteAmenity($id);
        return redirect('amenities');

    }
}
