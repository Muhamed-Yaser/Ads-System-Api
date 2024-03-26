<?php

namespace App\Http\Controllers\Api\User;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\GroupResource;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function __invoke()
    {
        // Get all categories from database
        $groups = Group::all();

        if($groups) return ApiResponse::success(200 , 'groups retrived successfully' , GroupResource::collection($groups));
        else return ApiResponse::error(200 , 'groups are empty' ,[]);

   }
}
