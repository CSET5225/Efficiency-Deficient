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

    #form{
      background-color:#EEF5FF;
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
      font-size: large;
      border-radius: 20px; 
      border :1px solid black; 
    }

    button{
        margin: 10px;
        width: 50%;
        background-color:#9EB8D9; 
        font-size: large;
        color: white;
        border: none;
        border-radius: 20px;
    }

    button:hover{
      transition-duration: 2s;
      background-color: #EEF5FF;
      color:black;   
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
      border-radius: 20px; 
      border :1px solid black;
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
    <form action="{{url('/doctorsAppointment')}}" method="get">
    <label for="">Patient Id</label>
    <input type="text">
    <br>
    <br>
    <label for="">Patient Name</label>
    <input type="text">
    <br><br>
    <label for="">date</label>
    <input type="date">
    <br><br>
    <label for="">Doctor</label>
    <select name="Doctors" id="doctor">
        <option value="doc1">
        doc1
        </option>
        <option value="doc2">
        doc2
        </option>
        <option value="doc3">
        doc3
        </option>
        <option value="doc4">
        doc4
        </option>

    </select>
    <div id="buttons">
    <button>Ok</button>
    <button>cancel</button>
    </div>

    </form>
</body>
</html>