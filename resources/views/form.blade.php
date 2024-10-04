@extends('layouts.app')

@section('title',isset($task) ? 'Edit the Task' :'Create A Task')


@section('content')
    
<form action="{{isset($task) ? route('tasks.update',['task'=> $task]) : route('tasks.store')}}" method="post">
    @csrf
    @isset($task)
        @method('PUT')
    @endisset
    <div class="mb-4">
        <label for="titles">Title</label>
        <input type="text" name="titles" id="titles" value="{{ $task->titles ?? old('titles')}}" @class(['border-red-500' => $errors->has('titles')]) />
        @error('titles')
            <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="description">Description</label>
        <textarea type="text" name="description" id="description" rows="5" @class(['border-red-500' => $errors->has('description')])>{{ $task->description ??old('description')}}</textarea> 
        @error('description')
            <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="long_description">Long Description</label>
        <textarea type="text" name="long_description" id="long_description" rows="10" @class(['border-red-500' => $errors->has('long_description')])>{{old('long_description')}}</textarea>
        @error('long_description')
            <p class="error-message">{{ $task->long_description ?? $message}}</p>
        @enderror
    </div>
    <div class="mb-4 flex gap-2 items-center">
        <a><button type="submit" class="btn">

            @isset($task)
                Update Task
            @else 
                Add Task
            @endisset

        </button></a>
        <a href="{{route('tasks.index')}}" class="btn">Cancel</a>
    </div>
</form>
@endsection