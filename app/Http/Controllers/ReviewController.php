<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __invoke(){

        $reviews = new Review();
        return view('review', ['reviews' => $reviews->all()]);
    }
}
