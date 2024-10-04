@extends('layouts.app')

    @section('title','List of Tasks')
    @section('content')
        <div>
            <nav class="mb-4">
                <a href="{{route('tasks.create')}}" class="link">Add Task!</a>
            </nav>
        @forelse($tasks as $task)
            <a href="{{route('tasks.show',['task'=>$task])}}" 
            @class(['font-semibold','line-through' => $task->completed])
            >
            <li>{{$task->titles}}</li>
            </a>    

        @empty
            <h1>No tasks created yet</h1>
        @endforelse

        @if ($tasks->count())
            <nav class="mt-4 ">
                {{$tasks->links()}}
            </nav>
        @endif
        </div>
    @endsection