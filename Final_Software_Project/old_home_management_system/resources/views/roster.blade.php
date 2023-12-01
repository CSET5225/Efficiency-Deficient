<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
</head>
<body>
    <style>
        form{
            width: 250px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 5px;
        }
        thead{
            background-color: lightgray;
            width: 50px;
            height: 25px;
        }
    </style>

    <form action="{{ url('api/roster') }}" method="GET">
        @csrf
        <section class="date">
            <label>Date</label>
            <input type="date" name="date">
        </section>
        <button>Submit</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Supervisor</th>
                <th>Doctor</th>
                <th>Caregiver1</th>
                <th>Caregiver2</th>
                <th>Caregiver3</th>
                <th>Caregiver4</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</body>
</html>
