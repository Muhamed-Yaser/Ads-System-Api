<?php

namespace App\Services\AdminServices;

use Exception;
use App\Models\Message;
use App\Helpers\ApiResponse;
use App\Http\Requests\Adrequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\AdResource;
use Illuminate\Support\Facades\DB;

class MessageService
{
    public function index()
    {
        $messages = Message::paginate(10);
        return view('Dashboard.Message.messages', compact('messages'));
    }

    public function destroyMessage($messageId)
    {
        $message = Message::whereId($messageId)->first();

        $message->delete();

        return redirect()->route('messages');
    }
}
