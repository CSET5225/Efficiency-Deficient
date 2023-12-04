<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/registrationForm.css') }}">
        <title>Registration</title>
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
    }

    @keyframes border {
      0%, 100% { background-color: #EEF5FF; }
      20% { background-color: #9EB8D9; }
      40% { background-color: #8fadd3; }
      60% { background-color: #799DCB; }
      80% { background-color: #e7d2da }
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


</style>
    <body>
        <div class="justify-content-center">
            <div class="w-100 d-flex justify-content-center">
                <h1>Registration</h1>
            </div>
            <div class="d-flex justify-content-center">
                <form action="{{ url('/api/register')}}" method="post" id="form">
                    @csrf
                    <div class="p-1 d-table w-100 text-center">
                        <label for="role_id" class="w-100 text-center">Role:</label>
                        <select name="role_id" id="role_id" onchange="showDiv()" class="d-block justify-content-center w-100" required>
                            <option value=1>Patient</option>
                            <option value=2>Caregiver</option>
                            <option value=3>Doctor</option>
                            <option value=4>Supervisor</option>
                            <option value=5>Admin</option>
                        </select>
                    </div>

                    <div class="p-1 d-table w-100 text-center">
                        <label for="first_name" class="w-50">First Name:</label>
                        <input type="text" id="first_name" name="first_name" class="w-100" required>

                    </div>

                    <div class="p-1 d-table w-100 text-center">
                        <label for="last_name" class="w-50">Last Name:</label>
                        <input type="text" id="last_name" name="last_name" class="w-100" required>

                    </div>

                    <div class="p-1 d-table w-100 text-center">
                        <label for="DOB" class="w-50">Date of Birth:</label>
                        <input type="DOB" name="DOB" id="DOB" placeholder="0000-00-00" class="w-100" required>
                    </div>
                            
                    <div class="p-1 d-table w-100 text-center">
                        <label for="email" class="w-50">Email:</label>

                        <input type="text" id="email" name="email" class="w-100" placeholder="example@example.com">

                    </div>

                    <div class="p-1 d-table w-100 text-center">
                        <label for="password" class="w-50">Password:</label>
                        <input type="text" name="password" id="password" maxlength="12" class="w-100" required>

                    </div>  
                            
                    <div id="hidden_information">
                        <div class="p-1 d-table w-100 text-center">
                            <label for="family_code" class="w-50">Family Code:</label>
                            <input type="text" name="family_code" id="family_code" readonly value="{{ $family_code }}" class="w-100">
                        </div>
                                    
                        <div class="p-1 d-table w-100 text-center">
                            <label for="emergency_contact" class="w-50">Emergency Contact:</label>  

                            <input type="tel" name="emergency_contact" id="emergency_contact" maxlength="12" class="w-100">


                        </div>
                    </div>
                            
                    <div id='buttons'>
                        <button name="register_button" class="">Submit</button>
                        <button name="cancel_button" class="w-100"><a href="./">cancel</a></button>
                </div>
                </form>
            </div>
        </div>
        <script>

        //Changes the displayed information depending on the selected role
        function showDiv(){
            document.getElementById("hidden_information").style.display = role_id.value == 1 ? 'block' : 'none';
        }
        
        //Automatically adds dashes in the emergency contact section
        var tele = document.querySelector('#emergency_contact');
        tele.addEventListener('keyup', function(e){
            if (event.key != 'Backspace' && (tele.value.length === 3 || tele.value.length === 7)){
                tele.value += '-';
            }
        });

        </script>
    </body>
</html>