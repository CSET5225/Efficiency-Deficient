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
        }
        body{
            padding: 25px;
        }
        .container{
            display: grid;
            border: 1px solid black;
            border-radius: 10px;
            grid-template-areas:
            'patientID patientName'
            'group .'
            'admissionDate .'
            '. buttons';
            grid-template-columns: 1fr 1fr;
            font-size: 24px;
            padding: 55px;
            column-gap: 25px;
            background-color: white;
        }

        input[type=text]{
            padding: 12px 20px;
            margin: 8px 0;
        }

        
        .patientID{
            grid-area: patientID;
        }
        
        .group{
            grid-area: group;
        }
        .admissionDate{
            grid-area: admissionDate;
        }
        .patientName{
            /* display: none; */
            grid-area: patientName;
        }
        .button-container{
            grid-area: buttons;
        }
        .button-container > button{
            font-size: 25px;
            padding: 5px;
        }
    </style>
</head>
<body>
    <form action={{ url('/patientSearch') }} method="POST" id="patientForm">
        @csrf
    <div class="container">
            <section class="patientID">
                <label style="color: crimson;">Patient ID</label>
                <select id="patientId" name="patientID" style="padding: 8px;" onchange="searchPatient()">
                    {{-- @if (isset($patientName)) --}}
                    {{-- <option value="">{{ $data->patient_id }}</option> --}}
                    {{-- @endif --}}
                    <option value="">Select an ID.</option>
                    @foreach ($data as $item)
                    <option value="{{ $item->patient_id }}">{{ $item->patient_id }}</option>
                    @endforeach
                    
                </select>
            </section>
            <section class="group">
                <label>Group</label>
                @if(isset($group_id))
                <input type="text" name="group" value="{{ $group_id[0]->group_id }}">
                @endif
            </section>
            <section class="admissionDate">
                <label>Admission Date</label>
                <input type="date" name="date" value="" readonly>
            </section>
            <section class="patientName">
                <label>Patient Name</label>
                @if(isset($patientName)){
                        <input type="text" name="patientName" value="{{ $patientName[0]->first_name }}" readonly>
                }
                @endif
            </section>
            <section class="button-container">
                <button name="patient_add_info_submit">Submit</button>
                <button name="patient_add_info_cancel">
                    <a style="text-decoration:none;" href="/patientAddInfo">Cancel</a>
                </button>
            </section>
        </form>
        </div>
    <script>
        function searchPatient(){
            document.getElementById('patientForm').submit();
            document.getElementById('patientForm').readOnly = true;

            // document.getElementById('patientForm').value = {{ $item->patient_id }};
            
            // localStorage.setItem('storedOption', document.getElementById('patientForm').value);
            // if(localStorage.getItem('storedOption')){
            //     document.getElementById('storedOption').options[localStorage.getItem('storedOption')].selected = true;
            // }
                
        }
    </script>
</body>
</html>