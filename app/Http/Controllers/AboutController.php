<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __invoke(){

        return view('main/about');
    }
}
