@extends('layout')

@section('title','Add a playlist')

<!-- Defines a section -->
@section('main')
    <div class="row">
        <div class="col">
            <form action="/playlists" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                    <small class="text-danger">{{$errors->first('name')}}</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
