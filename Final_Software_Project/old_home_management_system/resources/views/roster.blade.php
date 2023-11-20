<html>
    <head>
        <title>Test</title>
        <style>
            form{
                width: 250px;
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }
            th{
                background-color: lightgray;
                width: 50px;
                height: 25px;
            }
        </style>
    </head>

    <body>
        <form action="{{ url('api/viewing') }}" method="POST">
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