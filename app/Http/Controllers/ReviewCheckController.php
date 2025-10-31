<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewCheckController extends Controller
{
    public function __invoke(Request $request)
    {
        $valid = $request->validate([
            'email' => 'required|email|min:4|max:100',
            'subject' => 'required|min:2|max:100',
            'message' => 'min:4|max:500',
        ]);

        $review = new Review();
        $review->email = $request->input("email");
        $review->subject = $request->input("subject");
        $review->message = $request->input("message");

        $review->save();

        return redirect('/review');
    }
}
