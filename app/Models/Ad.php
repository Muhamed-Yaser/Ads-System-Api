<?php

namespace App\Models;

use App\Models\User;
use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'group_id',
        'title',
        'slug',
        'text',
        'phone',
    ];

     //-------------Relationships--------------//

     public function user () {

        return $this->belongsTo(User::class);
    }

    public function group () {

        return $this->belongsTo(Group::class);
    }
}