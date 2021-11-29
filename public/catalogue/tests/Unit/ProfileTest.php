<?php

namespace Tests\Unit;
use Tests\TestCase ;



class ProfileTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

     /** @test */
    public function accessToProfile()
    {
        $response = $this->post('/register', [
            'nom' => 'victor',
            'prenom' => 'hugo',
            'email' => 'hugo@user.com',
            'date_de_naissance'=> '1802-12-07',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response = $this->post('/login', [
            'email' => 'hugo@user.com',
            'password' => 'password',
        ]);
        $this->assertAuthenticated();

        
        $response = $this->get('/user/profile');
        $response->assertStatus(200);

    }

    /** @test */
    public function cantAccessToProfile()
    {        
        $response = $this->get('/user/profile');
        $response->assertStatus(302);

    }
 
}
