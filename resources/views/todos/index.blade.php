@extends("todos.layout")

@section("content")

<div class="header">
    <h1>Hustle Time ⏱️</h1>
    <a href="/todos/create" class="btn-add"><i class="fal fa-plus-circle icon-large"></i></a>
</div>
    
    <ul>
        <x-alert></x-alert>
        @foreach($todos as $todo)
        <li>
            <div>
                @include("todos.completeButton")
            </div>

            @if($todo->completed)
                <p style="text-decoration: line-through">{{$todo->title}}</p>
            @else
                <p>{{$todo->title}}</p>
            @endif

            <div class="edit-delete">
                <a href="{{"/todos/".$todo->id."/edit"}}" class="btn-edit"><i class="fal fa-edit"></i></a>
                <i class="fal fa-trash-alt" onclick="event.preventDefault(); 
                    if(confirm('Are you sure you want to delete?')){
                    document.getElementById('form-delete-{{$todo->id}}')
                    .submit()
                    }">   
                   </i>
                <form action="{{route("todo.delete", $todo->id)}}" method="post" style="display: none" id="{{"form-delete-".$todo->id}}">
                @csrf
                @method("delete")
                </form>
            </div>
        </li>
        @endforeach
    </ul>
@endsection