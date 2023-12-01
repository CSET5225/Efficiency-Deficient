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
        }
    
    
    
        @keyframes border {
          0%, 100% { background-color: #EEF5FF; }
          20% { background-color: #9EB8D9; }
          40% { background-color: #8fadd3; }
          60% { background-color: #799DCB; }
          80% { background-color: #e7d2da }
        }
    form{
      background-color:#EEF5FF;
      padding: 20px;
      border-radius: 20px;
      border: 5px solid #A25772;
      box-sizing: border-box;
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
          border-radius: 10px;
          border: 2px solid #A25772;
          font-size: large;
            
        }
    
        button{
            margin: 10px;
            width: 50%;
            border-radius: 10px;
            border: 2px solid #A25772;
            background-color:#9EB8D9; 
            font-size: large;
            color: white;
            
            
    }
    
    button:hover{
      transition-duration: 2s;
            background-color: #EEF5FF;
            color:black;   
    }
    
    h1{
            margin-top: 100px;
            position: absolute; 
            top: 20px; 
            left: 54%; 
            transform: translateX(-50%); 
            z-index: 2; 
          padding: 10px;
          border-radius: 10px;
        }
    
      
    </style>
    <h1>Admin Report</h1>

    <div id="form">
        <form action="{{ url('/adminreport')}}" method="post">
            @csrf
            <table>
                <tr> 
                    <td>Patient's Name:</td>
                    <td><input type="text" name="Patient's Name" id="Patient's Name"></td><br>
                </tr>
                <tr>
                    <td>Doctor's Name:</td>
                    <td><input type="text" name="Doctor's Name" id="Doctor's Name"></td><br>
                </tr>
                <tr>
                    <td>Appointments:<td>
                    <td><input type="date" name="Appointments" id="Appointments"></td><br>     
                </tr>
                <tr>
                    <td>Caregivers:</td>
                    <td><input type="text" name="Caregivers" id="Caregivers"></td><br>
                </tr>
                <tr>
                    <td>Morning Medicine:</td>
                    <td><input type="text" name="Morning Medicine" id="Morning Medicine"></td><br>
                </tr>
                <tr>
                    <td>Afternoon Medicine:<td>
                    <td><input type="text" name="Afternoon Medicine" id="Afternoon Medicine"></td><br>     
                </tr>
                <tr>  
                    <td>Night Medicine:</td>
                    <td><input type="text" name="Night Medicine" id="Night Medicine"></td><br>
                </tr>
                <tr>
                    <td>Breakfast:</td>
                    <td><input type="text" name="Breakfast" id="Breakfast"></td><br>
                </tr>
                <tr>
                    <td>Lunch:<td>
                    <td><input type="text" name="Lunch" id="Lunch"></td><br>     
                </tr>
                <tr>
                    <td>Dinner:</td>
                    <td><input type="text" name="Dinner" id="Dinner"></td><br>
                </tr>
            </table>
            
                    
            <button name = "register_button">Ok</button>
    
            <button name = "cancel_button">cancel</button>       
    </div>
</body>
</html>