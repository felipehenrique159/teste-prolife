<?php

namespace Database\Factories;

use App\Models\Contatos;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContatosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contatos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->word,
        'email' => $this->faker->word,
        'telefone' => $this->faker->word,
        'mensagem' => $this->faker->text,
        'url_anexo' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
