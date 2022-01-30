<?php

namespace App\Services;

use App\Models\User;
use Exception;

class UserService
{
    public $user;

    /**
     * UserService constructor.
     * @param User|null $model
     */
    public function __construct(User $model = null)
    {
        if ($model === null) {
            $model = new User();
        }

        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->model->orderBy('created_at', 'desc')->get();
    }

    /**
     * @param $attributes
     * @return User
     */
    public function store(array $attributes): User
    {
        $user = $this->model->create([
            'name'       => $attributes['name'],
            'email'      => $attributes['email'],
            'address_id' => $attributes['address_id'],
        ]);

        return $user;
    }

    /**
     * @param $attributes
     * @return User
     */
    public function update($attributes)
    {
        $this->model->update($attributes);

        return $this->model;
    }

    /**
     * @throws Exception
     */
    public function destroy()
    {
        $this->model->delete();
    }
}
