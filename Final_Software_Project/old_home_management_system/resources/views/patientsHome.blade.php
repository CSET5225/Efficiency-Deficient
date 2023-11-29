<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patients Home</title> {{-- Placeholder Text --}}
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        table, tr, th, td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div>
        <section>
            <form action="">
                @csrf
                <div>
                    <label>Patient ID</label>
                    <input type="text">
                </div>
                <div>
                    <label>Patient Name</label>
                    <input type="text">
                </div>
                <div>
                    <label>Date</label>
                    <input type="date">
                </div>
            </form>
        </section>
        <section>
            <table>
                <thead>
                    <tr>
                        <th>Doctor's Name</th>
                        <th>Doctor's Appointment</th>
                        <th>Caregiver's Name</th>
                        <th>Morning Medicine</th>
                        <th>Afternoon Medicine</th>
                        <th>Night Medicine</th>
                        <th>Breakfast</th>
                        <th>Lunch</th>
                        <th>Dinner</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </section>
    </div>
</body>
</html>