<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page!</title>
    <style>
        form{
            display: flex;
            flex-direction: column;
            gap: 25px;
        }
        button{
            width: 150px;
            height: 75px;
            font-size: 24pt;
            box-sizing: border-box;
            background-color: forestgreen;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Welcome!</h1>

    <form action="/loginOrRegister" method="GET">
        <button name="home-login-button">Log In</button>
        <button name="home-register-button">Register</button>
    </form>

    <h1>Logging in for your family member? Click <a href="{{ url('/familyMembers_home') }}">here!</a></h1>
</body>
</html>