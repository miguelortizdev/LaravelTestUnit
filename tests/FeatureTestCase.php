<?php

namespace Tests;

use Laravel\BrowserKitTesting\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations; // Ejecuta las migraciones
use Illuminate\Foundation\Testing\DatabaseTransactions; // No ejecuta las migraciones

/**
 * https://laravel.com/api/5.8/Illuminate/Foundation/Testing.html
 */

abstract class FeatureTestCase extends BaseTestCase //TestCase
{
    /**
     * Ejecuta consultas dentro de una transición de una base de datos
     * Deja la base de datos como esta
     */
    use DatabaseTransactions, CreatesApplication, TestsHelperTrait;
}
