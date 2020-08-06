@extends('layouts.mainapp')

@section('title')Artist @endsection

@section('content')
    <h3>Artist Page</h3>
    <ul class="list-group">
        @forelse($data as $el)
            <li class="list-group-item"><a href="{{route('artistMusic', $el->id)}}">{{$el->name}}</a> </li>
        @empty
            <p>Artist not found</p>
        @endforelse
    </ul>

@endsection
