<?php

namespace Modules\Pay\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PayOrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Pay\Entities\PayOrder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }
}

