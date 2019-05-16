<?php

namespace Tests;

trait TestsHelperTrait
{

    /*
     * @var \App\User
     */
    protected $defaulUser;

    public function defaulUser()
    {
        if ($this->defaulUser) {
            return $this->defaulUser;
        }
        return $this->defaulUser = factory(\App\User::class)->create();
    }

    public function seeErrors(array $fields)
    {
        foreach ($fields as $name => $errors) {
            foreach ((array) $errors as $message) {
                $this->seeInElement(
                    '#field_' . $name . ' .help-block',
                    $message
                );
            }
        }
    }
}
