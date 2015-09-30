<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Message extends Model
{


    /**
     * The fields who are mass assignable
     *
     * @var string
     */
    protected $guarded = [];

    protected $with = ['user', 'channel'];

    /**
     * user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * channel
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}

