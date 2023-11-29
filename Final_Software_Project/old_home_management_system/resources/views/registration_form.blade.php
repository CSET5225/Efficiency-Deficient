<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
    <body>
        <form action="{{ url('/api/register')}}" method="post">
                @csrf

                <label>Role:<label><br>
                <select name="role_id" id="role_id" onchange="showDiv()">
                    <option value=1>Patient</option>
                    <option value=2>Caregiver</option>
                    <option value=3>Doctor</option>
                    <option value=4>Supervisor</option>
                    <option value=5>Admin</option>
                </select><br><br>

                <label>First Name:</label><br>
                <input type="text" name="first_name" id="first_name"><br><br>

                <label>Last Name:</label><br>
                <input type="text" name="last_name" id="last_name"><br><br>

                <label for="DOB">Date of Birth:</label><br>
                <input type="DOB" name="DOB" id="DOB" placeholder="0000-00-00"><br><br>

                <label>Email:</label><br>
                <input type="text" name="email" id="email"><br><br>

                <label>Password:<label><br>
                <input type="text" name="password" id="password" maxlength="12"><br><br>    
                
                <div id="hidden_information">
                    <label>Family Code:<label><br>
                    <input type="text" name="family_code" id="family_code" readonly value=<?php 
                        echo substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'), 0, 10);
                    ?>><br><br>
                    
                        
                    <label>Emergency Contact:</label><br>
                    <input type="tel" name="emergency_contact" id="emergency_contact" maxlength="12"><br><br> 
                </div>
                
                <button name = "register_button">Submit</button>
            </form>

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