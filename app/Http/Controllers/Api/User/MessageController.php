<?php

namespace App\Http\Controllers\Api\User;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageSendRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __invoke(MessageSendRequest $request)
    {
        $data = $request->validated();
        $record = Message::create($data);

        if($record) return ApiResponse::success(201 , 'Message sent successfully' , []);
        else return ApiResponse::error(200 , 'Message failed to be sent');
    }
}