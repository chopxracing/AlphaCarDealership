<?php

namespace App\Http\Controllers;

use App\Models\Calls;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateCallController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'car_id' => 'required|exists:catalogs,id',
        ]);

        Calls::create([
            'user_id' => Auth::id(),
            'catalog_id' => $data['car_id'] // используем catalog_id
        ]);

        return redirect()->back()->with('success', 'Заявка отправлена!');
    }
}
