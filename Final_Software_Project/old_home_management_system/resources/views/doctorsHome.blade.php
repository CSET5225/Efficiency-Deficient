<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor's Page</title>
</head>
<style>
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

.a {
  text-decoration: none;
  color: white;
font-family: 'Courier New', Courier, monospace;
}

button {
  border: none;
  background-color: #9EB8D9;
  width: 100%;
  font-size: 25pt;
  height: 175px; 
  margin: 10px 0; 
  color: white;
  border-radius: 20px;
}

.form {
 /* padding: 20px;  */
   box-sizing: border-box;
  z-index: 1;
  width: auto;
  height: auto;
  display: flex;
  flex-direction: row;
  justify-content: center; 
  background-color: white; 
  border-radius: 20px;
}


.div1{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-around;
  padding: 50px;
  width:auto; 
}
.div2{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-around;
   padding: 50px;
   width: auto;  
}
h1{
        /* margin-top: 50px; */
        position: absolute; 
        top: 20px; 
        left: 50%; 
        transform: translateX(-50%); 
        z-index: 2; 
      padding: 10px;
      font-size:40pt ;
    }
    button:hover{
        transition-duration: 2s;
        background-color: #EEF5FF;

    }
    .a:hover{
        transition-duration: 2s;
        color: black;
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
<body>
    <button class="logout">Log Out</button>
    <h1>Doctors Home</h1>
    <div class="form">
        <div class="div1">
        <button >
            <a href="" class="a">Patients</a>
        </button>

        <button>
            <a href="" class="a">Roster</a>
    </button>
    </div>
        <div  class="div2">
        <button class="div3">
            <a href="" class="a">Doctor's Dashboard</a>
    </button>

        <button class="div4">
            <a href="" class="a">Patient of doctor</a>
        </button>
        </div>
    </div>
</body>
</html>