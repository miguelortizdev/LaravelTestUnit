<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions; // No ejecuta las migraciones

abstract class TestCase extends BaseTestCase
{
    use DatabaseTransactions, CreatesApplication, TestsHelperTrait;
}
