<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>
<body>
    <h1>You recieved a new Mail from {{$data['role']}}</h1>
    <h4>Name: {{$data['name']}}</h4>
    <h4>{{$data['role']}} Branch: {{$data['branch']}}</h4>
    <h4>Message</h4><br>
    <strong>{{$data['complain']}}</strong>
    <p>Thank you</p>
</body>
</html>