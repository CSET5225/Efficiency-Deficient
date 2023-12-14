<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor's Patients</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html{
            height: 100%;
            width: 100%;
            background: linear-gradient(to bottom, #EEF5FF, #608ac1,#A25772);
        }
        table, tr, th, td{
            border-collapse: collapse;
            padding: 5px;
            border: 2px solid black;
        }

        input + span{
            padding-right: 30px;
        }

        input:invalid + span::after{
            position: absolute;
            content: "✖";
            padding-left: 5px;
        }

        input:invalid + span::after{
            position: absolute;
            content: "✓";
            padding-left: 5px;
        }
        .todaysMedications{
            /* display: none; */
        }
    </style>
</head>
<body>
    <label>Your Patient's Past History</label>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Comment</th>
                <th>Morning Medicine</th>
                <th>Afternoon Medicine</th>
                <th>Night Medicine</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $storedInfo)
            <tr>
                <td>{{ $storedInfo->medicine_date }}</td>
                <td>{{ $storedInfo->comment }}</td>
                <td>{{ $storedInfo->morning_medicine}}</td>
                <td>{{ $storedInfo->afternoon_medicine}}</td>
                <td>{{ $storedInfo->night_medicine}}</td>
            </tr>
            @endforeach

        </tbody>
    </table>

    
    <table class="todaysMedications">
            <thead>
                <tr>
                    <th>Comment</th>
                    <th>Morning Medicine</th>
                    <th>Afternoon Medicine</th>
                    <th>Night Medicine</th>
                    <th>Submit</th>
                </tr>
            </thead>
            <tbody>
                <form action="addMoreMeds" method="post">
                    @csrf
                    <tr>
                        <td>
                            <input name="comment" type="text">
                        </td>
                        <td>
                            <input name="morningMedicine" type="input">
                        </td>
                        <td>
                            <input name="afternoonMedicine" type="input">
                        </td>
                        <td>
                            <input name="nightMedicine" type="input">
                        </td>
                        <td>
                            <button>Submit</button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    </body>
    <script>
        const today = new Date();
        function displayMedicationsInput(){
            document.getElementsByClassName('todaysMedications').style.display = {{ 'medicine_date' }} == today ? "block" : "none" ;
        }
    </script>
</html>