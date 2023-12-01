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
            transition-duration: 2s;

        }
        .form{
            background-color: #EEF5FF;
            padding: 20px;
            box-sizing: border-box;
            z-index: 1;
            width: 150%;
            max-width: 50%;
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            border-radius: 20px;
            }

.header{
        position: absolute; 
        top: 20px; 
        left: 50%; 
        transform: translateX(-50%); 
        z-index: 2; 
      padding: 10px;
      border-radius: 10px;
      font-size: 25pt;
}
    </style>
</head>
<body>
    <div class='header'>
      <h1>Login</h1>
    </div> 
    <div class="form">
    <form action="{{ url('/login')}}" method="get">
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
            <button name="login-cancel">Cancel</button>
        </div>
    </form>
    </div>
</body>
</html>