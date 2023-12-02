<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor's Dashboard</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html{
            height: 100%;
            font-family: monospace;
            background: linear-gradient(180deg, #EEF5FF, #608ac1,#A25772);
        }
        
        .flex-container{
            display: flex;
            height: 100vh;
            width: 100%;
            justify-content: center;
            align-items: center;
            /* padding: 25px; */
        }

        .dashboard-links{
            padding: 25px;
            background-image: linear-gradient(to right, gold, goldenrod);
        }

        h1{
            text-align: center;
        }
        
        button{
            background-color: black;
            font-size: 32px;
            color: green;
            width: 300px;
            height: 100px;
        }

        button:hover{
            background-color: lightslategray;
            color: lightgreen;
        }
    </style>
</head>
<body>
    <h1>Welcome!</h1>
    <section class="flex-container">
            <div class="dashboard-links">
                <a href="{{ url('/doctorsHome') }}"><button name="">Your Homepage</button></a>
                <a href="{{ url('/rosterHome') }}"><button>Roster</button></a>
                <a href="{{ url('/doctorsPatients') }}"><button name="">Your Patients</button></a>
            </div>
    </section>
</body>
</html>