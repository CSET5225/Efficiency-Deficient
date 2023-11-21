<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
                <form action="{{ url('/api/doctors')}}" method="post">
                @csrf
                <label for="first_name">First Name:</label>
                <br>
                <input type="text"name="first_name">
                <br><br>
                <label for="last_name">Last Name:</label>
                <br>
                <input type="text"name="last_name">
                <br><br>
                <label for="DOB">Date of Birth:</label>
                <br>
                <input type="DOB"name="DOB">
                <br><br>
                <label for="email">Email:</label>
                <br>
                <input type="text"name="email">
                <br><br>
                <button>Submit</button>
                </form>
</body>
</html>