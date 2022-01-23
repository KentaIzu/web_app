<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{public function index()
    {
        $todos = Todo::orderBy('created_at', 'desc')->get();
        return view('index',['todos'=>$todos]);
    }

    public function create(Request $request)
    {
        Todo::create([
            'content' => $request->content
        ]);
        return redirect('/')->route('todo.init');
    }
    
    public function update(Request $request)
    {
        Todo::where($request->select_todo_id)->update();
        return redirect('/')->route('todo.init');
    }

    public function delete(Request $request)
    {
        Todo::find($request->select_todo_id)->delete();
        return redirect('/')->route('todo.init');
    }
}
    
