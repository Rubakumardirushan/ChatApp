<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend Requests</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .friend-request-item {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Friend Requests</h1>
        @if ($frndrequestsendername->isEmpty())
            <p>No friend requests</p>
        @else
            <div class="list-group">
                @foreach($frndrequestsendername as $frndRequest)
                    <div class="list-group-item friend-request-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <strong>{{ $frndRequest }}</strong>
                            <div class="btn-group" role="group" aria-label="Friend Request Actions">
                                <form action="acceptfrnd/{{$frndRequest}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Accept</button>
                                </form>
                                <form action="rejectfrnd/{{$frndRequest}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
