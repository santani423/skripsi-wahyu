<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title> 
</head>
<body>
    <form action="{{ route('inLogin') }}" method="POST" class="row g-3">
        @csrf
        <div class="col-12">
            <label for="inputEmailAddress" class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputChoosePassword" class="form-label">Password</label>
            <div class="input-group" id="show_hide_password">
                <input type="password" name="password" class="form-control border-end-0 @error('password') is-invalid @enderror" placeholder="Enter Password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        @if (session('error'))
            <div class="col-12">
                <div class="alert alert-danger">{{ session('error') }}</div>
            </div>
        @endif
        <div class="col-12">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </div>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('button[type="submit"]').click();
        });
    </script>
</body>
</html>
