<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $client = Client::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();

        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'client_id' => $client->id,
            'assigned_user_id' => $user->id,
            'status' => $this->faker->boolean,
            'deadline' => $this->faker->date('Y-m-d', 'now + 1 year'),
        ];
    }


}
