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
        html{
            height: 100%;
            width: 100%;
            background: linear-gradient(180deg, #EEF5FF, #9EB8D9, #7C93C3, #A25772) no-repeat;
        }
        
        body{
            overflow: hidden;
            font-family: OCRA Std, monospace;
        }
        
        .patient-info{
            display: flex;
            justify-content: space-between;
            width: 200px;
            /* visibility: hidden; */
        }
        
        table, tr, th, td{
            width: 1000pt;
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
                    <p name= "patient_id">#1415151</p>
                </div>

                <div class="patient-info">
                    <label>Patient Name</label>
                    <p name="patient_name">Test</p>
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
                    <tr>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                    </tr>
                    
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>