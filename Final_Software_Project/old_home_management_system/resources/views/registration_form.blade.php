<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
    <body>
        <form action="{{ url('/api/doctors')}}" method="post">
                @csrf

                <label>Role:<label><br>
                <select name="role_id">
                    <option value=1>Patient</option>
                    <option value=2>Caregiver</option>
                    <option value=3>Doctor</option>
                    <option value=4>Supervisor</option>
                    <option value=5>Admin</option>
                </select><br><br>

                <label>First Name:</label><br>
                <input type="text"name="first_name"><br><br>

                <label>Last Name:</label><br>
                <input type="text" name="last_name"><br><br>

                <label for="DOB">Date of Birth:</label><br>
                <input type="DOB" name="DOB" placeholder = "0000-00-00"><br><br>

                <label>Email:</label><br>
                <input type="text"name="email"><br><br>

                <button name = "register_button">Submit</button>
            </form>
    </body>
</html>