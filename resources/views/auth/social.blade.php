<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook login</title>
</head>
<body>
    <div>
        <a href="{{ route('auth.social.redirect', ['provider' => 'facebook']) }}">Facebook Login</a>
    </div>
</body>
</html>