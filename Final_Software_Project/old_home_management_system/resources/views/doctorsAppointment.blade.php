<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

    body {
      margin: 0;
      overflow: hidden;
      background: linear-gradient(to bottom, #EEF5FF, #608ac1,#A25772);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      font-family: monospace;
    }

    .form{
      background-color:white;
      padding: 20px;
      border-radius: 20px;
      z-index: 1;
      width: 150%;
      max-width: 420px;
      display: flex; 
      flex-direction: column; 
      align-items: center; 
    }

    input {
      margin: 10px;
      width: 100%;
      font-size: medium;
      border :1px solid black;
      padding:5px;
    }

    button{
      margin: 10px;
      width: 100px;
      background-color:#9EB8D9; 
      font-size: large;
      color: white;
      border: none;
      padding:5px;
    }

    button:hover{
      transition-duration: 1s;
      background-color: #EEF5FF;
      color:black;   
    }

    label{
      font-size:24px;
    }

    #buttons{
        display: flex;
        flex-direction: row;
    }

    h1{
      position: absolute; 
      top: 20px; 
      left: 50%; 
      transform: translateX(-50%); 
      z-index: 2; 
      padding: 10px;
      border-radius: 10px;
    }

    select{
      margin: 10px;
      width: 100%;
      font-size: large;
      border :1px solid black;
      padding:5px;
    }

    a {
      text-decoration: none;
      color: white;
      font-family: monospace;
    }

    a:hover{
        color: black;
        transition-duration: 2s;
    }

    .logout {
      position: absolute;
      top: 10px;
      right: 10px;
      width: auto;
      height: auto;
      background-color: black;
    }

    .logout:hover{
        background-color: white;
        transition-duration: 2s;
        color: black;
    }
    
    #buttons{
      display: flex;
      flex-direction: row;
    }

</style>
<body>
    <form action="{{url('/logout')}}" method="GET">

      <button class="logout">Log Out</button>

    </form>

    <h1>Docotor's Appointments</h1>
    <form action="{{url('api/addAppointment')}}" method="POST" class='form' id="appointmentForm">

      @csrf

      <label>Patient Id</label>
      <select name="patient_id">

        @foreach($patientData as $patient)
        
          <option>{{ $patient->patient_id }}</option>

        @endforeach

      </select>

      <label>date</label>
      <input type="date" name="scheduled_date">

      <label>Doctor</label>
      <select name="doctor_id" id="doctor">

        @foreach($doctorData as $doctor)

          <option>{{ $doctor->doctor_id }}</option>

        @endforeach

      </select>

      <div id="buttons">

        <button>Submit</button>

    </form>

    <form action="{{ url('/adminsHome') }}">

      <button>Cancel</button>

    </form>

    </div>

</body>


<script>

  function show_data(){
      document.getElementById("appointmentForm").submit()
  }

</script>

</html>