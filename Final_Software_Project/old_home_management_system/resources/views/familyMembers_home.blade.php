<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
    
    
    
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
    </style>
</head>
<body>
  @auth
  <h1>Family Member</h1>
  
  <div id="form">
  <form action="{{ url('/familyMembers_home')}}" method="post">
  @csrf
  <div class= 'date'>
      <label>Date:</label><br>
      <input type="date" name="date" id="date" >
  </div>
  <br><br>
  
  
  <div class="code">
    <label>Family Code:</label><br>
    <input type="text" name="family_code" id="family_code" placeholder="Enter Family Code">
   </div> 
  
  <br><br>
  <div class= 'emergency_contact'>
      <label>Emergency Contact:</label><br>
      <input type="tel" name="emergency_contact" id="emergency_contact" maxlength="12" placeholder="Enter Emergency Contact">
  </div>  
  <br><br>
  <button name = "register_button">Ok</button>
  
  <button name = "cancel_button">cancel</button>
  </form>
  </div>
  <script>
      function showDiv(){
      document.getElementById("hidden_information").style.display = family_code.value == 1 ? 'block' : 'none';
  }
  </script>
  
  @else
  <script>
    alert("Please log in.");
    window.location.href = "/login";
  </script>
  @endauth
  
</body>
</html>