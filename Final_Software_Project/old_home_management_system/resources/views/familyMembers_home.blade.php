<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
    <body>
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
                
                <table id="hidden_information">
                        <tr>
                            <td class='doctors_name'>Doctor's Name</td>
                            <td class='doctors_appointments'>Doctor's Appointment</td>
                            <td class='caregivers_name'>Caregiver's Name</td>
                            <td class='morning_medicine'>Morning Medicine</td>
                            <td class='afternoon_medicine'>Afternoon Medicine</td>
                            <td class='night_medicine'>Night Medicine</td>
                            <td class='breakfast'>Breakfast</td>
                            <td class='lunch'>Lunch</td>
                            <td class='dinner'>Dinner</td>
                        </tr>
                       
                        @foreach ($a as $patient)

                        <tr>
                        <td class="doctors_name">

                       {{$Paitent['doctors_name'] }}
                    </td>
                    <td class="doctors_appointments">

                  {{ $Paitent['doctors_appointments']  }}

                    </td>

                    <td class="caregivers_name">

                    {{ $Paitent['caregivers_name'] }}

                    </td>

                    <td class="morning_medicine">

                    {{ $Paitent['morning_medicine'] }}

                    </td>

                    <td class="afternoon_medicine">

                    {{ $Paitent['afternoon_medicine'] }}

                    </td>

                    <td class="night_medicine">

                    {{ $Paitent['night_medicine'] }}

                    </td>

                    <td class="breakfast">

                    {{ $Paitent['breakfast'] }}

                    </td>

                    <td class="lunch">

                    {{ $Paitent['lunch'] }}
                    </td>

                    <td class="dinner">

                    {{ $Paitent['dinner'] }}
                    </td>
                        </tr>
                        @endforeach 
                </table>


                <script>
                    function showDiv(){
                    document.getElementById("hidden_information").style.display = family_code.value ==  ? 'block' : 'none';
                }
                </script>

    </body>
</html>