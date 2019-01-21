<?php
/**
 * Created by PhpStorm.
 * User: Golovach
 * Date: 21.01.2019
 * Time: 12:52
 */

namespace App\Repositories\Traits;


trait Relational
{
    public $with = [];

    public function setWith(array $with)
    {
        $this->with = $with;
    }
}