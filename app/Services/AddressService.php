<?php

namespace App\Services;

use App\Models\Address;
use Exception;

class AddressService
{
    public $address;

    /**
     * @param Address|null $model
     */
    public function __construct(Address $model = null)
    {
        if ($model === null) {
            $model = new Address();
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
     * @param array $attributes
     * @return Address
     */
    public function store(array $attributes): Address
    {
        $address = $this->model->create([
            'line_one' => $attributes['line_one'],
            'line_two' => $attributes['line_two'],
            'postcode' => $attributes['postcode'],
            'district' => $attributes['district'],
            'state'    => $attributes['state'],
            'country'  => $attributes['country'],
        ]);

        return $address;
    }

    /**
     * @param array $attributes
     * @return Address
     */
    public function update(array $attributes): Address
    {
        $this->model->update([
            'line_one' => $attributes['line_one'],
            'line_two' => $attributes['line_two'],
            'postcode' => $attributes['postcode'],
            'district' => $attributes['district'],
            'state'    => $attributes['state'],
            'country'  => $attributes['country'],
        ]);

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
