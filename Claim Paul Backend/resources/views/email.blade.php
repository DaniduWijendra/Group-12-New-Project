<!DOCTYPE html>
<html>
    <head>
        <title>About Email</title>
    </head>
    <body>
        <form action="{{route('sendemail/send')}}" method="POST" enctype="multipart/form.data">
            <input type="email" name="address">
            <input type="file" name="document">
            <input type="submit" value="submit">
        </form>
    </body>
</html>