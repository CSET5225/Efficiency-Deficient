<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Role</title>

    <style>

        *{
            margin:0;
            padding:0;
        }

        body{
            background: linear-gradient(180deg, #EEF5FF, #608ac1,#A25772);
            height: 100vh;
        }
        
        .container{
            font-family:monospace;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            font-size:20px;
            background-color:white;
            width:500px;
            height:500px;
            border-radius:20px;
        }

        .center{
            display:flex;
            height:70%;
        }

        .formContainer{
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            text-align:center;
        }

        #buttonContainer{
            justify-content:center;
            align-items:center;
            text-align:center;
        }

        input{
            width:auto;
            padding:10px;
        }

        button{
            background-color:#9EB8D9; 
            font-size: large;
            color: white;
            border: none;
            width:100px;
            height:35px;
            margin-bottom:-30px;
        }

        button:hover{
            transition-duration: 2s;
            background-color: #EEF5FF;
            color:black;   
        }

        div{
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            text-align:left;
            width:auto;
            margin-bottom:20px;
        }

        h1{
            padding:20px;
            font-size:40px;
        }

        .logout {
            position: absolute;
            top: 10px;
            right: 10px;
            width: auto;
            height: auto;
            background-color: black;
        }

        .logout:hover{
            background-color: white;
            transition-duration: 2s;
            color: black;
        }

    </style>

</head>

<body>

    <div class="center">

        <form action="{{url('/logout')}}" method="GET">

            <button class="logout">Log Out</button>

        </form>

        <div class = "container">

            <div class = "formContainer">
            
            <h1>Add New Role</h1>

                <form action={{ url("/api/addRole") }} method = "POST">

                    @csrf

                    <div>
                        <label>Role Name</label>
                        <input type="text" name="role_name" Required>
                    </div>

                    <div>
                        <label>Level Of Access</label>
                        <input type="number" name="level_of_access" Required min=1 value="1">
                    </div>

                    <div id="buttonContainer">

                        <button name="submitRole">Add Role</button>

                    </div>

                </form>

            </div>

            <div class="backButtonContainer">

                <form action="{{ url("/adminsHome") }}">
                    
                    <button>Back</button>
                    
                </form>

            </div>


        </div>
    </div>

</body>

</html>