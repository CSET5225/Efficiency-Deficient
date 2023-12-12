<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<style>

body {
        margin: 0;
        overflow: hidden;
        background: linear-gradient(to bottom, #EEF5FF, #608ac1, #A25772);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column; 
        height: 100vh;
        font-family: monospace;
    }

    #form {
        background-color: #EEF5FF;
        padding: 20px;
        border-radius: 20px;
        z-index: 1;
        width: 100%; 
        max-width: 420px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .date, .code, .emergency_contact {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        margin: 10px 0;
    }

    input {
        margin: 10px;
        width: calc(100% - 20px); 
        font-size: large;
        border-radius: 20px;
        border: 1px solid black;
    }

    button {
        margin: 10px;
        width: 50%;
        background-color: #9EB8D9;
        font-size: large;
        color: white;
        border: none;
        border-radius: 20px;
    }
    button:hover {
        transition-duration: 2s;
        background-color: #EEF5FF;
        color: black;
    }
    h1 {
        position: absolute;
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 2;
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
    .logout:hover {
        background-color: white;
        transition-duration: 2s;
        color: black;
    }
    .table-container {
        width: 100%; 
        display: flex;
        justify-content: center; 
    }
    table {
        display: none; 
        width: 80%;
        margin-top: 20px;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-left: 10%;
    } 
    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 12px;
    }
    th {
        background-color: #608ac1;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    #buttons{
    display: flex;
    flex-direction: row;
}
</style>


<body>
<div class='body'>
        <form action="{{ url('/logout') }}" method="GET">
            <button class="logout">Log Out</button>
        </form>
        <h1>Family Member</h1>

        <div id="form">
        <form action="{{ url('/familyMembers_home') }}" method="GET">
    @csrf
    <div class='date'>
        <label>Date:</label><br>
        <input type="date" name="date" id="date" required>
    </div>
    <br><br>
    <div class="code">
        <label>Family Code:</label><br>
        <input type="text" name="family_code" id="family_code" placeholder="Enter Family Code" required>
    </div>
    <br><br>
    <div class='emergency_contact'>
        <label>Patient ID:</label><br>
        <input type="text" name="patient_id" id="patient_id" placeholder="Enter Patient ID" required>
    </div>
    <br><br>
    <div id="buttons">
        <button type="button" name="register_button" onclick="showTable()">Ok</button>
        <button type="button" name="cancel_button" onclick="resetForm()">Cancel</button>
    </div>
</form>
        </div>
    </div>

    <div>
        <table id="familyTable">
            <tr>
                <th>Patient ID</th>
                <th>Doctor's Name</th>
                <th>Doctor's Appointments</th>
                <th>Caregiver's Name</th>
                <th>Morning Medicine</th>
                <th>Afternoon Medicine</th>
                <th>Night Medicine</th>
                <th>Breakfast</th>
                <th>Lunch</th>
                <th>Dinner</th>
            </tr>

            @foreach ($a as $patient)
    <tr>
        <td>{{ $patient['patient_id'] }}</td>
        <td>{{ $patient['doctors_name'] }}</td>
        <td>{{ $patient['doctors_appointments'] }}</td>
        <td>{{ $patient['caregivers_name'] }}</td>
        <td>{{ $patient['morning_medicine'] }}</td>
        <td>{{ $patient['afternoon_medicine'] }}</td>
        <td>{{ $patient['night_medicine'] }}</td>
        <td>{{ $patient['breakfast'] }}</td>
        <td>{{ $patient['lunch'] }}</td>
        <td>{{ $patient['dinner'] }}</td>
    </tr>
@endforeach
        </table>
    </div>
<script>
   function validateForm() {
        var familyCode = document.getElementById('family_code').value;
        var emergencyContact = document.getElementById('emergency_contact').value;
        var familyTable = document.getElementById('familyTable');
        if (!familyCode || !emergencyContact) {
            alert('Please fill out all the fields.');
            familyTable.style.display = 'none';
            return false;
        }
        familyTable.style.display = 'table';
        return false; 
    }
    function showTable() {
        validateForm();
    }
    function showTable() {
        var date = document.getElementById('date').value;
        var familyCode = document.getElementById('family_code').value;
        var pateintid = document.getElementById('patient_id').value;
        var familyTable = document.getElementById('familyTable');
        if (date && familyCode && familyTable) {
            familyTable.style.display = 'table';
        } else {
            familyTable.style.display = 'none';
        }
    }
</script>

</body>
</html>