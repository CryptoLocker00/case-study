<?php

namespace App\Services;

use App\Models\Administrator;
use Exception;

class AdministratorService
{
    public $administrator;

    /**
     * AdministratorService constructor.
     * @param Administrator|null $model
     */
    public function __construct(Administrator $model = null)
    {
        if ($model === null) {
            $model = new Administrator();
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
     * @return Administrator
     */
    public function store(array $attributes): Administrator
    {
        $administrator = $this->model->create([
            'name'     => $attributes['name'],
            'email'    => $attributes['email'],
            'password' => bcrypt($attributes['password']),
        ]);

        return $administrator;
    }

    /**
     * @param $attributes
     * @return Administrator
     */
    public function update($attributes)
    {
        if (isset($attributes['password']) && $attributes['password']) {
            $attributes['password'] = bcrypt($attributes['password']);
        } else {
            unset($attributes['password']);
        }

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
