<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee List</title>
    <style>
      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body {
        overflow: hidden;
        background: linear-gradient(to bottom, #EEF5FF, #608ac1,#A25772);
        display: flex;
        align-items: center;
        justify-content: center;
        height: 110vh;
      }
      .main{
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

      .table-container{
        max-height: 100px;
        overflow-y: auto;
      }
      table, tr, th, td{
        border: 2px solid;
        padding: 2px;
      }

      #errorMessage{
        color: crimson;
      }
      #successMessage{
        color: rgb(80, 194, 80);
      }
      .center{
        display;flex;
      }

    </style>
</head>
<body>
    <h1>Employees</h1>
    <div class="main">
    <form action="{{ url('/employeeSearch')}}" method="post">
        @csrf
        <div class= 'search'>
          <label for="empID">Employee ID</label>
          <input id="empID" type="text" placeholder="Search by ID:" name="emp_id">
          
          <label for="first_name">First Name</label>
          <input id="first_name" type="text" placeholder="Search by Employee Name:" name="first_name">

          <label for="last_name">Last Name</label>
          <input id="last_name" type="text" placeholder="Search by Employee Name:" name="last_name">
          
          <label for="empRole">Employee Role</label>
          <input id="empRole" type="text" placeholder="Search by Role:" name="emp_role">

          <label for="empSalary">Employee Salary</label>
          <input id="empSalary" type="text" placeholder="Search by Salary:" name="emp_salary">
          <button>Submit</button>
        </div>
      </form>
        <div>
          <div class="table-container">
            <table>
              <thead>
                <tr>
                  <th>Employee ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Role</th>
                  <th>Salary</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($adminData as $adminData)
              <tr>
                <td>{{ $adminData->admin_id }}</td>
                <td>{{ $adminData->first_name }}</td>
                <td>{{ $adminData->last_name }}</td>
                <td>{{ $adminData->role_name }}</td>
                <td>{{ $adminData->salary }}</td>
              </tr>
              @endforeach
              @foreach ($supervisorData as $supervisorData)
              <tr>
                <td>{{ $supervisorData->supervisor_id }}</td>
                <td>{{ $supervisorData->first_name }}</td>
                <td>{{ $supervisorData->last_name }}</td>
                <td>{{ $supervisorData->role_name }}</td>
                <td>{{ $supervisorData->salary }}</td>
              </tr>
              @endforeach
              @foreach ($caregiverData as $caregiverData)
              <tr>
                <td>{{ $caregiverData->caregiver_id }}</td>
                <td>{{ $caregiverData->first_name }}</td>
                <td>{{ $caregiverData->last_name }}</td>
                <td>{{ $caregiverData->role_name }}</td>
                <td>{{ $caregiverData->salary }}</td>
              </tr>
              @endforeach
              @foreach ($doctorData as $doctorData)
              <tr>
                <td>{{ $doctorData->doctor_id }}</td>
                <td>{{ $doctorData->first_name }}</td>
                <td>{{ $doctorData->last_name }}</td>
                <td>{{ $doctorData->role_name }}</td>
                <td>{{ $doctorData->salary }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
    <form action="{{ url('/updateSalary') }}" method="POST">
      @csrf
      <div>
        <label for="empID">Emp ID</label>
        <input type="text" name="empID" id="empID">
      </div>
      <div>
        <label for="">Role Name</label>
        <input type="text" name="role_name" id="role_name">
      </div>
      <div>
        <label for="newSalary">New Salary</label>
        <input type="text" name="newSalary" id="newSalary">
      </div>
      @if (isset($successMessage))
      <p id="successMessage">
        {{ $successMessage }}
      </p>
      @elseif (isset($errorMessage))
      <p id="errorMessage">
        {{ $errorMessage }}
      </p>
      @endif
    <div class = "center">
    <button name = "register_button" id="register_button">Ok</button>
    </form>
    <form action = "{{ url('adminsHome') }}">
    <button>Cancel</button>
    </form>
    </div>
  </div>
</body>
</html>