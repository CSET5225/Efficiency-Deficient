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

        body{
            background-color: lightblue;
            
        }
        
        .patient-info{
            visibility: hidden;
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
                <div class="patient-info">
                    <label>Patient ID</label>
                    <p name= "patient_id"></p>
                </div>
                <div class="patient-info">
                    <label>Patient Name</label>
                    <p name="patient_name">
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