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
            font-size:20px;
        }
        .main-content{
            height: 100pt;
            width: inherit;
            margin: auto;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .caregiver-table{
            margin: auto;
            padding: 25px;
            font-size: 30px;
            background-image: linear-gradient(to right, goldenrod, gold);
            border: 8px inset gold;
        }

        label{
            border: 1px solid black;
            background: rgb(98, 98, 255);
            color: white;
        }

        table, tr, th, td{
            width: auto;
            border: 1px solid white;
            background-color: lightgray;
        }
        
        button{
            float: right;
            width: 150px;
            height: 50px;
        }
    </style>
</head>
<body>
    @auth
        
    <div class="main-content">
        <div class="">
            <label>List of Patients' duty today</label>
        </div>
        <div class="caregiver-table">
            <form action="" method="POST">
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
    @else
    <script>
        alert("Please log in.");
        window.location.href = "/login";
    </script>
    @endauth
</body>
</html>