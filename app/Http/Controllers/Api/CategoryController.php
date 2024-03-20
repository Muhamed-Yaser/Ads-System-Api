<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __invoke(Request $request)
    {
        // Get all categories from database
        $catogories = Category::all();

        if($catogories) return ApiResponse::success(200 , 'Categories retrived successfully' , CategoryResource::collection($catogories));
        else return ApiResponse::error(200 , 'Categories are empty' ,[]);
    }
}