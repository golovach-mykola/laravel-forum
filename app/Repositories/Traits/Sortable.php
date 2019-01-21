<?php
/**
 * Created by PhpStorm.
 * User: Golovach
 * Date: 21.01.2019
 * Time: 12:52
 */

namespace App\Repositories\Traits;


trait Sortable
{
    public $sortBy = 'created_at';

    public $sortOrder = 'asc';

    public function setSortBy($sortBy = 'created_at')
    {
        $this->sortBy = $sortBy;
    }

    public function setSortOrder($sortOrder = 'desc')
    {
        $this->sortOrder = $sortOrder;
    }
}