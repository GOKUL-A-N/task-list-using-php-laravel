@extends('layouts.app')

@section('title',$tasks->titles)

@section('content')

    <div class="mb-4">
    <a href="{{route('tasks.index')}}" class="link">⬅️ Get Back to the task list!</a>
    </div>

    
    <p class="mb-4 text-slate-700 ">{{$tasks->description}}</p>
    @if($tasks->long_description)
    <p class="mb-4 text-slate-700 ">{{$tasks->long_description}}</p>
    @endif
    <p class="mb-4 text-sm text-slate-500">{{$tasks->created_at->diffForHumans()}} . {{$tasks->updated_at->diffForHumans()}}</p>
    <p class="mb-4 ">
        @if($tasks->completed)
         <span class="font-medium text-green-500">Completed</span>
        @else
         <span class="font-medium text-red-500">Not Completed</span>
        @endif
    </p>

    <div class="flex gap-2">
        <form method="post" action="{{route('tasks.toggle-complete',['task' => $tasks])}}">
            @csrf
            @method('PUT')
            <button class="btn" type="submit">Mark as {{$tasks->completed ? 'not completed' : 'completed'}}</button>
        </form>
    
        <a href="{{route('tasks.edit',['task'=>$tasks])}}"><button class="btn">Edit Task</button></a>
    
        <form method="post" action="{{route('tasks.destroy',['task' => $tasks->id])}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn hover:text-red-500">Delete</button>
        </form>
    </div>
@endsection