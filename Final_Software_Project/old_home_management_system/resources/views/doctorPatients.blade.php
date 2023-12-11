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
            <tr>
                <td>12/9/23</td>
                <td>All good</td>
                <td>9:00 AM</td>
                <td>3:00 PM</td>
                <td>9:00 PM</td>
            </tr>

        </tbody>
    </table> 

    <label>Today is: <p></p> It's time to assign a prescription!</label>

    <form action="" method="POST">
        <table>
            <thead>
                <tr>
                    <th>Comment</th>
                    <th>Morning Medicine</th>
                    <th>Afternoon Medicine</th>
                    <th>Night Medicine</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input name="comment" type="text">
                    </td>
                    <td>
                        <input name="morningMedicine" type="time" value="05:00" min = "05:00" max="11:59" required>
                        <span class="validity"></span>
                    </td>
                    <td>
                        <input name="afternoonMedicine" type="time" value="12:00" min="12:00" max="16:00" required>
                        <span class="validity"></span>
                    </td>
                    <td>
                        <input name="nightMedicine" type="time" value="17:00" min="17:00" max="23:59" required>
                        <span class="validity"></span>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    </body>
</html>