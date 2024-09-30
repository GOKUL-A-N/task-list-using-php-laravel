@extends('layouts.app')

@section('title','Create the Task')

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
    
<form action="{{route('tasks.store')}}" method="post">
    @csrf
    <div>
        <label for="titles">Title</label>
        <input type="text" name="titles" id="titles" value="{{old('titles')}}" />
        @error('titles')
            <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="description">Description</label>
        <textarea type="text" name="description" id="description" rows="5">{{old('description')}}</textarea> 
        @error('description')
            <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="long_description">Long Description</label>
        <textarea type="text" name="long_description" id="long_description" rows="10">{{old('long_description')}}</textarea>
        @error('long_description')
            <p class="error-message">{{$message}}</p>
        @enderror
    </div>
    <div>
        <a><button type="submit">Add Task</button></a>
    </div>
</form>
@endsection