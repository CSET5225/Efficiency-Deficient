<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @auth
        <div>

        </div>
    @else
    <script>
        alert("Please log in.");
        window.location.href = "/login";
    </script>
    @endauth
</body>
</html>