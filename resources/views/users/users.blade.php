<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h2 class="mb-0">User Information</h2>
            </div>

            <div class="card-header text-white text-right">
                <a href="{{ route('users.create') }}">
                    <button class="btn btn-success">Create New User</button>
                </a>
            </div>

            <div class="card-body">
                <table class="table table-hover table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>City</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $users)
                            <tr>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->age }}</td>
                                <td>{{ $users->city }}</td>
                                <td class="d-flex align-items-center gap-2">
                                    <a href="{{ route('get.single.user', $users->id) }}" class="btn btn-success">View
                                        User</a>

                                    <form method="POST" action="{{ route('users.delete', $users->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this user?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ route('get.single.edit', $users->id) }}" class="btn btn-success">Edit
                                        User</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>


                </table>
                <div class="">
                    {{ $user->links('pagination::bootstrap-5') }}
                </div>

            </div>

            <div class="card-footer text-center text-muted">
                <small>&copy; {{ date('Y') }} Your Company Name</small>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
