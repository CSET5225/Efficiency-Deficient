<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

     body {
      margin: 0;
      overflow: hidden;
      background: linear-gradient(to bottom, #EEF5FF, #608ac1,#A25772);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
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
    </style>
</head>
<body>
<button class="logout">Log Out</button>
<h1>New Roster</h1>
    <form action="{{ url('api/newRoster') }}" method="POST" id="form">
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

        <section id="buttons">
            <button name="submit" >OK</button>
            <button name="cancel" >Cancel</button>
        </section>
    </form>
</body>
</html>