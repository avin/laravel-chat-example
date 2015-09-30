<?php
namespace App\Repositories\Channel;

use App\Repositories\EloquentBaseRepository;
use Illuminate\Database\Eloquent\Model;


class EloquentChannelRepository extends EloquentBaseRepository implements ChannelRepositoryInterface
{
    protected $channel;

    public function __construct(Model $channel)
    {
        parent::__construct($channel);
        $this->channel = $channel;
    }

}