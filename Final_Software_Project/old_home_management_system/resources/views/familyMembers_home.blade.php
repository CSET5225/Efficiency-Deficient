<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
    <body>
    <style>
    body {
      margin: 0;
      overflow: hidden;
      background: linear-gradient(to bottom, #9EB8D9, #799DCB);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    /* body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      border: 100px solid #EEF5FF;
      box-sizing: border-box;
      animation: border 10s linear infinite;
      background: linear-gradient(to bottom, #9EB8D9, #799DCB);
    } */

    @keyframes border {
      0%, 100% { background-color: #EEF5FF; }
      25% { background-color: #9EB8D9; }
      50% { background-color: #799DCB; }
      75% { background-color: #9EB8D9; }
    }

    #form {
      background: linear-gradient(to bottom, #9EB8D9, #799DCB);
      padding: 20px;
      border-radius: 20px;
      border: 10px solid #A25772;
      box-sizing: border-box;
      z-index: 1;
      width: 80%; 
      max-width: 400px; 
    }

    form {
      text-align: center;
      
    }

    input {
      margin: 10px;
      width: 100%;
      border-radius: 10px;
        border: 2px solid #A25772;
    }

    button{
        margin: 10px;
        width: 100%;
        border-radius: 10px;
        border: 2px solid #A25772;
        background-color: #7C93C3; 
}

h1 {
        animation: border 10s linear infinite;
        margin: 0;
        position: absolute; 
        top: 20px; 
        left: 50%; 
        transform: translateX(-50%); 
        z-index: 2; 
      padding: 10px;
    }
</style>




                <h1>Family Member</h1>

<div id="form">
        <form action="{{ url('/familyMembers_home')}}" method="post">
                @csrf
                    <label>Date:</label><br>
                    <input type="date" name="date" id="date"><br><br>

                    <label>Family Code:<label><br>
                    <input type="text" name="family_code" id="family_code"><br><br>     
                        
                    <label>Emergency Contact:</label><br>
                    <input type="tel" name="emergency_contact" id="emergency_contact" maxlength="12"><br><br> 
                

                <button name = "register_button">Ok</button>

                <button name = "cancel_button">cancel</button>
                
                </div>


                <script>
                    function showDiv(){
                    document.getElementById("hidden_information").style.display = family_code.value == 1 ? 'block' : 'none';
                }
                </script>

    </body>
</html>