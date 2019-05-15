<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations; // Ejecuta las migraciones
use Illuminate\Foundation\Testing\DatabaseTransactions; // No ejecuta las migraciones


/*
 * Modelos
 */
use App\User;

/**
 * https://laravel.com/api/5.8/Illuminate/Foundation/Testing.html
 */

class UserTest extends TestCase
{

    /*
     * Ejecuta consultas dentro de una transición de una base de datos
     * Deja la base de datos como esta
     */
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        /*
         * El metodo factory
         * llama al archivo database/factories/ModelFactory
         * crea el usuario usando ese modelo modificando algunos valores
         */

        $user = factory(User::class)->create([
            'name' => 'Miguel Ortiz Osorio',
            'email' => 'miguelortiz@outlook.com',
        ]);

        /*
         * Ajusta el usuario actualmente conectado para la aplicación.
         * Establecer la sesión a la matriz dada.
         * Visita la URI dada con una petición GET.
         */

        $response = $this->actingAs($user, 'api') // Establecer el usuario actualmente conectado en la aplicación.
                    ->withSession(['name' => 'Miguel Ortiz Osorio']) // Establecer la sesión a la matriz dada.
                    ->get('api/user');

        $this->assertTrue(true);
    }
}
