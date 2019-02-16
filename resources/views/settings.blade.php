@extends('layout')

@section('title', 'Settings')

@section('main')
  <h1>Settings</h1>
  <form method="post" action='/settings'>
    @csrf
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="on" name="maintenance" id="maintenance">
      <label for="maintenance">Maintenance</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
