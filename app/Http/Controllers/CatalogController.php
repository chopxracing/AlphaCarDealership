<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Http\Filters\CatalogFilter;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function __invoke(Request $request)
    {
        $catalogs = Catalog::with(['engineType', 'transmissionType'])
            ->filter(new CatalogFilter($request->all()))
            ->paginate(12);

        // Получаем уникальные марки и модели для фильтров
        $carNames = Catalog::distinct()->pluck('carName')->sort();
        $carModels = Catalog::distinct()->pluck('carModel')->sort();

        return view('main/catalog', compact('catalogs', 'carNames', 'carModels'));
    }
}
