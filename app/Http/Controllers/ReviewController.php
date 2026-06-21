<?php

namespace App\Http\Controllers;

use App\Services\ReviewService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    private ReviewService $reviewService;

    public function __construct()
    {
        $this->reviewService = new ReviewService();
    }

    public function index(Request $request)
    {
        $reviews = $this->reviewService->getAllReviews($request);
        return view('reviews.index', ['reviews' => $reviews, 'title' => 'Reviews']);
    }

    public function myReviews(Request $request)
    {
        $reviews = $this->reviewService->getReviewsForCurrentUser($request);
        return view('reviews.my-reviews', ['reviews' => $reviews, 'title' => 'Moje opinie']);
    }

    public function editView(int $id){
        $review = $this->reviewService->getreviewById($id);
        $reservations = $this->reviewService->getUserReservations();
        return view('reviews.edit', ['review' => $review, 'reservations' => $reservations, 'title' => 'Edit review']);
    }

    public function update(Request $request, int $id){
        $this->reviewService->updateReview($request, $id);
        return redirect('my-reviews')->with('status', 'Opinia została zaktualizowana.');
    }   

    public function createView(){
        $review = $this->reviewService->createReview();
        $reservations = $this->reviewService->getUserReservations();
        return view('reviews.create', ['review' => $review, 'reservations' => $reservations, 'title' => 'Create review']);
    }

    public function addToDatabase(Request $request){
        $this->reviewService->addToDatabase($request);
        return redirect('my-reviews')->with('status', 'Opinia została dodana.');
    }

    public function delete(int $id)
    {
        $this->reviewService->deleteReview($id);
        return redirect('my-reviews')->with('status', 'Opinia została usunięta.');
    }
}
