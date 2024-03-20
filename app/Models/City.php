<?php

namespace App\Models;

use App\Models\District;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    //-------------Relationships--------------//

    public function Districts () {

        return $this->hasMany(District::class);
    }
}