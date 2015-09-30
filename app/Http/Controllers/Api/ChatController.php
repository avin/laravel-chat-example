<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Chat\GetRequest;
use App\Http\Requests\Api\Chat\SendRequest;
use App\Repositories\Message\MessageRepositoryInterface;
use Auth;

class ChatController extends Controller {

    public function get(GetRequest $request, MessageRepositoryInterface $messageRepository){
        $count = $request->input('count', 5);
        $from = $request->input('from', 0);
        $messages = $messageRepository->getLast($from, $count);

        return $this->makeApiResult($messages, 'Get results');
    }


    public function send(SendRequest $request, MessageRepositoryInterface $messageRepository){

        $message = $messageRepository->create([
            'content' => array_get($request['message'], 'content'),
            'user_id' => Auth::user()->id,
        ]);

        if ($message){
            return $this->makeApiResult($message, 'Message successfully sent');
        } else {
            return $this->makeApiError(0, 'Message send error');
        }
    }

}