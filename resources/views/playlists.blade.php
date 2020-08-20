@extends('layouts.mainapp')

@section('title')Your playlists @endsection

@section('content')
    <h3>Playlist Page</h3>
    <hr>
    <ul class="list-group">
        @forelse($playlists as $el)
            <li class="list-group-item"><a href="{{route('playlist', $el->id)}}">{{$el->name}}</a></li>
        @empty
            <p>Playlist not found</p>
        @endforelse
    </ul>

@endsection
