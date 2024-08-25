@extends('layouts.admin.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-6">
       <h2>User</h2>
    </div>
    <div class="col-5 text-end">
       
    </div>
    <div class="container-fluid py-4">
      
        <div class="container">
         
            <table id="myTable" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>State</th>
                        <th>City</th>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userData as $user)
                        <tr>
                            <td>{{ $user['id'] }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['country_name'] }}</td>
                            <td>{{ $user['state_name'] }}</td>
                            <td>{{ $user['city_name'] }}</td>
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
