<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illmuinate\Support\Str;

class UserController extends Controller
{
    public function index(){
        $users = User::withCount('posts')->paginate(5);
        return view('users.index', ['users' => $users]);
    }

    public function create(){
        return view ('users.create');
    }

    public function store(Request $request){
        $data = $request->except('_token');
        $user = User::create($data);
        return redirect()->route('users.index');

    }

    public function show(string $id){
        $user = User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }

    public function edit($id)
    {
    $user = User::findOrFail($id);
    return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user){

        $user->update($request->except('_token'));
        return redirect()->route('users.index');
    }

    public function destroy(string $id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
