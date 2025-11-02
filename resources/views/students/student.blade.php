{{-- <!DOCTYPE html>
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
                <h2 class="mb-0">Student Information</h2>
            </div>

           

            <div class="card-body">
                <table class="table table-hover table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>father_name</th>
                            <th>age</th>
                            <th>Degree Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->father_name }}</td>
                                <td>{{ $student->age }}</td>
                                <td>{{ $student->degree_name }}</td>
                                {{-- <td class="d-flex align-items-center gap-2">
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
                                </td> --}}
{{-- 
                            </tr>
                        @endforeach
                    </tbody>


                </table>
                <div class="">
                    {{ $students->links('pagination::bootstrap-5') }}
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

</html> --}} 


<h1>Students Summary by Age</h1>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            {{-- <th>Age</th> --}}
            <th>Total Students</th>
            <th>Degrees</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                {{-- <td>{{ $student->age }}</td> --}}
                <td>{{ $student->total_students }}</td>
                <td>{{ $student->degrees }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

