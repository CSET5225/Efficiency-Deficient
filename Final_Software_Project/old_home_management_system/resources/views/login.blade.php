<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        div{
            display: flex;
            margin: auto;
            padding: 25px;
            column-gap: 150px;
            justify-content: center;
        }
        label{
            font-size: 25pt;
            width: 200px;
            height: 50px;
            text-align: center;
            background-color: #7C93C3;
            color: white;
            border: 1px solid black;
        }
        input{
            width: 250px;
            border: 3px solid darkblue;
        }
        button{
            width: 150px;
            height: 50px;
            font-size: 24pt;
            box-sizing: border-box;
            background-color: forestgreen;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>
    <form>
        @csrf
        <div>
            <label>Email</label>
            <input id="email" name="email" type="email">
        </div>
            
        <div>
            <label>Password</label>
            <input id="password" name="password" type="password">
        </div>
            
        <div>
            <button name="login-ok">Ok</button>
            <button name="login-cancel">Cancel</button>
        </div>
    </form>
</body>
</html>