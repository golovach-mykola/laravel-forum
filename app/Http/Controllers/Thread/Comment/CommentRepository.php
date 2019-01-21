<?php
/**
 * Created by PhpStorm.
 * User: Golovach
 * Date: 21.01.2019
 * Time: 15:30
 */

namespace App\Http\Controllers\Thread\Comment;


use App\Models\ThreadComment;
use App\Repositories\BaseRepository;

class CommentRepository extends BaseRepository
{
    protected $model;

    public function __construct(ThreadComment $comment)
    {
        $this->model = $comment;
    }
}