<?php

namespace Tests\Feature;

use Tests\FeatureTestCase;

class CreatePostsTest extends FeatureTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_user_create_a_post()
    {
        /*
         * Pasos para realizar una prueba
         * 1) Having / Question Lo que tenemos
         * 2) Un usuario conctado y lo que sucede con la prueba When
         * 3) Esperamos un resultado Then
         */

        $title = 'Esta es una pregunta';
        $content = 'Este es el contenido';

        /*
         * Ajusta el usuario actualmente conectado para la aplicación.
         * Visita la URI dada con una petición GET.
         * Llamar a una ruta llamada y devolver la respuesta.
         * Escribimos 'Esta...' en el campo title
         * Presionamos el boton Publicar
         */

        $this->actingAs($user = $this->defaulUser());

        $this->visit(route('posts.create'))
            ->type($title, 'title')
            ->type($content, 'content')
            ->press('Publicar');

        /*
         * Podemos ver en la base de datos en la tabla posts los campos...
         */
        $this->seeInDatabase('posts', [
            'title' => $title,
            'content' => $content,
            'pending' => true,
            'user_id' => $user->id,
        ]);

        /*
         * Podemos ver en el elemento h1 la pregunta...
         * El usuario es redirigido al detalle del post
         * seeInElement -> Afirma que una cadena dada se ve dentro de un elemento.
         * see -> Afirma que una cadena dada se ve en el HTML actual.
         */
        // $this->seeInElement('h1', $title);
        $this->see($title);

        $this->assertTrue(true);
    }

}
