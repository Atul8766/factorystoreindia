@extends('layouts.user.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-6">
      <h2>Customers</h2>
    </div>
    <div class="col-5 text-end">
      <a href="{{ route('user.customers.create') }}" class="btn btn-primary">Add Customer</a>
    </div>
    <div class="col-1">

    </div>
  </div>
</div>
<div class="container-fluid py-4">



  <div class="container">

    <table id="myTable" class="display" style="width:100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Shop</th>
          <th>Created At</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($customers as $customer)
        <tr>
          <td>{{ $customer['id'] }}</td>
          <td>{{ $customer['name'] }}</td>
          <td>{{ $customer['phone'] }}</td>
          <td>{{ $customer['shop']['name'] }}</td>
          <td>{{ $customer['created_at'] }}</td>
          <td>
            <a href="{{ route('user.customers.edit', $customer['id']) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('user.customers.destroy', $customer['id']) }}" method="POST" style="display:inline-block;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    $('#myTable').DataTable();

  });
</script>
@endsection