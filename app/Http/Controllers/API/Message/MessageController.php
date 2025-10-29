<?php

namespace App\Http\Controllers\API\Message;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Repositories\MessageRepository;

class MessageController extends Controller
{
    public $messageRepo;
    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepo = $messageRepository;
    }

    public function store(MessageRequest $request)
    {
        $this->messageRepo->storeByRequest($request);
        return $this->json('Message send successfully');
    }
}
