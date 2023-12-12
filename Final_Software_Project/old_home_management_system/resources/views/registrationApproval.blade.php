<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Approval</title>
    <style>

        #hiddenForm{
            display:none;
        }

        html {
            background: linear-gradient(to bottom, #EEF5FF, #608ac1, #A25772);
            height: 100vh;
            font-family: monospace;
            height: 100%;
        }

        table {
            width: 60%;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 10px;
            
        }

        th {
            background-color: #608ac1;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        form {
            margin-top: 20px;
            text-align: center;
            max-height: 50%;
            height: auto;
        }

        button {
            margin: 10px;
            background-color: #9EB8D9;
            font-size: large;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        button:hover {
            transition-duration: 0.5s;
            background-color: #EEF5FF;
            border: solid 1px black;
            color: black;
        }

        .goback{
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .unhiddenForm{
                max-width: fit-content;
                max-height: fit-content;
                height: 50%;
                width: auto;
                margin: 100px;
                margin-bottom: 100px;
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
        
    </style>
</head>
    <body>
        <h1>Registration Approval</h1>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Position</th>
                <th>Approve</th>
                <th>Deny</th>
            </tr>
            @foreach($query as $account)

                <tr>
                        <div class="unhiddenForm">
                    <form action= "{{ url('api/register/'.$account->role_id)}}" method="POST">

                        @csrf
                        @method('PUT')
                        <td> <input name="first_name" value = "{{ $account->first_name }}" readonly></td> 
                        <td><input name="last_name" value = "{{ $account->last_name }}" readonly></td> 
                        <td><input name="email" value = "{{ $account->email }}" readonly></td>
                        <td><input name="role_id" value = "{{ $account->role_id }}" readonly></td> 
                        <td><button name="accountApprove">Approve</button></td>

                    </form>
                    </div>
                    <div id="hiddenForm">
                        <form action="{{ url('api/register/'.$account->role_id) }}" method="POST">

                            @csrf
                            @method('DELETE')
                            <input name="first_name" value = "{{ $account->first_name }}" class="hidden">
                            <input name="last_name" value = "{{ $account->last_name }}" class="hidden">
                            <input name="email" value = "{{ $account->email }}" class="hidden">
                            <input name="role_id" value = "{{ $account->role_id }}" class="hidden">
                            <td><button name="accountDelete">Delete</button></td>

                        </form>

                    </div>

                </tr>

            @endforeach

        </table>

        <form class='goback'action="{{ url('/adminsHome') }}">
            <button>Go Back</button>
        </form>

    </body>
</html>
