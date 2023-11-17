<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosControleur extends Controller
{

    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', ['todos' => $todos]);
    }

    public function create()
    {
        $todo = new Todo();
        $todo->texte = request('texte');
        $todo->termine = false;
        $todo->save();
        return redirect('/todo');
    }

    public function update(Todo $id)
    {
        $todo = $id;
        $todo->termine = !$todo->termine;
        $todo->save();
        return redirect('/todo');
    }

    public function delete(Todo $id)
    {
        $id->delete();
        return redirect('/todo');
    }

    
}
