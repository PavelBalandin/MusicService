@extends('layouts.mainapp')

@section('title')Home page @endsection

@section('content')
    <div id="app">
        <music-app v-bind:playlist="{{$data}}">
        </music-app>
    </div>
@endsection
