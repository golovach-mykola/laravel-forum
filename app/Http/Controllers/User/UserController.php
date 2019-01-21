<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Thread\ThreadRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('user.profile');
    }

    public function admin(ThreadRepository $threads){
        return view('user.admin')->with(['threads' => $threads->getAll()]);
    }

    public function destroy(ThreadRepository $threads, $id){
        $threads->delete($id);
        return redirect(route('admin'));
    }
}
