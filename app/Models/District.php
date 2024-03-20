<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'city_id',
    ];

    //-------------- Relationships --------------------//
    public function city () {

        return $this->belongsTo(City::class);
    }
}