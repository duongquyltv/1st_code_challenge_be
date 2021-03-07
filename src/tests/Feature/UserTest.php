<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use WithFaker;
    
    private $password = "123456";
    private $filters = array(
        'current_page'  => 1,
        'limit'         => 50
    );

    public function testUserLogin()
    {    
        $fullname = $this->faker->name();
       	$email = $this->faker->email();

        $user = new User([
            'full_name' => $fullname,
            'email'     => $email,
            'password'  => bcrypt($this->password)
        ]); 

        $user->save();  

        $response = $this->postJson('/api/login', [
            'email'     => $email,
            'password'  => $this->password
        ]);

        $response->assertStatus(200);
        $this->assertAuthenticated();
    }

    public function testGetListUser()
    {   
        $fullname = $this->faker->name();
       	$email = $this->faker->email();

        $user = new User([
            'full_name' => $fullname,
            'email'     => $email,
            'password'  => bcrypt($this->password)
        ]); 

        $user->save();  

        $response = $this->postJson('/api/login', [
            'email'     => $email,
            'password'  => $this->password
        ]);
        $token = !empty($response['data']['token']) ? $response['data']['token'] : null;
        
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => $token,
        ])->json('GET', '/api/user/list', $this->filters);

        $response->assertStatus(200);
    }
}   
