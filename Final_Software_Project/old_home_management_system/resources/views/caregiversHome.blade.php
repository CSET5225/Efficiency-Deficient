<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Caregiver's Page</title> {{-- Placeholder Text --}}
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html{
            height: 100%;
            background: linear-gradient(to bottom, #EEF5FF, #608ac1,#A25772);
            font-size: larger;
            font-family: monospace;
            width: auto;
        }
        .main-content{
            background-color: #EEF5FF;
            padding: 20px;
            box-sizing: border-box;
            z-index: 1;
            width: 70%;
            max-width: 130%;
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            border-radius: 20px;
            margin: auto;
            justify-content: space-between;
            margin-top: 15%;
        }

        .caregiver-table{
            margin: auto;
            padding: 25px;
            font-size: 30px;
            background-image: linear-gradient(to right, goldenrod, gold);
            border: 8px inset gold;
            
        }

        label{
            position: absolute; 
        top: 20px; 
        left: 50%; 
        transform: translateX(-50%); 
        z-index: 2; 
      padding: 10px;
      border-radius: 10px;
      font-size: 40pt;
      margin-top:80px;
        }

        table, tr, th, td{
            width: auto;
            border: 1px solid white;
            background-color: lightgray;
        }
        
        button{
        margin: auto;
        width: 25%;
        background-color:#9EB8D9; 
        font-size: large;
        color: white;
        border: none;
        border-radius: 20px;
        margin-left: 35%;
}

button:hover{
  transition-duration: 2s;
        background-color: #EEF5FF;
        color:black;   
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
<form action="{{url('/logout')}}" method="GET">
    <button class="logout">Log Out</button>
    </form>
    <div class="">
            <label>List of Patients' duty today</label>
        </div>
    <div class="main-content">
        
        <div class="caregiver-table">
        <form action="{{ url('/caregiversHome')}}" method="POST">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Morning Medicine</th>
                            <th>Afternoon Medicine</th>
                            <th>Night Medicine</th>
                            <th>Breakfast</th>
                            <th>Lunch</th>
                            <th>Dinner</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td><input type="checkbox"></td>
                            <td><input type="checkbox"></td>
                            <td><input type="checkbox"></td>
                            <td><input type="checkbox"></td>
                            <td><input type="checkbox"></td>
                        <td><input type="checkbox"></td>
                    </tr>
                    </tbody>
            </table>
            <button>Submit</button>
        </form>
        
    </div>
    </div>
</body>
</html>