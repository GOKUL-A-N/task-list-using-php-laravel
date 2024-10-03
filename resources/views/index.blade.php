@extends('layouts.app')

    @section('title','Tasks List')
    @section('content')
        <div>
            <div>
                <a href="{{route('tasks.create')}}">Add Task!</a>
            </div>
        @forelse($tasks as $task)
            <a href="{{route('tasks.show',['task'=>$task])}}">
            <li>{{$task->titles}}</li>
            </a>    

        @empty
            <h1>No tasks created yet</h1>
        @endforelse

        @if ($tasks->count())
            {{$tasks->links()}}
        @endif
        </div>
    @endsection