<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>
<body>
    <h1>You recieved a new Mail from Client</h1>
    <h4>Name: {{$data['fname']}} {{$data['lname']}}</h4>
    <h4>Contact:{{$data['phone']}}</h4>
    <h4>Message:</h4><br>
    <strong>{{$data['message']}}</strong>
    <p>Thank you</p>
</body>
</html>