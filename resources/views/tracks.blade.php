<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Tracks</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
    @extends('layout')

    @section('title','Tracks')

    @section('main')
    <a href="/tracks/new" class="btn btn-link">Add Track</a>
    <table class="table">

    <tr>
      <th>Track Name</th>
      <th>Album Title</th>
      <th>Artist Name</th>
      <th>Unit Price</th>
    </tr>
    <!--  This is how you pass in variables from the view function, similar to Go -->

    <!-- If there is stuff in invoices... -->
    @forelse ($tracks as $track)
      <tr>
        <td>
            {{$track->Name}}
        </td>
        <td>
            {{$track->AlbumTitle}}
        </td>
        <td>
            {{$track->ArtistName}}
        </td>
        <td>
            {{$track->UnitPrice}}
        </td>
      </tr>
    <!-- If invoices is empty... -->
    @empty
    <tr>
        <td colspan="4">No Tracks found</td>
    </tr>
    @endforelse

  </table>
  @endsection

</body>
</html>
