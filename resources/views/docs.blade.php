@extends('layout')

@section('title','docs')

@section('main')

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

<script type="text/javascript" src="{{ asset('js/websocketClient.js') }}"></script>

<div class="row">
    <div class="col">
        <textarea rows="10" cols="100" id="websocketContentBlock" contenteditable="true">
        </textarea>
    </div>
</div>

@endsection
