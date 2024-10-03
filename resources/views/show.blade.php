@extends('layouts.app')

@section('title','')

@section('content')
    <h1>{{$tasks->titles}}</h1>
    <p>{{$tasks->description}}</p>
    <p>{{$tasks->long_description}}</p>
    <p>{{$tasks->completed === 1 ? 'completed' : 'not completed'}}</p>

    <div>
        <form method="post" action="{{route('tasks.toggle-complete',['task' => $tasks])}}">
            @csrf
            @method('PUT')
            <button type="submit">Mark as {{$tasks->completed ? 'not completed' : 'completed'}}</button>
        </form>
    </div>

    <div>
        <a href="{{route('tasks.edit',['task'=>$tasks])}}"><button>Edit Task</button></a>
    </div>

    <div>
        <form method="post" action="{{route('tasks.destroy',['task' => $tasks->id])}}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endsection