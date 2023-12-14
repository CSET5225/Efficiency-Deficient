<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <style>
        *{
            margin:0;
            padding:0;
        }
        .background{
            font-size:18px;
            background: linear-gradient(180deg, #EEF5FF, #608ac1,#A25772);
            height:100%;
            width:100%;
            display:flex;
            flex-direction:column;
            justify-content:center;
            font-family:monospace;
        }
        .generalContainer{
            background-color:white;
            justify-content:center;
            text-align:center;
            margin:auto;
            width:500px;
            height:auto;
            border-radius:10px;
        }
        .welcomeContainer{
            padding:30px;
            font-size:30px;
        }
        .familyContainer{
            padding:30px;
        }
        button{
            width: 150px;
            height: 75px;
            font-size:24px;
            box-sizing: border-box;
            background-color: #9EB8D9;
            color: white;
            text-align: center;
            text-decoration:none;
            border:none;
            font-family: monospace;
        }
        button:hover{
            background-color: #EEF5FF;
            color:black;
            transition-duration:1s;
        }
        a{
            width: 150px;
            height: 75px;
            text-decoration:none;
            transition-duration:2s;
            color:blue;
            box-sizing: border-box;
        }
        a:hover{
            text-decoration:underline;
        }
        #familyLink{
            font-size:35px;
        }
    </style>
</head>
<body>
    <div class="background">

        <div class="generalContainer">

            <div class="welcomeContainer">
                <h1>Welcome</h1>
            </div>

            <div class="buttonContainer">
                <a href="{{ url('/login') }}"><button>Log In</button></a>
                <a href="{{ url('/registration') }}"><button>Register</button></a>
            </div>

            <div class="familyContainer">
                <h2>Logging in for your family member? Click <a href="{{ url('/familyHomeview') }}" id="familyLink">HERE</a></h2>
            </div>

        </div>

    </div>
</body>
</html>