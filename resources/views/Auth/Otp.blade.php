<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Set a light background color */
        }
        .card {
            border: none; /* Remove card border */
            border-radius: 10px; /* Add rounded corners */
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); /* Add shadow */
        }
        .card-header {
            background-color: #007bff; /* Header background color */
            color: #fff; /* Header text color */
            border-radius: 10px 10px 0 0; /* Rounded top corners */
        }
        .form-group label {
            font-weight: bold; /* Bold labels */
        }
        .btn-primary {
            width: 100%; /* Full width button */
            margin-top: 20px; /* Add some space between button and form */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Hover color */
            border-color: #0056b3; /* Hover color */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">OTP Verification</div>
                    <div class="card-body">
                        <form method="POST" action="otpverfiy">
                            @csrf

                            <div class="form-group">
                                <label for="otp">Enter OTP</label>
                                <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP">
                            </div>
                            <input type="hidden" name="email" value="{{ $email }}">

                            <button type="submit" class="btn btn-primary">Verify OTP</button>
                           
                        </form>
                       <form action="resendotp" method="post">
                        @csrf
                       <input type="hidden" name="email" value="{{ $email }}">
                       <button type="submit" class="btn btn-primary">resend otp</button>

                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
</body>
</html>
