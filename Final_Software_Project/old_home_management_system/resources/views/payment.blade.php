<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
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
    </style>
</head>
<body>
    <h1>Balance Owed</h1>
    <div>
        <button type="reset">Update Balance</button>
    </div>
    <table>
        <tr>
            <td>Daily Charge:</td>
            <td>... days = $</td>
        </tr>
        <tr>
            <td>Appointment Charge:</td>
            <td>... appointments = $</td>
        </tr>
        <tr>
            <td>Monthly Medication Charge:</td>
            <td>Medication 1 = $</td>
            <td>Medication 2 = $</td>
            <td>Medication 3 = $</td>
        </tr>
    </table>
</body>
</html>