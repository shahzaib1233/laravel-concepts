<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light py-5">

    <div class="container">
        <div class="card mx-auto shadow-sm" style="max-width: 500px;">
            <div class="card-body">
                <h3 class="card-title mb-4 text-center">Update User</h3>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('get.single.edit', $user->id)   }}">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" required value=" {{ $user->name }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required value="{{ $user->email }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Age</label>
                        <input type="number" name="age" class="form-control" min="18" max="100" required
                            value="{{ $user->age }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">City</label>
                        <select name="city" class="form-select" required>
                            <option value="">Select a city</option>
                            <option value="{{ $user->city }}" {{ old('city') == $user->city ? 'selected' : '' }}>
                                {{ $user->city }}</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update</button>
                </form>

            </div>
            <a href="{{ route('getuser') }}" class="m-3">
                <button class="btn btn-success">View All Users</button>
            </a>
        </div>
    </div>

</body>

</html>
