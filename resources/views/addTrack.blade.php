@extends('layout')

@section('title','Add a track')

<!-- Defines a section -->
@section('main')
    <div class="row">
        <div class="col">
            <form action="/tracks/new" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                    <small class="text-danger">{{$errors->first('name')}}</small>
                    <br>
                      <label for="albumSelect">Select album:</label>
                      <select class="form-control" name="albumSelect" id="albumSelect">
                        @forelse ($albums as $album)
                            <option value="{{$album->Title}}" @if ($album->Title == old('albumSelect')) selected="selected" @endif>
                                {{$album->Title}}
                            </option>
                        @empty
                            <option>None</option>
                        @endforelse
                      </select>
                      <small class="text-danger">{{$errors->first('albumSelect')}}</small>

                      <br>
                      <label for="mediaTypeSelect">Select Media Type:</label>
                      <select class="form-control" name="mediaTypeSelect" id="mediaTypeSelect">
                        @forelse ($media_types as $media_type)
                            <option value="{{$media_type->Name}}" @if ($media_type->Name == old('mediaTypeSelect')) selected="selected" @endif>
                                {{$media_type->Name}}
                            </option>
                        @empty
                            <option>None</option>
                        @endforelse
                      </select>
                      <small class="text-danger">{{$errors->first('mediaTypeSelect')}}</small>

                      <br>
                      <label for="genreSelect">Select Genre Type:</label>
                      <select class="form-control" name="genreSelect" id="genreSelect" value="{{old('genreSelect')}}">
                        @forelse ($genres as $genre)
                            <option value="{{$genre->Name}}" @if ($genre->Name == old('genreSelect')) selected="selected" @endif>
                                {{$genre->Name}}
                            </option>
                        @empty
                            <option>None</option>
                        @endforelse
                      </select>
                      <small class="text-danger">{{$errors->first('genreSelect')}}</small>



                      <br>
                      <label for="composer">Composer</label>
                      <input type="text" name="composer" id="composer" class="form-control" value="{{old('composer')}}">
                      <small class="text-danger">{{$errors->first('composer')}}</small>

                      <br>
                      <label for="milliseconds">Milliseconds</label>
                      <input type="text" name="milliseconds" id="milliseconds" class="form-control" value="{{old('milliseconds')}}">
                      <small class="text-danger">{{$errors->first('milliseconds')}}</small>

                      <br>
                      <label for="bytes">Bytes</label>
                      <input type="text" name="bytes" id="bytes" class="form-control" value="{{old('bytes')}}">
                      <small class="text-danger">{{$errors->first('bytes')}}</small>

                      <br>
                      <label for="unitPrice">Unit Price</label>
                      <input type="text" name="unitPrice" id="unitPrice" class="form-control" value="{{old('unitPrice')}}">
                      <small class="text-danger">{{$errors->first('unitPrice')}}</small>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
