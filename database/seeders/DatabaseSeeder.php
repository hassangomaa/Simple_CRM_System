<?php
namespace Database\Seeders;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        DB::statement('SET FOREIGN_KEY_CHECKS=0');
//
//        DB::table('users')->truncate();

        $this->call([ UsersTableSeeder::class]);

//        DB::statement('SET FOREIGN_KEY_CHECKS=1');


        // Create 50 clients using the Client factory
        Client::factory(50)->create();

        // Create 50 projects using the Project factory
        Project::factory(50)->create();
        User::factory(50)->create();

    }
}
