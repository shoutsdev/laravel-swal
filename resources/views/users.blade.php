<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Sweet Alert Confirm Delete Example - shouts.dev</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
</head>
<body>

<div class="container">

    <h3 class="text-center mt-4 mb-5">Laravel 10 Sweet Alert Confirm Delete Example - shouts.dev</h3>

    <table class="table table-bordered table-striped data-table">
        <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key=> $user)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="text-center">
                    <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'>Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.show-alert-delete-box', function(event){
            var form =  $(this).closest("form");

            event.preventDefault();
            swal({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel","Yes!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    });
</script>

</body>
</html>
