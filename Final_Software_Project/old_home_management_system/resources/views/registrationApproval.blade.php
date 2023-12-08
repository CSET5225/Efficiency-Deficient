<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Approval</title>
    <style>

        th{
            padding:10px;
        }
        tr{
            padding:10px;
        }
        td{
            padding:10px;
        }
        .hidden{
            visibility:hidden;
        }

    </style>
</head>
    <body>
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

                    <form action={{ url('api/register/'.$account->role_id)}} method="POST">

                        @csrf
                        @method('PUT')
                        <td> <input name="first_name" value = {{ $account->first_name }} readonly></td> 
                        <td><input name="last_name" value = {{ $account->last_name }} readonly></td> 
                        <td><input name="email" value = {{ $account->email }} readonly></td>
                        <td><input name="role_id" value = {{ $account->role_id }} readonly></td> 
                        <td><button name="accountApprove">Approve</button></td>

                    </form>

                    <form action={{ url('api/register/'.$account->role_id) }} method="POST">

                        @csrf
                        @method('DELETE')
                        <input name="first_name" value = {{ $account->first_name }} class="hidden">
                        <input name="last_name" value = {{ $account->last_name }} class="hidden">
                        <input name="email" value = {{ $account->email }} class="hidden">
                        <input name="role_id" value = {{ $account->role_id }} class="hidden">
                        <td><button name="accountDelete">Delete</button></td>

                    </form>

                </tr>

            @endforeach

        </table>

        <form action={{ url('/adminsHome') }}>
            <button>Go Back</button>
        </form>

    </body>
</html>