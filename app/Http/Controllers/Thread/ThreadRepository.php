<?php

namespace App\Http\Controllers\Thread;


use App\Jobs\SendMessage;
use App\Models\Thread;
use App\Repositories\BaseRepository;
use App\Repositories\Traits\Filter;
use App\Repositories\Traits\Relational;
use App\Repositories\Traits\Sortable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadRepository extends BaseRepository
{

    use Sortable; use Filter; use Relational;

    protected $model;

    public function __construct(Thread $thread)
    {
        $this->model = $thread;
    }


    public function getMyAll(){
        return $this->_userThread()->get();
    }

    public function create(array $params){
        $params['user_id'] = Auth::user()->id;
        if($this->_userThread()->count() == 5){
            $this->_userThread()->oldest()->first()->delete();
        }
        return parent::create($params);
    }

    public function addComment($id, array $param){
        $param['user_id'] = Auth::user()->id;
        $thread = $this->model->findOrFail($id);
        SendMessage::dispatch(__('thread.message'), $thread->user->email);
        return $thread->comments()->create($param);
    }

    private function _userThread(){
        return $this->model->where('user_id', Auth::user()->id);
    }
}