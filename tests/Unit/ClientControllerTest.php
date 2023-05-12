<?php

namespace Tests\Unit;

use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ClientControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */


    public function test_can_create_client()
    {
        // Create a user with required permissions
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);
        $this->actingAs($user); // Authenticate the test as the user

        // Make a post request to create a client
        $data = [
            'name' => 'Test Client',
            'email' => 'testclient@example.com',
            'phone' => '1234567890',
        ];
        $response = $this->post(route('clients.store'), $data);

        // Assert that the request was successful and redirected to the expected route
        $response->assertRedirect(route('clients.index'));
        $this->assertDatabaseHas('clients', [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);
    }

}
