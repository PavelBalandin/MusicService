@extends('layouts.mainapp')

@section('title')Artist's music @endsection

@section('content')
    <div id="app">
        <music-app v-bind:playlist="{{$data}}">
        </music-app>
    </div>
@endsection
