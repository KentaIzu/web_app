<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Todo;

class TodoController extends Controller
{public function index()
    {
        $todos = Todo::orderBy('created_at', 'desc')->get();
        return view('index',['todos'=>$todos]);
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Todo::$rules);
        Todo::create(['content' => $request->content]);
        return redirect('/');
    }

    public function edit(Request $request)
    {
        $todo = Todo::find($request->id);
        return view('index', ['form' => $todo]);
    }

    public function update(Request $request)
    {   
        $this->validate($request, Todo::$rules);
        $form = $request->all();
        unset($form['_token']);
        Todo::where($request->id)->update($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $todo = Todo::find($request->id);
        return view('index', ['form' => $todo]);
    }

    public function remove(Request $request)
    {   
        Todo::find($request->id)->delete();
        return redirect('/');
    }
}
    
