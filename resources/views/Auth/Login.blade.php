<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* light gray background */
        }
        .container {
            margin-top: 100px; /* Adjust top margin */
            max-width: 400px; /* Limit form width */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); /* Add shadow */
            padding: 30px; /* Add padding */
            background-color: #fff; /* White background */
        }
        .form-group label {
            font-weight: bold; /* Bold labels */
        }
        .btn-primary {
            width: 100%; /* Full width button */
            margin-top: 20px; /* Add some space between button and form */
        }
        .btn-primary:hover {
            background-color: #007bff; /* Hover color */
            border-color: #007bff; /* Hover color */
        }
        .mt-3 {
            text-align: center; /* Center align the registration link */
        }
        .error-message {
            color: red; /* Set error message color to red */
            font-size: 0.9rem; /* Adjust font size */
            margin-top: 5px; /* Add some space between error message and input field */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Login</h2> <!-- Centered heading -->
        <form action="authlogin" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <p class="mt-3">Don't have an account? <a href="/register">Register</a></p>
        <p class="mt-1">Forgot your password? <a href="/email">Reset Password</a></p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
