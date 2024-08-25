@extends('layouts.admin.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-6">
       <h2>Shop Data</h2>
    </div>
    <div class="col-5 text-end">
        <a href="{{ route('admin.shops.create') }}" class="btn btn-primary">Add Shop</a>
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
                        <th>Logo</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                 <tbody>
            @foreach($shops as $shop)
            <tr>
                <td>{{ $shop->id }}</td>
                <td>{{ $shop->name }}</td>
                <td><img src="{{ asset('storage/app/' . $shop->logo) }}" width="50" alt="Logo"></td>
                <td>{{ $shop->address }}</td>
                <td>{{ $shop->status ? 'Active' : 'Inactive' }}</td>
                <td>{{ $shop->created_at }}</td>
                <td>
                    <a href="{{ route('admin.shops.edit', $shop->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.shops.destroy', $shop->id) }}" method="POST" style="display:inline-block;">
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
