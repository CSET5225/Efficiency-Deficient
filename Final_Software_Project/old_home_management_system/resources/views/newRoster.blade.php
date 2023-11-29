<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form{
            display: flex;
            
        }
    </style>
</head>
<body>
    <form action="{{ url('api/roster') }}" method="POST">
        @csrf
        <label>Date</label>
        <input type="text" name="scheduled_date">
        
        <label>Supervisor</label>
        <input type="text" name="supervisor_name">
        
        <label>Doctor</label>
        <input type="text" name="doctor_name">
        
        <label>Caregiver1</label>
        <input type="text" name="caregiver1_name">
        
        <label>Caregiver2</label>
        <input type="text" name="caregiver2_name">
        
        <label>Caregiver3</label>
        <input type="text" name="caregiver3_name">
        
        <label>Caregiver4</label>
        <input type="text" name="caregiver4_name">

        <section>
            <button name="submit">OK</button>
            <button name="cancel">Cancel</button>
        </section>
    </form>
</body>
</html>