<?php
/**
 * Created by PhpStorm.
 * User: Golovach
 * Date: 21.01.2019
 * Time: 12:52
 */

namespace App\Repositories\Traits;


trait Filter
{
    public $filter = [];

    public function setFilter(array $filter)
    {
        $this->filter = $filter;
    }
}