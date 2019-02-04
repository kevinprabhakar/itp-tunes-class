<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Genres</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
    <!-- How to include other sections -->
  @extends('layout')

  @section('title','Invoices')

  <!-- Defines a section -->
  @section('main')

  <table class="table">
    <tr>
      <th>GenreID</th>
      <th>GenreName</th>
    </tr>
    <!--  This is how you pass in variables from the view function, similar to Go -->

    <!-- If there is stuff in invoices... -->
    @forelse ($genres as $genre)
      <tr>
        <td>
            {{$genre->GenreId}}
        </td>
        <td>
            <a href="/tracks?genre={{$genre->Name}}">{{$genre->Name}}</a>
            <a href="/genres/{{$genre->GenreId}}/edit" class="btn btn-primary" role="button">Edit Genre</a>
        </td>
      </tr>
    <!-- If invoices is empty... -->
    @empty
    <tr>
        <td colspan="4">No Genres found</td>
    </tr>
    @endforelse

  </table>
  @endsection
</body>
</html>
