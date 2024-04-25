<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test View</title>
</head>
<body>
    <h1>Messages</h1>
    <ul>
        @foreach ($messages as $message)
            <li>
                <p>Sender ID: {{ $message->sender_id }}</p>
                <p>Receiver ID: {{ $message->receiver_id }}</p>
                <p>Status: {{ $message->status }}</p>
                <!-- Decrypt and display the message content -->
                <p>Message: {{ Crypt::decryptString($message->msg) }}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>
