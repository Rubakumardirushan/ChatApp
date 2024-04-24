<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Your Email</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add any additional custom styles here */
        body {
            background-color: #f8f9fa; /* Set background color */
            padding: 50px; /* Add padding */
        }
        .container {
            max-width: 400px; /* Limit form width */
            margin: 0 auto; /* Center the form */
        }
        h1 {
            text-align: center; /* Center align the heading */
            margin-bottom: 30px; /* Add margin below the heading */
        }
        input[type="email"] {
            width: 100%; /* Full width input */
            margin-bottom: 20px; /* Add margin below the input */
            padding: 10px; /* Add padding */
            border-radius: 5px; /* Add border radius */
            border: 1px solid #ced4da; /* Add border */
            background-color: #fff; /* Set background color */
        }
        button[type="submit"] {
            width: 100%; /* Full width button */
            padding: 10px; /* Add padding */
            border-radius: 5px; /* Add border radius */
            border: none; /* Remove border */
            background-color: #007bff; /* Button background color */
            color: #fff; /* Button text color */
            cursor: pointer; /* Add cursor pointer */
        }
        button[type="submit"]:hover {
            background-color: #0056b3; /* Button hover background color */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Enter Your Email</h1>
        <form action="/email-otp" method="post">
            @csrf
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS (if needed) -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>
</html>
