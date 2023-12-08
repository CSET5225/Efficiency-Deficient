<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee List</title>
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
      form{
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
      .date{
        display: flex; 
        flex-direction: column; 
        align-items: center; 
        width: 100%; 
        margin: 10px 0; 
      }
      .code{
        display: flex; 
        flex-direction: column; 
        align-items: center; 
        width: 100%; 
        margin: 10px 0; 
      }
      .emergency_contact{
        display: flex; 
        flex-direction: column; 
        align-items: center; 
        width: 100%; 
        margin: 10px 0; 
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
      h1{
          position: absolute; 
          top: 20px; 
          left: 54%; 
          transform: translateX(-50%); 
          z-index: 2; 
        padding: 10px;
        border-radius: 10px;
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
    <h1>Employees</h1>
    <form action="{{ url('')}}" method="post">
        @csrf
        <div class= 'date'>
            <label>Date:</label><br>
            <input type="date" name="date" id="date" >
        </div>
        <div>
        <label for="ID">ID</label>
        <input type="hidden" name="ID" id="ID">
        <label for="name">Name</label>
        <input type="hidden" name="name" id="name">
        <label for="role">Role</label>
        <input type="hidden" name="role" id="role">
        <label for="salary">Salary</label>
        <input type="hidden" name="salary" id="salary">
    </div>
    <div>
        <label for="empID">Emp ID</label>
        <input type="text" name="empID" id="empID">
    </div>
    <div>
        <label for="newSalary">New Salary</label>
        <input type="text" name="newSalary" id="newSalary">
    </div>
    <button name = "register_button">Ok</button>
    <button name = "cancel_button">Cancel</button>
</form>
</body>
</html>