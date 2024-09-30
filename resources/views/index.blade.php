@extends('layouts.app')

    @section('title','Tasks List')
    @section('content')
        <div>
        @forelse($tasks as $task)
            <a href="{{route('tasks.show',['id'=>$task->id])}}">
            <li>{{$task->titles}}</li>
            </a>    

        @empty
            <h1>No tasks created yet</h1>
        @endforelse
        </div>
    @endsection