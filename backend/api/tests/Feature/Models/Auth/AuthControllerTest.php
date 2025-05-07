<?php

namespace Models\Auth;

use Backend\Models\User\User;
use Illuminate\Support\Str;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthControllerTest extends TestCase {

    public function testShouldLoginWithSuccess(): void
    {
        $password = 'teste@1234';

        $user = User::factory()
                    ->unverified()
                    ->create([
                        'password' => $password
                    ]);

        $payload = [
            'email'    => $user->email,
            'password' => $password
        ];

        $response = $this->postJson('/v1/login', $payload)
                         ->assertOk()
                         ->json();

        $expected = [
            'uuid'              => Str::upper($user->uuid),
            'email'             => $user->email,
            'name'              => $user->name,
            'surname'           => $user->surname,
            'phone'             => $user->phone,
            'email_verified_at' => $user->email_verified_at,
            'phone_verified_at' => $user->phone_verified_at,
        ];

        unset($response['data']['token']);

        $this->assertEquals($expected, $response['data']);
    }

    public function testShouldGetMe(): void
    {
        $user = User::factory()
                    ->unverified()
                    ->create();

        Sanctum::actingAs($user);

        $response = $this->getJson('/v1/me')
                         ->assertOk()
                         ->json();

        $expected = [
            'uuid'              => $user->uuid,
            'email'             => $user->email,
            'name'              => $user->name,
            'surname'           => $user->surname,
            'phone'             => $user->phone,
            'email_verified_at' => $user->email_verified_at,
            'phone_verified_at' => $user->phone_verified_at,
        ];

        unset($response['data']['token']);

        $this->assertEquals($expected, $response['data']);
    }

    public function test_should_logout(): void
    {
        //Set
        $user = User::factory()
                    ->unverified()
                    ->create();

        Sanctum::actingAs($user);

        //Expects
        $expected = [
            'message' => 'Deslogado com sucesso.'
        ];

        //Act
        $response = $this->postJson('/v1/logout')
                         ->assertOk()
                         ->json();

        //Assert
        $this->assertEquals($expected, $response);
    }
}
