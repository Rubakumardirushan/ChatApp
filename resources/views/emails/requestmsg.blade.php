<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Friend Request</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif; /* Use a common sans-serif font */
            background-color: #f8f9fa; /* Set a light background color */
            padding: 20px; /* Add some padding */
        }
        .container {
            max-width: 600px; /* Set max width for better readability */
            margin: auto; /* Center-align content */
            background-color: #fff; /* Set background color for content */
            padding: 30px; /* Add padding inside container */
            border-radius: 10px; /* Add border radius for container */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Add box shadow for container */
        }
        h1 {
            color: #0d6efd; /* Set heading color to blue */
            margin-bottom: 20px; /* Add some space below the heading */
        }
        p {
            margin-bottom: 15px; /* Add some space below each paragraph */
        }
        a {
            color: #0d6efd; /* Set link color to blue */
            text-decoration: none; /* Remove underline */
        }
        a:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>New Friend Request</h1>
        
        <p>Hi {{ $receiver }},</p>
        
        <p>You have received a new friend request from {{ $sender }}.</p>
        
        <p>Thanks,</p>
        <p>Your Application Team</p>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
