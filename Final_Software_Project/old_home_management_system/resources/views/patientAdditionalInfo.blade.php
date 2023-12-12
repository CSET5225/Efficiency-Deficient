<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient Additional Information</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html{
            height: 100%;
            width: 100%;
            background: linear-gradient(180deg, #EEF5FF, #9EB8D9, #7C93C3, #A25772) no-repeat;
            font-family:monospace;
        }

        .container{
            display:flex;
            flex-direction:column;
            justify-content:center;
            text-align:center;
            border: 1px solid black;
            border-radius: 10px;
            font-size: 24px;
            padding:40px;
            background-color: white;
            margin:20px;
        }

        input{
            height:35px;
            width:200px;
            padding:5px;
        }

        select{
            height:35px;
            padding:5px;
            width:150px;
        }

        h1{
            padding-bottom:50px;
        }

        tr, td{
            padding:10px;
        }
        
        .buttonContainer{
            display:flex;
            justify-content:center;
        }

        #patientForm{
            display:flex;
            justify-content:center;
            text-align:center;
            flex-direction:row;
            align-items:flex-end;
        }

        button{
            margin: 10px;
            width: 140px;
            height:35px;
            background-color:#9EB8D9; 
            font-size: large;
            color: white;
            border: none; 
            padding:5px;
        }   

        button:hover{
            transition-duration: 2s;
            background-color: #EEF5FF;
            color:black;   
        }
    </style>
</head>
<body>

    <div class = "container">

    <h1>Patient Additional Information</h1>

    <form action={{ url('/getPatientInfo') }} method="GET" id="patientForm">

        @csrf

            <table>

                <tr>

                    <th>Patient ID</th>
                    <th>Group</th>
                    <th>Admission Date</th>
                    <th>Patient Name</th>
                
                </tr>

                <tr>

                    <td>

                        @if(isset($data))

                            <select id="patientId" name="patientID" style="padding: 8px;" onchange="searchPatient()">

                                    @foreach ($data as $item)

                                        <option value="{{ $item->patient_id }}">{{ $item->patient_id }}</option>

                                    @endforeach

                            </select>

                        </td>

                        <td><input type="text" name="group" value="{{ $info ? $info->group_id:$item->group_id }}" readonly></td>
                        <td><input type="date" name="date" value="{{ $info ? $info->DOB:$item->DOB }}" readonly></td>
                        <td><input type="text" name="patientName" value="{{ $info ? $info->first_name:$item->first_name }}" readonly></td>


                        @endif
                </tr>

            </table>

        </form>
        
        <div class="buttonContainer">
            <form action="{{ url('patientAddInfo') }}">
                <button>Different Id</button>
            </form>

            <form action="{{ url('adminsHome') }}">
                <button>Back To Home</button>
            </form>
        </div>
    
    </div>

    <script>
        function searchPatient(){
            document.getElementById('patientForm').submit();
        }
    </script>
    
</body>
</html>