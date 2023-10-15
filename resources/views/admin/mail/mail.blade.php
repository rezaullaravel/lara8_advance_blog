<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <h3>Dear User, Thank You for contact Us.</h3>
    <p>Your  email: {{  $data['email'] }}</p>
    <p>Subject: {{ $data['subject'] }}</p>
    <p>Message: {{  $data['message'] }}</p>
    <p>Thank You...</p>
</body>
</html>
