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
        
        body{
            height: 100%;
            width: 100%;
        }
        
        .grid-item{
            background-color: gray;
            color: white;
        }

        .grid-item .header{
            grid-area: header;
            display: flex;
            justify-content: space-between;
        }
        .grid-item .sidebar{
            grid-area: sidebar;
        }
        .grid-item .search{
            grid-area: search;
        }
        .grid-item .main{
            grid-area: main;
        }
        .grid-item .table{
            grid-area: table;
        }
        
        .grid-container{
            display: grid;
            grid-template-areas:
            'header header header header'
            'sidebar main main search'
            'sidebar main main main'
            'sidebar table main main'
            'sidebar table main main'
            'sidebar main main main'
            'sidebar main main main';
            gap: 10px;
            padding: 10px;
        }
        
    </style>
</head>
<body>
    <div class="grid-container">
        <header class="grid-item header">
            <div>
                <h5>Welcome, Doctor!</h5>
            </div>
            <div>
                <ul>
                    <li>Your Patients</li>
                    <li>Your Profile</li>
                    <li>Log Out</li>
                </ul>
            </div>

        </header>
        
        <div class="grid-item sidebar">
            Sidebar
        </div>

        <div class="grid-item search">
            <form action="">
                <label>Appointments</label>
                <input type="date">
                <button>Submit</button>
            </form>
        </div>

        <div class="grid-item table">
            Past 
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
                        <td></td>
                        <td>Needs cold medicine</td>
                        <td>Needs cold medicine</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="grid-item main">
            
        </div>

        <div class="grid-item main">
            Main
        </div>
    </div>
</body>
</html>