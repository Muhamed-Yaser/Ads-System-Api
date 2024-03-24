<?php

namespace App\Models;

use App\Models\Ad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'status'
    ];

    //----------------Relatoinships----------------//

    public function ads()
    {
        return  $this->hasMany(Ad::class);
    }

    // public function approvedAds()
    // {
    //     return  $this->hasMany(Ad::class)->where('status', AdStatus::APPROVED);
    // }

    // public function activities()
    // {
    //     return  $this->hasMany(Activity::class);
    // }

    // public function approvedActivities()
    // {
    //     return  $this->hasMany(Activity::class)->where('status', ActivityStatus::APPROVED);
    // }
}