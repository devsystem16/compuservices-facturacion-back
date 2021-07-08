<?php

namespace Database\Factories;

use App\Models\Productos;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Productos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->text(20)
            ,'descripcion' => $this->faker->paragraph
            ,'codigo_barra' => "0000000-1111"
            ,'precio_publico' => $this->faker->numberBetween(5 , 20)
            ,'precio_tecnico' => $this->faker->numberBetween(5 , 20)
            ,'precio_compra'  => $this->faker->numberBetween(5 , 20)
            , 'precio_distribuidor' => $this->faker->numberBetween(5 , 20)
            ,'stock' => $this->faker->numberBetween(20 , 100)
        ];
    }
}
