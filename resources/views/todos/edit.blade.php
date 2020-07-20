@extends("todos.layout")

@section("content")

    <h1>Edit task</h1>
    <h2>Task name: {{$todo->title}}</h2>
    <x-alert></x-alert>
    <form action="{{route("todo.update", $todo->id)}}" method="post">
        @csrf
        @method("patch")
        <input type="text" name="title" value="{{$todo->title}}">
        <input type="submit" value="Update">
    </form>

    <a href="/todos" class="btn-back">🔙 Return home</a>
@endsection