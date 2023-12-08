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
            padding: 25px;
            background: linear-gradient(180deg, #EEF5FF, #608ac1,#A25772);
            font-size: 18px;
            font-family: monospace;
        }
        
        body{
            height: 100%;
            width: 100%;
        }
        
        label{
            background-color: darkblue;
        }
        
        .header{
            grid-area: header;
            width: 100%;
            display: flex;
            justify-content: space-evenly;
        }

        table, td, th, tr{
            margin: auto;
            border: 1px solid black;
            padding: 1px;
        }

        thead, tbody{
            overflow-y: auto;
            overflow-x: hidden;
        }

        .grid-container{
            display: grid;
            height: inherit;
            grid-template-areas:
            'header header header header'
            'sidebar past-table past-table past-table'
            'sidebar search search search'
            'sidebar table table table';
            grid-template-columns: 1fr 1fr 1fr 1fr;
            grid-gap: 8px;
        }
                
        .grid-item{
            background-color: gray;
            color: white;
        }

        .sidebar{
            grid-area: sidebar;
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
            display: flex;
            justify-content: center;
            align-items: center;
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

            {{-- <div>
                <li>Your Patients</li>
            </div> --}}

            <div>
                <li><a href="{{ url('/') }}">Log Out</a></li>
            </div>
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

        <div class="grid-item sidebar">
            <ul>
                <li>A</li>
                <li>A</li>
                <li>A</li>
                <li>A</li>
            </ul>
        </div>

        <div class="grid-item search">
            <form action="">
                @csrf
                <label>Appointments Search:</label>
                <input type="date" name="date" >
                <button>Submit</button>
            </form>
        </div>


        <div class="grid-item table">
            <label>Available Appointments until the Specified Date:</label>
          <form action="" method="POST">
            @csrf
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