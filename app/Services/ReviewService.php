<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
class ReviewService
{
    public function getAllReviews(Request $request)
    {
        $query = Review::with('user')->where('is_active', 1);

        if ($request->filled('search')) {
            $query->whereAny(
                ['rating', 'user_id', 'reservation_id'],
                'like',
                '%' . $request->input('search') . '%'
            );
        }
        return $query->get();
    }

    public function getReviewsForCurrentUser(Request $request)
    {
        $query = Review::with('user')->where('user_id', Auth::id())->where('is_active', 1);
        if ($request->filled('search')) {
            $query->whereAny(
                ['rating', 'user_id', 'reservation_id'],
                'like',
                '%' . $request->input('search') . '%'
            );
        }
        return $query->get();
    }

    public function getreviewById(int $id)
    {
        return Review::find($id);
    }

    public function updateReview(Request $request, int $id)
    {
        $request->validate([
            'reservation_id' => 'required|integer|exists:reservations,id',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|max:1000',
        ]);
        $review = Review::find($id);
        if ($review->user_id !== Auth::id()) {
            abort(403);
        }
        $review->reservation_id = $request->input('reservation_id');
        $review->rating = $request->input('rating');
        $review->content = $request->input('content');
        $review->save();
    }
    public function createReview(){
        $review = new Review();
        return $review;
    }

    public function getUserReservations()
    {
        return Reservation::where('user_id', Auth::id())->where('is_active', 1)->get();
    }
    public function addToDatabase(Request $request){
        $request->validate([
            'reservation_id' => 'required|integer|exists:reservations,id',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|max:1000',
        ]);
        $reservation = Reservation::find($request->input('reservation_id'));
        if ($reservation->user_id !== Auth::id()) {
            abort(403);
        }
        $review = new Review();
        $review->reservation_id = $request->input('reservation_id');
        $review->user_id = Auth::id();
        $review->rating = $request->input('rating');
        $review->content = $request->input('content');
        $review->save();
        return $review;
    }

    public function deleteReview(int $id): void
    {
        $review = Review::find($id);
          if ($review == null) {
            return;
        }
        if ($review->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
        abort(403);
        }
      

        $review->is_active = 0;
        $review->save();
    }
}