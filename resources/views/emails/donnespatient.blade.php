<!DOCTYPE html>
<html>
<head>
    <title>Patient Credentials</title>
</head>
<body>
    <p>Hello {{ $user->name }},</p>
    <p>Your account has been created with the following credentials:</p>
    <p>Email: {{ $user->email }}</p>
    <p>Password: {{ $password }}</p>
    <p>Thank you for using our service.</p>
</body>
</html>