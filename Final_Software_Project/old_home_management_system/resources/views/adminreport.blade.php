<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Report</title>
</head>
<body>
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
        left: 50%; 
        top: -3%;
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
<form action="{{url('/logout')}}" method="GET">
    <button class="logout">Log Out</button>
    </form>
       <h1>Admin Report</h1>
    <div id="form">
    
        <form action="{{ url('/adminReport')}}" method="post">
            @csrf
            <div>
              <label for="paitentsName">Paitents Name</label>
           <br>
           <input type="text" name="paitentsName">
           <br><br>
          </div>
            <div>
            <label for="doctorsName">Doctors Name</label>
           <br>
           <input type="text" name="doctorsName">
           <br><br>
            </div>
            <div>
            <label for="appointments">Appointments</label>
           <br>
           <input type="date">
           <br><br>
            </div>
            <div> <label for="caregivers">Caregivers</label>
           <br>
           <input type="text" name="caregivers">
           <br><br></div>
            <div><label for="morningMedicine">Morning Medicine</label>
           <br>
           <input type="text" name="morningMedicine">
           <br><br>
          </div>
          <div>
          <label for="afternoonMedicine">Afternoon Medicine</label>
           <br>
           <input type="text" name="afternoonMedicine">
           <br><br>
          </div>
          <div>
          <label for="nightMedicine">Night Medicine</label>
           <br>
           <input type="text" name="nightMedicine">
           <br><br>
          </div>
          <div>
          <label for="breakfast">Breakfast</label>
           <br>
           <input type="text" name="breakfast">
           <br><br>
          </div> 
           <div>
           <label for="Lunch">Lunch</label>
           <br>
           <input type="text" name="Lunch">
           <br><br>
           </div>
           <div>  
           <label for="dinner">Dinner</label>
           <br>
           <input type="text" name="dinner">
           <br><br>
           </div>
          <div id="buttons">
          <button name = "register_button">Ok</button>
          <button name = "cancel_button"><a href="./">cancel</a></button>  
          </div>    
    </div>
</body>
</html>