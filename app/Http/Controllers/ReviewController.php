<?php

namespace App\Http\Controllers;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function addReview(Request $request) {  
        //validate incoming request 
        $this->validate($request, [
            'userIdReview' => 'required',
            'idReviewed' => 'required',
            'rating' => 'required'
        ]);
        
        try {
            $review = new Review;
            $review->userIdReview = $request->userIdReview;
            $review->idReviewed = $request->idReviewed;
            $review->rating = $request->rating;
        
            $review->save();
           
            //return successful response
            return response()->json(['review' => $review, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'addReview Failed'.$e], 409);
        }
    
    }

    public function getReview($id){
        {
            try {
                $review = Review::findOrFail($id);
    
                return response()->json(['review' => $review], 200);
    
            } catch (\Exception $e) {
    
                return response()->json(['message' => 'review not found!'], 404);
            }
    

    }

    public function getReview($idReviewd){

        try {
            $review = Review::findOrFail($idReviewd);

            return response()->json(['review' => $review], 200);

        } catch (\Exception $e) {

            return response()->json(['message' => 'review not found!'], 404);
        }

    }
}
