<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Roster</title>
    
</head>
<body>
<style>
        /* form{
            width: 250px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 5px;
        }
        thead{
            background-color: lightgray;
            width: 50px;
            height: 25px;
        }
        .logout {
            position: absolute;
            top: 10px;
            left: 10px;
            width: 25%;
            height: auto;
            background-color: black;
        }

        .logout:hover{
            background-color: white;
            transition-duration: 2s;
            color: black;
        } */


        body {
  margin: 0;
  overflow: hidden;
  background: linear-gradient(to bottom, #EEF5FF, #608ac1, #A25772);
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  font-size: larger;
      font-family: 'Courier New', Courier, monospace;
}

input {
      margin: 10px;
      width: auto;
      border-radius: 20px; 
      border :1px solid black; 
    }

.a {
  text-decoration: none;
  color: white;
font-family: 'Courier New', Courier, monospace;
}

button {
  border: none;
  background-color: #9EB8D9;
  max-width: fit-content;
  width: 75%;
  font-size: 25pt;
  height: fit-content; 
  margin: 10px 0; 
  color: white;
  border-radius: 20px;
}

.form {
  z-index: 1;
  width: auto;
  height: auto;
  display: flex;
  flex-direction: row;
  justify-items: center;
  padding: 10px;
  border-radius: 20px;
}


.div1{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-around;
  padding: 50px;
  width: 50%; 
}

h1{
        /* margin-top: 50px; */
        position: absolute; 
        top: 20px; 
        left: 54%; 
        transform: translateX(-50%); 
        z-index: 2; 
      padding: 10px;
      font-size:40pt ;
    }
    button:hover{
        transition-duration: 2s;
        background-color: #EEF5FF;
        color: black;

    }
    .a:hover{
        transition-duration: 2s;
        color: black;
    }

    .logout {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 25%;
            height: auto;
            background-color: black;
        }

        .logout:hover{
            background-color: white;
            transition-duration: 2s;
            color: black;
        }
        table, tr, th, td{
            width: auto;
            border: 1px solid white;
            background-color: lightgray;
        }
    </style>

<button class="logout">Log Out</button>
<h1>Roster</h1>
<div class="div1">
    <form action="{{ url('api/roster') }}" method="GET" class="form">
        @csrf
        <section class="date">
            <label>Date</label>
            <input type="date" name="date">
        </section>
        
    </form>
    <button>Submit</button>
    <table>
        <thead>
            <tr>
                <th>Supervisor</th>
                <th>Doctor</th>
                <th>Caregiver1</th>
                <th>Caregiver2</th>
                <th>Caregiver3</th>
                <th>Caregiver4</th>
            </tr>
        </thead>
        <tbody>
        <tr>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
            </tr>
        </tbody>
    </table>
    </div>
</body>
</html>
