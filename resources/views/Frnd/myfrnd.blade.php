<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Friends</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>My Friends</h1>
        <div class="row">
            <div class="col-md-8">
                @if ($frndrequestsendername->isEmpty())
                    <p>You have no friends yet.</p>
                @else
                    <ul class="list-group">
                        @foreach($frndrequestsendername as $index => $friend)
                            <li class="list-group-item">
                                {{ $friend }}
                                @if(isset($active_status[$index]))
                                    @if($active_status[$index] == 'online')
                                        <span class="badge badge-success ml-2">Online</span>
                                    @else
                                        <span class="badge badge-danger ml-2">Offline</span>
                                        @if(isset($last_seen[$index]))
                                            <span class="ml-2">Last seen: {{ $last_seen[$index] }}</span>
                                        @endif
                                    @endif
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
