<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
        margin: 0;
        overflow: hidden;
        background: linear-gradient(to bottom, #EEF5FF, #608ac1,#A25772);
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        font-family: monospace;
        font-size:20px;
        }

        .container{
        background-color:white;
        padding: 20px;
        border-radius: 20px;
        z-index: 1;
        width: 100%;
        max-width: 420px;
        display: flex; 
        flex-direction: column; 
        align-items: center; 
        text-align:center;
        }
        
        input {
        margin: 10px;
        width: 100%;
        font-size: large;
        border :1px solid black; 
        }

        button{
        padding: 10px;
        margin:10px;
        background-color:#9EB8D9; 
        font-size: large;
        color: white;
        border: none;
        }

        button:hover{
        transition-duration: 2s;
        background-color: #EEF5FF;
        color:black;   
        }

        .buttons{
        display: flex;
        flex-direction: row;
        text-align:center;
        justify-content:center;
        }

        h1{
        top: 20px; 
        left: 50%; 
        padding: 10px;
        border-radius: 10px;
        }

        select{
        margin: 10px;
        width: 100%;
        font-size: large;
        border :1px solid black;
        }

        a {
        text-decoration: none;
        color: white;
        font-family: monospace;
        }

        a:hover{
        color: black;
        transition-duration: 2s;
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
    <div class="container">
        <form action="{{url('/logout')}}" method="GET">

            <button class="logout">Log Out</button>

        </form>

        <h1>New Roster</h1>
        <form action="{{ url('api/newRoster') }}" method="POST" id="form">

            @csrf

            <label>Date</label>
            <input type="date" name="scheduled_date" id="DOB" placeholder="0000-00-00" required>

            <label>Group ID</label>
            <Select name="group_id">

                @foreach($group_id as $id)

                    <option value="{{ $id->group_id }}">{{ $id->group_id }}</option>

                @endforeach

            </Select>
            
            <label>Supervisor</label>
                <select name = "supervisor_id">

                    @foreach($supervisor_id as $id)

                        <option value="{{ $id->supervisor_id }}">{{ $id->supervisor_id }}</option>

                    @endforeach
                
                </select>
                
            
            <label>Doctor</label>
            <select name = "doctor_id">

                @foreach($doctor_id as $id)

                    <option value="{{ $id->doctor_id }}">{{ $id->doctor_id}}</option>

                @endforeach
            
            </select>

            
            <label>Caregiver 1</label>
            <select name = "caregiver1_id">

                @foreach($caregiver_id as $id)

                    <option value="{{ $id->caregiver_id }}">{{ $id->caregiver_id }}</option>

                @endforeach
            
            </select>
            
            <label>Caregiver 2</label>
            <select name = "caregiver2_id">

                @foreach($caregiver_id as $id)

                    <option value="{{ $id->caregiver_id }}">{{ $id->caregiver_id }}</option>

                @endforeach
            
            </select>
            
            <label>Caregiver 3</label>
            <select name = "caregiver3_id">

                @foreach($caregiver_id as $id)

                    <option value="{{ $id->caregiver_id }}">{{ $id->caregiver_id }}</option>

                @endforeach
            
            </select>
            
            <label>Caregiver 4</label>
            <select name = "caregiver4_id">

                @foreach($caregiver_id as $id)

                    <option value="{{ $id->caregiver_id }}">{{ $id->caregiver_id }}</option>

                @endforeach
            
            </select>

            <section class="buttons">
                <button name="submitRoster">Submit</button>
            </section>

        </form>

        <form action={{ url('adminsHome') }}>
            <button class="buttons">Back</button>
        </form>
    </div>
</body>
</html>