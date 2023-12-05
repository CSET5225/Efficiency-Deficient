<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient Additional Information</title>
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
            padding: 25px;
        }
        .container{
            display: grid;
            border: 1px solid black;
            border-radius: 10px;
            grid-template-areas:
            'patientID patientName'
            'group .'
            'admissionDate .'
            '. buttons';
            grid-template-columns: 1fr 1fr;
            font-size: 24px;
            padding: 55px;
            column-gap: 25px;
            background-color: white;
        }

        input[type=text]{
            padding: 12px 20px;
            margin: 8px 0;
        }

        .patientID{
            grid-area: patientID;
        }
        
        .group{
            grid-area: group;
        }
        .admissionDate{
            grid-area: admissionDate;
        }
        .patientName{
            display: none;
            grid-area: patientName;
        }
        .button-container{
            grid-area: buttons;
        }
    </style>
</head>
<body>
    <form action={{ url('/patientInfoSearch') }} method="POST">
        @csrf
    <div class="container">
            <section class="patientID">
                <h1>Please insert data into the Patient ID.</h1>
                <label>Patient ID</label>
                <input type="text" name="patientID">
            </section>
            <section class="group">
                <label>Group</label>
                <input type="text" placeholder="Group..." name="group" value="{{ $data->group_id }}" readonly>
            </section>
            <section class="admissionDate">
                <label>Admission Date</label>
                <input type="date" name="date" value="{{ $data->admission_date }}" readonly>
            </section>
            <section class="patientName">
                <label>Patient Name</label>
                <input type="text" name="patientName" value="{{ $data->full_name }}" readonly>
            </section>
            <section class="button-container">
                <button name="patient_add_info_confirm">OK</button>
                <button name="patient_add_info_cancel">Cancel</button>
            </section>
        </div>
    </form>
</body>
</html>