@extends("todos.layout")

@section("content")
    <h1>Add Task 🏃‍♂️</h1>
    <x-alert></x-alert>
    <form action="/todos/create" method="post">
        @csrf
        <input type="text" name="title">
        <input type="submit" value="Add">
    </form>

    <a href="/todos" class="btn-back">🔙 Return home</a>
@endsection