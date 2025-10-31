<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calls extends Model
{

    protected $fillable = [
        'user_id',
        'catalog_id'
    ];

public function user_id(){
    return $this->belongsTo(User::class, 'user_id');
}
public function catalog_id(){
    return $this->belongsTo(Catalog::class, 'catalog_id');
}

}
