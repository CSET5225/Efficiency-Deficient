<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        body {

      margin: 0;
      overflow: hidden;
      background: linear-gradient(to bottom, #EEF5FF, #608ac1,#A25772);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      font-family: monospace;
    }

        #login {
            font-size:60px;
        }
        

        div{
            display: flex;
            margin: auto;
            padding: 25px;
            column-gap: 150px;
            justify-content: center;
        }
        label{
            border-radius: 10px;
            font-size: 25pt;
            width: 200px;
            height: 50px;
            text-align: center;
            background-color: #7C93C3;
            color: white;
            justify-content: center;
        }
        input{
            width: 250px;
            border: 1px solid;
            font-size: 15pt;
            border-color: black;
            border-radius: 10px;
        }
        button{
            width: 150px;
            height: 50px;
            box-sizing: border-box;
            background-color: #9EB8D9;
            color: white;
            text-align: center;
            font-size: 25pt;
            border-radius: 10px;
            border: none;
        }
        button:hover{
            background-color: #EEF5FF;
            color: black;
            transition-duration: 1s;

        }
        .background{
            background-color: white;
            box-sizing: border-box;
            z-index: 1;
            width: 100%;
            max-width: 675px;
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            border-radius: 20px;
            }

        .background{
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="background">
        <div>
            <h1 id ="login">Login</h1>
        </div> 
        <form action="{{ url('/loginCheck')}}" method="GET">
            @csrf
            <div>
                <label style="padding-top: 5px;">Email</label>
                <input id="email" name="email" type="email" placeholder="example@example.com">
            </div>
                
            <div>
                <label style="padding-top: 5px;">Password</label>
                <input id="password" name="password" type="password" placeholder="password">
            </div>
            
            <div>
                <button name="login-ok">Ok</button>
            </div>

            </form>

            <form action="{{ url('/') }}">
                <button>Cancel</button>
        </form>
    </div>
</body>
</html>