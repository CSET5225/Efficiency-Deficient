<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patients Home</title> {{-- Placeholder Text --}}
    <style>
       body {
      margin: 0;
      overflow: hidden;
      background: linear-gradient(to bottom, #EEF5FF, #608ac1,#A25772);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      font-size: larger;
      font-family: 'Courier New', Courier, monospace;
    }
        div{
            display: flex;
            margin: auto;
            padding: 25px;
            column-gap: 150px;
            justify-content: center;
        }
        label{
            border-radius: 10px;
            font-size: 25pt;
            width: auto;
            height: auto;
            text-align: center;
            background-color: #7C93C3;
            color: white;
            justify-content: center;
        }
        input{
            width: 250px;
            border: 1px solid;
            font-size: 15pt;
            border-color: black;
            border-radius: 10px;
        }
        button{
            width: 150px;
            height: 50px;
            box-sizing: border-box;
            background-color: #9EB8D9;
            color: white;
            text-align: center;
            font-size: 25pt;
            border-radius: 10px;
            border: none;
        }
        button:hover{
            background-color: #EEF5FF;
            color: black;
            transition-duration: 2s;

        }
        #all{
            background-color: #EEF5FF;
            padding: 20px;
            box-sizing: border-box;
            z-index: 1;
            width: auto;
            max-width: 100%;
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            border-radius: 20px;
            justify-content: center;
            margin: auto;
            }

h1{
        position: absolute; 
        top: 20px; 
        left: 50%; 
        transform: translateX(-50%); 
        z-index: 2; 
      padding: 10px;
      border-radius: 10px;
      font-size: 25pt;
}
        
        table, tr, th, td{
            width: 50%;
            border: 1px solid #9EB8D9;
            margin: auto;
            padding:10px ;
        }

        .date{
  display: flex; 
  flex-direction:row; 
  align-items: center; 
  width: 100%; 
  margin-left: 11%;
}

.patient-info{
  display: flex; 
  flex-direction: row; 
  align-items: center; 
  width: 100%; 
 
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
<button class="logout">Log Out</button>
    <div id='all'>
        <h1>Patients Page</h1>
        <section>
            <form action="{{ url('/patientHome')}}">
                @csrf
                <div class="patient-info">
                    <label>Patient ID</label>
                    <p name= "patient_id">#1415151</p>
                </div>

                <div class="patient-info">
                    <label>Patient Name</label>
                    <p name="patient_name">Test</p>
                </div>

                <div class="date">
                    <label>Date</label>
                    <input type="date">
                </div>
            </form>
        </section>
        <section>
            <table>
                <thead>
                    <tr>
                        <th>Doctor's Name</th>
                        <th>Doctor's Appointment</th>
                        <th>Caregiver's Name</th>
                        <th>Morning Medicine</th>
                        <th>Afternoon Medicine</th>
                        <th>Night Medicine</th>
                        <th>Breakfast</th>
                        <th>Lunch</th>
                        <th>Dinner</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                    </tr>
                    
                </tbody>
            </table>
        </section>
    </div>
    
</body>
</html>