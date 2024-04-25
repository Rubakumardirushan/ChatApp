<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Box</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Chat Box</h1>
        <div class="row">
            <div class="col-md-8">
                <p>Sender ID: {{ $sender_id }}</p>
                <p>Receiver ID: {{ $receiver_id }}</p>
                
                <!-- You can add more HTML elements for your chat interface here -->
            </div>
        </div>
    </div>
    <!-- Your existing HTML structure -->
<div class="col-md-8">
    <div id="chat-messages">
        <!-- Display chat messages here -->
    </div>
    <form action="savemsg" method="post">
    @csrf
    <input type="text" hidden name="receiver_id" value="{{ $receiver_id}}">
    <input type="text" id="message-input" placeholder="Type your message..." name="msg">
    <button >Send</button>
    </form>
   
</div>

</body>
</html>
