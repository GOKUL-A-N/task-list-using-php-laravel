@extends('layouts.app')

@section('title',isset($task) ? 'Edit the Task' :'Create A Task')

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
    
<form action="{{isset($task) ? route('tasks.update',['task'=> $task]) : route('tasks.store')}}" method="post">
    @csrf
    @isset($task)
        @method('PUT')
    @endisset
    <div>
        <label for="titles">Title</label>
        <input type="text" name="titles" id="titles" value="{{ $task->titles ?? old('titles')}}" />
        @error('titles')
            <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="description">Description</label>
        <textarea type="text" name="description" id="description" rows="5">{{ $task->description ??old('description')}}</textarea> 
        @error('description')
            <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="long_description">Long Description</label>
        <textarea type="text" name="long_description" id="long_description" rows="10">{{old('long_description')}}</textarea>
        @error('long_description')
            <p class="error-message">{{ $task->long_description ?? $message}}</p>
        @enderror
    </div>
    <div>
        <a><button type="submit">

            @isset($task)
                Update Task
            @else 
                Add Task
            @endisset

        </button></a>
    </div>
</form>
@endsection