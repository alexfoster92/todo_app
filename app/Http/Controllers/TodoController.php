<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Http\Requests\TodoCreateRequest;
use Validator;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::orderBy("completed")->latest()->get();
        return view("todos.index", compact("todos"));
    }

    public function create()
    {
        return view("todos.create");
    }

    public function store(TodoCreateRequest $request)
    {
        Todo::create($request->all());
        return redirect()->back()->with("message", "Task created successfully!");
    }

    public function update(TodoCreateRequest $request, Todo $todo)
    {
        $todo->update(["title" => $request->title]);
        return redirect(route("todo.index"))->with("message", "Updated!");
    }

    public function edit(Todo $todo)
    {
        return view("todos.edit", compact("todo"));
    }

    public function complete(Todo $todo)
    {
        $todo->update(["completed" => true]);
        return redirect()->back()->with("message", "Task completed! Good job 👏");
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(["completed" => false]);
        return redirect()->back()->with("message", "Task marked as incomplete!");
    }

    public function delete(Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with("message", "Task deleted!");
    }
}
