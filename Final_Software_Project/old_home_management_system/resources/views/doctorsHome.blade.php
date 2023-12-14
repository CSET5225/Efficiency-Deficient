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
            padding: 20px;
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
        .patient-submit{
          border: none;
          background-color: #9EB8D9;
          width: 50%;
          font-size: 25pt;
          height: 70px;
          margin: 10px 0;
          color: white;
          border-radius: 20px;
        }
    </style>
</head>
<body>
    <div class="grid-container">
        <header class="grid-item header">
            <div>
                <h1>Welcome, Doctor!</h1>
            </div>

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
                        <th>Patient ID</th>
                        <th>Date</th>
                        <th>Comment</th>
                        <th>Morning Medicine</th>
                        <th>Afternoon Medicine</th>
                        <th>Night Medicine</th>
                        <th>Page</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pastHistory as $pastPatients)
                    <form action="/doctorPatients" method="POST">
                        @csrf
                        <tr>
                            <td >
                                <input type="text"
                                name= "patient_name" value="{{$pastPatients->patient_name}}" readonly>
                            </td>
                            <td >
                                <input type="text" name="patient_id" value="{{ $pastPatients->patient_id }}" readonly>
                            </td>
                            <td >
                                <input type="text" name="scheduled_date" value="{{ $pastPatients->scheduled_date }}" readonly>
                            </td>
                            <td >
                                <input type="text" name="comment" value="{{ $pastPatients->comment }}" readonly>
                            </td>
                            <td >
                                <input type="text" name="morning_medicine" value="{{ $pastPatients->morning_medicine }}" readonly>
                            </td>
                            <td >
                                <input type="text" name="afternoon_medicine" value="{{ $pastPatients->afternoon_medicine }}" readonly>
                            </td>
                            <td>
                                <input type="text" name="night_medicine" value="{{ $pastPatients->night_medicine }}" readonly>
                            </td>
                            <td><button>Submit</button></td>
                        </tr>
                    </form>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="grid-item sidebar">
            <ul>
                <li><a href="{{ url('/doctorsDashboard') }}">Dashboard</a></li>
            </ul>
        </div>

        <div class="grid-item search">
            <form action="/appointmentFilter", method="POST">
                @csrf
                <label>Appointments Search:</label>
                <input type="date" name="date" >
                <button class="patient-submit">Submit</button>
            </form>
        </div>


        <div class="grid-item table">
            <label>Available Appointments until the Specified Date:</label>
            <table>
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($currentHistory as $currentPatients)
                    <tr>
                        <td>{{ $currentPatients->patient_name }}</td>
                        <td>{{ $currentPatients->scheduled_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>