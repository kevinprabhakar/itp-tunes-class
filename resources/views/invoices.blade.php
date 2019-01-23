<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Invoices</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
    <!-- How to include other sections -->
  @extends('layout')

  @section('title','Invoices')

  <!-- Defines a section -->
  @section('main')
  <form action="/" method="get">
    <input type="text" name="search" value="{{$search}}">
    <button type="submit">Search</button>
    <a href="/" class="btn btn-link">Clear</a>
  </form>
  <table class="table">
    <tr>
      <th>Date</th>
      <th>Total</th>
      <th>Customer</th>
      <th>Email</th>
    </tr>
    <!--  This is how you pass in variables from the view function, similar to Go -->

    <!-- If there is stuff in invoices... -->
    @forelse ($invoices as $invoice)
      <tr>
        <td>
            {{$invoice->InvoiceDate}}
        </td>
        <td>
            {{$invoice->Total}}
        </td>
        <td>
            {{$invoice->FirstName}} {{$invoice->LastName}}
        </td>
        <td>
            {{$invoice->Email}}
        </td>
      </tr>
    <!-- If invoices is empty... -->
    @empty
    <tr>
        <td colspan="4">No invoices found</td>
    </tr>
    @endforelse

  </table>
  @endsection
</body>
</html>
