@extends('layouts.mainapp')

@section('title')Artist @endsection

@section('content')
    <h3>Artist Page</h3>
    <hr>
    <ul class="list-group">
        @forelse($artists as $artist)
            <li class="list-group-item"><a href="{{route('artistMusic', $artist->id)}}">{{$artist->name}}</a></li>
        @empty
            <p>Artist not found</p>
        @endforelse
    </ul>

@endsection
