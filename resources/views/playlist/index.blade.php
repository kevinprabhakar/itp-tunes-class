@extends('layout')

@section('title','Playlists')

<!-- Defines a section -->
@section('main')
    <ul>
        <div class="row">
            <div class="col-3">
                <a href="/playlists/new">Add a playlist!</a>
                <br>
                <b>Playlists</b>
                @forelse($playlists as $playlist)
                    <li><a href="/playlists/{{$playlist->PlaylistId}}">{{$playlist->Name}}</a></li>
                @empty
                    <li>No Playlist!</li>
                @endforelse
            </div>
            <div class="col-9">
                <ul>
                    <b>Tracks</b>
                    @forelse($tracks as $track)
                        <li>{{$track->Name}}</li>
                    @empty
                        <li>No Playlist!</li>
                    @endforelse
                </ul>

            </div>
        </div>

    </ul>
@endsection
