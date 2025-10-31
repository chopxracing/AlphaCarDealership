<?php

namespace App\Http\Controllers;

use App\Models\Calls;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateCarController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'carName' => 'required',
            'carModel' => 'required',
            'carYear' => 'required',
            'carColor' => 'required',
            'carImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'carMileage' => 'required',
            'carPrice' => 'required',
            'carCount' => 'required',
            'is_new' => 'required',
            'carEngineType' => 'required',
            'carTransmissionType' => 'required',
        ]);
        $imageName = time().'.'.$request->carImage->extension();
        $request->carImage->move(public_path('images'), $imageName);

        // Сохраняем путь к изображению
        $data['carImage'] = 'images/'.$imageName;
        Catalog::create($data);
        return redirect()->back()->with('success', 'Автомобиль создан!');
    }
}
