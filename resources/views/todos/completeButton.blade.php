@if($todo->completed)
    <i class="fal fa-check-circle" style="color: rgb(31, 219, 31);" onclick="event.preventDefault(); document.getElementById('form-incomplete-{{$todo->id}}').submit()"></i>
    <form action="{{route("todo.incomplete", $todo->id)}}" method="post" style="display: none" id="{{"form-incomplete-".$todo->id}}">
    @csrf
    @method("delete")
    </form>
@else
    <i class="fal fa-check-circle" onclick="event.preventDefault(); document.getElementById('form-complete-{{$todo->id}}').submit()"></i>
    <form action="{{route("todo.complete", $todo->id)}}" method="post" style="display: none" id="{{"form-complete-".$todo->id}}">
    @csrf
    @method("put")
    </form>
@endif