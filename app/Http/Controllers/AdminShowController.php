<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Review;
use Illuminate\Http\Request;

class AdminShowController extends Controller
{
    public function __invoke(){
    $catalogs = Catalog::all();
        return view('admin/admin', compact('catalogs'));
    }
}
