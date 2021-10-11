<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>I want to access b2b</title>
</head>
<body>
    <h3>email: {{ $details['email'] }}</h3>
    <h3>phone: {{ $details['phone'] }}</h3>
    <h3>message: {{ isset($details['message']) }}</h3>

</body>
</html>
