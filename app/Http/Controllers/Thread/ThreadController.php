<?php

namespace App\Http\Controllers\Thread;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Thread\Comment\CommentRequest;
use App\Http\Controllers\User\UserRepository;
use Illuminate\Http\Request;

class ThreadController extends Controller
{

    protected $thread;
    private $_redirect;

    public function __construct(ThreadRepository $threadRepository)
    {
        $this->thread = $threadRepository;
        $this->_redirect = route('thread.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('thread.list')->with(['threads' => $this->thread->getMyAll()]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Controllers\User\UserRepository $users
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function forum(UserRepository $users, Request $request)
    {
        $sort_by = $request->get('sort_by','created_at');
        $sort_type = $request->get('sort_type','asc');
        $this->thread->setSortBy($sort_by);
        $this->thread->setSortOrder($sort_type);
        $filter_by = $request->get('filter_by', []);
        $this->thread->setFilter($filter_by);
        return view('thread.forum')->with([
            'threads' => $this->thread->paginated(config('app.paginate'))->appends($request->all()),
            'users' => $users->getAllUser(),
            'sort_by' => $sort_by,
            'sort_type' => $sort_type,
            'filter_by' => $filter_by,
            'page' => $request->get('page', 1)
        ]);
    }

    public function addComment(CommentRequest $request, $id){
        $this->thread->addComment($id, $request->all());
        return back();
    }

    /**
     * Display a listing of the resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $this->thread->setWith(['comments']);
        return view('thread.show')->with(['thread' => $this->thread->find($id)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thread.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Controllers\Thread\ThreadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThreadRequest $request)
    {
        $this->thread->create($request->all());
        return redirect($this->_redirect);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('thread.form')->with(['thread' => $this->thread->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Controllers\Thread\ThreadRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ThreadRequest $request, $id)
    {
        $this->thread->update($request, $id);
        return redirect($this->_redirect);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->thread->delete($id);
        return redirect($this->_redirect);
    }
}
