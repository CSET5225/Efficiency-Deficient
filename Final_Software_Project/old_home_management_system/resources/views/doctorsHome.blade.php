<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor's Home</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        html{
            height: 100%;
            background: linear-gradient(180deg, #EEF5FF, #608ac1,#A25772);
            font-size: 18px;
            font-family: monospace;
        }
        
        body{
            height: 100%;
            width: 100%;
        }
        
        .header{
            grid-area: header;
            width: 100%;
            display: flex;
            justify-content: space-evenly;
        }
        .header-tags{
            display: flex;
            justify-content: space-between;
            width: inherit;
            font-size: 18px;
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        table, td, th, tr{
            border: 1px solid black;
            padding: 1px;
        }

        .grid-container{
            display: grid;
            height: inherit;
            border: 10px solid black;
            grid-template-areas:
            'header header header header'
            'sidebar sidebar past-table past-table '
            'search search . .'
            'table table table table';
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 10px;
            padding: 10px;
        }
                
        .grid-item{
            border: 2px solid aqua;
            background-color: gray;
            color: white;
        }


        .sidebar>ul{
            background-color:gray;
            color:white;
            list-style-type: none;
        }
        
        .past-table{
            grid-area: past-table;
        }
        .search{
            grid-area: search;
            height: 50%;
            width: 250px;
        }
        
        .table{
            grid-area: table;
        }
        
    </style>
</head>
<body>
    <div class="grid-container">
        <header class="grid-item header">
            <div>
                <h1>Welcome, Doctor!</h1>
            </div>

            <ul class="header-tags">
            <div>
                <li>Your Patients</li>
            </div>
            <div>
                <li>Your Profile</li>
            </div>
            <div>
                <li><a href="{{ url('/') }}">Log Out</a></li>
            </div>
            </ul>
        </header>
        
        <div class="grid-item past-table">
            <label>Past History with Patients:</label>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Comment</th>
                        <th>Morning Medicine</th>
                        <th>Afternoon Medicine</th>
                        <th>Night Medicine</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>John Doe</td>
                            <td>9/17/23</td>
                            <td>None</td>
                            <td><input type="checkbox"></td>
                            <td><input type="checkbox"></td>
                            <td><input type="checkbox"></td>
                        </tr>
                </tbody>
            </table>
        </div>

        <div class="sidebar">
            <ul>
                <li>A</li>
                <li>A</li>
                <li>A</li>
                <li>A</li>
            </ul>
        </div>

        <div class="grid-item search">
            <form action="">
                <label>Appointments</label>
                <input type="date" value="" >
                <button>Submit</button>
            </form>
        </div>


        <div class="grid-item table">
            Patients By Date
          <form action="" method="POST">
            <table>
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Test1</td>
                        <td>Test2</td>
                    </tr>
                </tbody>
            </table>
          </form>
        </div>

    </div>
</body>
</html>