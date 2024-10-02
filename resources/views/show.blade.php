@extends('layouts.app')

@section('title','')

@section('content')
    <h1>{{$tasks->titles}}</h1>
    <p>{{$tasks->description}}</p>
    <p>{{$tasks->long_description}}</p>
    <p>{{$tasks->completed === 1 ? 'completed' : 'not completed'}}</p>

    <div>
        <form method="post" action="{{route('tasks.destroy',['task' => $tasks->id])}}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endsection