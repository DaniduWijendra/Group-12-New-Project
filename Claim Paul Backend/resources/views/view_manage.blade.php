<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>
<body>
    <h1>you recieved a new Mail from {{$data['name']}} </h1>
    <h4>Admin Branch {{$data['branch']}}</h4>
    <p>Your Message:<br><strong>{{$data['complain']}}</strong></p>
    <p>Thank you</p>
</body>
</html>