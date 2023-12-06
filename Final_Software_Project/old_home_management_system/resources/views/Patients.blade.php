<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients Table</title>
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
            border-radius: 20px;
            border: 1px solid black;
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
            width: 75%;
            font-size: 25pt;
            height: fit-content;
            margin: 10px 0;
            color: white;
            border-radius: 20px;
        }

        .div1 {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            padding: 50px;
            width: 100%; 
        }

        h1 {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2;
            padding: 10px;
            font-size: 40pt;
        }

        button:hover {
            transition-duration: 2s;
            background-color: #EEF5FF;
            color: black;
        }

        .a:hover {
            transition-duration: 2s;
            color: black;
        }

        .logout {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 25%;
            height: auto;
            background-color: black;
        }

        .logout:hover {
            background-color: white;
            transition-duration: 2s;
            color: black;
        }

        table,
        tr,
        th,
        td {
            width: auto;
            border: 1px solid white;
            
            background-color: lightgray;
        }

        table {
            width: 100%; 
            border-collapse: collapse;
            border-radius: 20px;
            margin: 20px; 
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #608ac1;
            color: white;
        }
    </style>
</head>
<body>
    <button class="logout">Log Out</button>

    <h1>Patients Table</h1>

    <form action="{{ url('/PatientsCheck') }}" method="get" class="form">
        @csrf 

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>DOB</th>
                <th>Emergency Contact</th>
                <th>Emergency Contact Name</th>
                <th>Admission Date</th>
            </tr>

            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->patient_id }}</td>
                    <td>{{ $patient->full_name }}</td>
                    <td>{{ $patient->DOB }}</td>
                    <td>{{ $patient->emergency_contact }}</td>
                    <td>{{ $patient->emergency_contact_name }}</td>
                    <td>{{ $patient->admission_date }}</td>
                </tr>
            @endforeach
        </table>
    </form>
</body>
</html>
