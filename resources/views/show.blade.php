@extends('layouts.app')

@section('title','')

@section('content')
    <h1>{{$tasks->titles}}</h1>
    <p>{{$tasks->description}}</p>
    <p>{{$tasks->long_description}}</p>
    <p>{{$tasks->completed === 1 ? 'completed' : 'not completed'}}</p>
@endsection