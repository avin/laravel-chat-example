<?php
namespace App\Repositories\Message;

use App\Events\MessageWasCreated;
use App\Repositories\EloquentBaseRepository;
use Event;
use Illuminate\Database\Eloquent\Model;


class EloquentMessageRepository extends EloquentBaseRepository implements MessageRepositoryInterface
{
    protected $message;

    public function __construct(Model $message)
    {
        parent::__construct($message);
        $this->message = $message;
    }

    public function getLast($from = 0, $count = 5){
        $query = $this->message->orderBy('id', 'desc');
        if ($from){
            $query = $query->skip($from);
        }
        return $query->take($count)->get()->reverse();
    }

    public function create(array $data) {
        $result = parent::create($data);
        Event::fire(new MessageWasCreated($result));
    }
}