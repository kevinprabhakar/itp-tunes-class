@extends('layout')

@section('title','docs')

@section('main')

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

<script type="text/javascript" src="{{ URL::asset('js/websocketClient.js') }}"></script>

<div class="row">
    <div class="col">
        <blockquote id="websocketContentBlock" contenteditable="true">
        </blockquote>
    </div>
</div>

@endsection
