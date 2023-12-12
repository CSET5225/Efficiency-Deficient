<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <style>
        html {
            font-family: monospace;
        }

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

        .logout {
            position: absolute;
            top: 10px;
            right: 10px;
            width: auto;
            height: auto;
            background-color: black;
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            transition-duration: 0.5s;
        }

        .logout:hover {
            background-color: white;
            color: black;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            width: 80%;
            margin-top: 20px;
            background-color: white;
            border-radius: 20px;
            flex-direction: column;
        }

        button {
            border: none;
            background-color: #9EB8D9;
            width: 150px;
            height: 60px;
            margin: 10px;
            color: white;
            border-radius: 10px;
            cursor: pointer;
            transition-duration: 0.5s;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        button:hover {
            background-color: #EEF5FF;
        }

        a {
            text-decoration: none;
            color: white;
            font-family: monospace;
        }

        a:hover {
            color: black;
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

        .row {
            display: flex;
            justify-content: center;
            flex-direction: row;
        }
    </style>
</head>
<body>
    <button class="logout">Log Out</button>
        <h1>Admins Home</h1>
<form action="">
        <div class="row">
            <button><a href="./doctorsAppointment">Doctors Appointments</a></button>
            <button><a href="employeeList">Employee List</a></button>
            <button><a href="./Patients">Patients</a></button>
            <button><a href="registrationApproval">Registration Approval</a></button>
            <button><a href="rosterView">Roster</a></button>
        </div>

        <div class="row">
            <button><a href="newRoster">New Roster</a></button>
            <button><a href="./adminReport">Admins Reports</a></button>
            <button><a href="./payment">Payment</a></button>
            <button><a href="newRoleForm">Role</a></button>
            <button><a href="">Caregiver's Patients</a></button>
            <button><a href="./caregiversHome">Caregiver's home</a></button>
        </div>
    </form>
        
</body>
</html>