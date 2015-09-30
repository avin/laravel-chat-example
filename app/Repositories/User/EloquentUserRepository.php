<?php
namespace App\Repositories\User;

use App\Repositories\EloquentBaseRepository;
use Illuminate\Database\Eloquent\Model;


class EloquentUserRepository extends EloquentBaseRepository implements UserRepositoryInterface
{
    protected $user;

    public function __construct(Model $user)
    {
        parent::__construct($user);
        $this->user = $user;
    }

}