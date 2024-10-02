@extends('layouts.app')

@section('title','Edit a Task')

@section('styles')
    <style>
        .error-message{
            font-size: 0.8rem;
            color: red;
            font-weight: bolder;
        }
    </style>
@endsection

@section('content')
    
<form action="{{route('tasks.update',['task' => $task])}}" method="post">
    @csrf
    @method('PUT')
    <div>
        <label for="titles">Title</label>
        <input type="text" name="titles" id="titles" value="{{$task->titles}}" />
        @error('titles')
            <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="description">Description</label>
        <textarea type="text" name="description" id="description" rows="5">{{$task->description}}</textarea> 
        @error('description')
            <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="long_description">Long Description</label>
        <textarea type="text" name="long_description" id="long_description" rows="10">{{$task->long_description}}</textarea>
        @error('long_description')
            <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <a><button type="submit">Edit Task</button></a>
    </div>
</form>
@endsection