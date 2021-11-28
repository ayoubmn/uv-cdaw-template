<?php

namespace Tests\Unit;
use Tests\TestCase ;



class RegisterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

     /** @test */
    public function home_page()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

    }

    /** @test */
    public function register()
    {
        $response = $this->post('/register', [
            'nom' => 'Test_nom',
            'prenom' => 'Test_prenom',
            'email' => 'test@user.com',
            'date_de_naissance'=> '1998-12-07',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $this->assertAuthenticated();

    }
}
