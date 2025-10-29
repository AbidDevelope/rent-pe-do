<?php

namespace App\Repositories;

use App\Http\Requests\MessageRequest;
use App\Models\Message;

class MessageRepository extends Repository
{
    public function model()
    {
        return Message::class;
    }

    public function storeByRequest(MessageRequest $request)
    {
        $message = $this->model()::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->contact,
            'occupation' => $request->occupation,
            'message' => $request->message
        ]);

        return $message;
    }
}
