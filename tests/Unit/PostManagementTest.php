<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostManagementTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $credential = [
            'email' => 'admin@admin.com',
            'password' => '12345678'
        ];

        $response = $this->post('login',$credential);
        $response->assertSessionMissing('errors');
    }

    public function testRegistro(){
        $this->withoutExceptionHandling();

        $response = $this->post('/register', [
            'name' => 'David',
            'surname' => 'Mateo',
            'email' => 'davidmateo@gmail.com',
            'cicle_id' => '2',
            'password' => '12345678',
            'email_verified_at' =>null,
        ]);

        // Primero comprobamos que todo ha ido bien
        $response->assertStatus(200);
        //Cambiar el número '16' por el número de artículos que hay despues de eliminar este
        // $this->assertCount(16, User::all());

        // Y comprobamos que sea el que acabamos de insertar
        $user = User::where('email', '=', 'davidmateo@gmail.com')->first();
        $this->assertEquals($user->name, 'David');
        $this->assertEquals($user->surname, 'Mateo');
        $this->assertEquals($user->email, 'davidmateo@gmail.com');
        $this->assertEquals($user->password, '12345678');
        $this->assertEquals($user->cicle_id,'2');
        $this->assertEquals($user->email_verified_at,'null');
        
    }

    // public function testArticleInsert(){

    //     $this->withoutExceptionHandling();

    //     $response = $this->post('/articulosTest', [
    //         'name' => 'Sofá',
    //         'price_min' => 50,
    //         'price_max' => 90,
    //         'color_name' => 'Negro',
    //         'weight' => 25,
    //         'size' => '30cm',
    //         'family_id' => 2,
    //         'description' => 'Nuevo sofa',
    //     ]);

    //     $response->assertStatus(200);
    //     // Comprobamos que hay 1 registro en la BD (se ha insertado)
    //     $this->assertCount(11, Articles::all());

    //     // Y comprobamos que sea el que acabamos de insertar
    //     $article = Articles::where('name', '=', 'Sofá')->first();
    //     $this->assertEquals($article->name, 'Sofá');
    //     $this->assertEquals($article->price_min, 50);
    //     $this->assertEquals($article->price_max, 90);
    //     $this->assertEquals($article->color_name, 'Negro');
    //     $this->assertEquals($article->family_id, 2);
    //     $this->assertEquals($article->description, 'Nuevo sofa de Ikea');

    // }

    // public function testArticleDelete(){
    //     $this->withoutExceptionHandling();

    //     $article = factory(Articles::class)->create();

    //     $response = $this->delete('/articulos/' . $article->id);

    //     //Cambiar el número '10' por el número de artículos que hay despues de eliminar este
    //     $this->assertCount(11, Articles::all());

    //     $response->assertRedirect('/articulos');

    // }
}
