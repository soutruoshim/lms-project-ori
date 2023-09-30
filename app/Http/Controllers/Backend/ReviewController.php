<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth; 
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function StoreReview(Request $request){

        $course = $request->course_id;
        $instructor = $request->instructor_id;

        $request->validate([
            'comment' => 'required',
        ]);

        Review::insert([
            'course_id' => $course,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'rating' => $request->rate,
            'instructor_id' => $instructor,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Review Will Approve By Admin',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);  

    }// End Method 






}
 