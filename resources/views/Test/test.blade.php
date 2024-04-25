<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: row;
            margin: 20px auto;
            max-width: 800px;
        }

        .left-side, .right-side {
            flex: 1;
            padding: 10px;
            border-radius: 10px;
            overflow-y: auto;
            max-height: 400px;
        }

        .left-side {
            background-color: #fff;
            border: 1px solid #ddd;
            margin-right: 10px;
        }

        .right-side {
            background-color: #f2f2f2;
            border: 1px solid #ddd;
            margin-left: 10px;
        }

        .message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 10px;
            max-width: 70%;
            word-wrap: break-word;
        }

        .my-message {
            background-color: #d9edf7;
            align-self: flex-start;
        }

        .received-message {
            background-color: #dff0d8;
            align-self: flex-end;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-side">
            @foreach($mymsg as $msg)
                <div class="message my-message">
                   
                    <p> {{ Crypt::decryptString($msg->msg) }}</p>
                </div>
            @endforeach
        </div>
        <div class="right-side">
            @foreach($receivermsg as $msg)
                <div class="message received-message">
                <p> {{ Crypt::decryptString($msg->msg) }}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
