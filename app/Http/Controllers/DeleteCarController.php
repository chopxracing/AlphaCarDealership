<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Review;
use Illuminate\Http\Request;

class DeleteCarController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:catalogs,id'
        ]);

        $catalog = Catalog::findOrFail($request->car_id);
        $catalog->delete();

        return redirect()->back()->with('success', 'Автомобиль удален!');
    }
}
