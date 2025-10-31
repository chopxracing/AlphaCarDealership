<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Traits\Filterable;

class Catalog extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'carName',
        'carModel',
        'carYear',
        'carColor',
        'carPrice',
        'carCount',
        'carImage',
        'is_new',
        'carMileage',
        'carEngineType',
        'carTransmissionType',
    ];

    // В модели Catalog
    public function transmissionType()
    {
        return $this->belongsTo(carTransmissionType::class, 'carTransmissionType');
    }

    public function engineType()
    {
        return $this->belongsTo(carEngineType::class, 'carEngineType');
    }
}
