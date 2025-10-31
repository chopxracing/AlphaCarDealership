<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function __invoke(){

        return view('main/contacts');
    }
}
