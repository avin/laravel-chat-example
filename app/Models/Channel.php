<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Channel extends Model
{


    /**
     * The fields who are mass assignable
     *
     * @var string
     */
    protected $guarded = [];

    /**
     * messages
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

}
