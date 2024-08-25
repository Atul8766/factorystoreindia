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
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Status</th>
                      
                    </tr>
                </thead>
                <tbody>
                
                    @foreach ($userData as $user)
                        <tr>
                            <td>{{$loop->iteration }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['country_name'] }}</td>
                            <td>{{ $user['state_name'] }}</td>
                            <td>{{ $user['city_name'] }}</td>
                            <td>
                            <div style='opacity: 0;'>{{ $user['status'] ? 'Active' : 'Inactive' }}</div>
            <input type="checkbox" class="status-toggle" data-id="{{ $user['id'] }}" {{ $user['status'] ? 'checked' : '' }} data-toggle="toggle" data-onlabel="Active" data-offlabel="Inactive" data-onstyle="success" data-offstyle="danger">
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
         $('#myTable').DataTable({
        dom: 'Bfrtip',  // Add this option to enable buttons
        buttons: [ 'csv', 'excel', 'pdf', 'print'] // Add buttons here
    });
          $(document).ready(function(){
    $('.status-toggle').change(function() {
        var userId = $(this).data('id'); // Get user ID
        var newStatus = $(this).prop('checked') ? 1 : 0; // Check if active or inactive

        // AJAX request
        $.ajax({
            url: '{{ route("updateUserStatus") }}',  // Route to the controller method
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',  // Laravel CSRF token for security
                id: userId,
                status: newStatus
            },
            success: function(response) {
                // Optionally show a success message
                 showBootstrapAlert('User status updated successfully!', 'success');
            },
            error: function(xhr, status, error) {
                // Optionally show an error message
             showBootstrapAlert('Error updating user status!', 'danger');
            }
        });
    });
});

       });
 function showBootstrapAlert(message, type) {
        // Remove any existing alert
        $('#bootstrapAlert').remove();

        // Create the alert HTML
        var alertHtml = `
            <div id="bootstrapAlert" class="alert alert-${type} alert-dismissible fade show" role="alert" style="position: fixed; top: 10px; right: 10px; z-index: 9999; color:white;">
                ${message}
               
            </div>
        `;

        // Append the alert to the body
        $('body').append(alertHtml);

        // Auto close the alert after 5 seconds
        setTimeout(function() {
            $('#bootstrapAlert').alert('close');
        }, 5000);
    }
    </script>
@endsection
