<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_us',
        'facebook',
        'twitter',
        'instagram',
        'terms',
        'phone',
        'email'
    ];
}