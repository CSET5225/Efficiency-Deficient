<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Roster</title>
    
    <style>
        body {
            margin: 0;
            overflow: hidden;
            background: linear-gradient(to bottom, #EEF5FF, #608ac1, #A25772);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-size: larger;
            font-family: monospace;
        }

        input {
            margin: 10px;
            width: auto;
            width:auto;
            height:25px;
            text-align:center;
        }

        .a {
        text-decoration: none;
        color: white;
        font-family: monospace;
        }

        button {
        border: none;
        background-color: #9EB8D9;
        max-width: fit-content;
        font-size: 25pt;
        height: fit-content; 
        color: white;
        padding:10px;
        margin:10px;
        }

        .form {
        z-index: 1;
        width: auto;
        height: auto;
        display: flex;
        flex-direction: row;
        justify-items: center;
        padding: 10px;
        }

        .div1{
        background-color:white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align:center;
        padding: 20px;
        width: 85%; 
        }

        h1{
            padding: 10px;
            font-size:40pt ;
        }

        button:hover{
            transition-duration: 2s;
            background-color: #EEF5FF;
            color: black;

        }
        .a:hover{
            transition-duration: 2s;
            color: black;
        }

        .logout {
    position: absolute;
    top: 10px;
    right: 10px;
    width: auto;
    height: auto;
    background-color: black;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    text-decoration: none;
}

.logout:hover {
    background-color: white;
    color: black;
    transition-duration: 0.5s;
}
        table, tr, th, td{
            border: 1px solid white;
            background-color: lightgray;
        }
        </style>
    </head>
    <body>
    <form action="{{url('/logout')}}" method="GET">
        <button class="logout">Log Out</button>
    </form>

    <div class="div1">
        <h1>Roster</h1>

        <form method="GET" action={{ url('getRosterInfo') }} id="rosterForm">

            <table>

                <tr>
                    <th>Date</th>
                    <th>Group id</th>
                    <th>Supervisor id</th>
                    <th>Doctor id</th>
                    <th>Caregiver 1 id</th>
                    <th>Caregiver 2 id</th>
                    <th>Caregiver 3 id</th>
                    <th>Caregiver 4 id</th>
                </tr>

                <tr>

                    @if(isset($data))
                        <td><input type="date"  id="selectDate" name="scheduled_date" value = {{ $info->scheduled_date }} onchange = show_data()></td>
                        <td><input type="text" name="group_id" value="{{ $info ? $info->group_id:'' }}" readonly></td>
                        <td><input type="text" name="supervisor_id" value="{{ $info ? $info->supervisor_id:'' }}" readonly></td>
                        <td><input type="text" name="doctor_id" value="{{ $info ? $info->doctor_id:'' }}" readonly></td>
                        <td><input type="text" name="caregiver1_id" value="{{ $info ? $info->caregiver1_id:'' }}" readonly></td>
                        <td><input type="text" name="caregiver2_id" value="{{ $info ? $info->caregiver2_id:'' }}" readonly></td>
                        <td><input type="text" name="caregiver3_id" value="{{ $info ? $info->caregiver3_id:'' }}" readonly></td>
                        <td><input type="text" name="caregiver4_id" value="{{ $info ? $info->caregiver4_id:'' }}" readonly></td>
                    @endif
        
                </tr>

            </table>

        </form>
        <form action = "{{ url('adminsHome') }}">
            <button>Back</button>
        </form>
    </div>
    </body>
    <script>
        function show_data(){
            document.getElementById("rosterForm").submit()
        }
    </script>
</html>
