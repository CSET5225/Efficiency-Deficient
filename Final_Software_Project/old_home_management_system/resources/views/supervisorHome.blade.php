<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>super home</title>
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
}

.a {
  text-decoration: none;
  color: white;
}

button {
  border: none;
  background-color: #9EB8D9;
  width: 130%;
  font-size: 25pt;
  height: 175px; 
  margin: 10px 0; 
  color: white;
}

.form {
 padding: 20px; 
   box-sizing: border-box;
  z-index: 1;
  width: auto;
  height: auto;
  display: flex;
  flex-direction: row;
  justify-content: center; 
  background-color: white; 
}


.div1{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-around;
  padding: 50px;
  width: 50%; 
}
.div2{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-around;
  padding: 50px;
  width: 50%; 
}
.div3{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-around;
  padding: 50px;
  width: 50%; 
}
.div4 {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-around;
  padding: 50px;
  width: 50%; 
}
h1{
        margin-top: 50px;
        position: absolute; 
        top: 20px; 
        left: 54%; 
        transform: translateX(-50%); 
        z-index: 2; 
      padding: 10px
    }
    button:hover{
        transition-duration: 2s;
        background-color: #EEF5FF;

    }
    .a:hover{
        transition-duration: 2s;
        color: black;
    }


</style>
<body>
    
   <div class="form">
   <h1>Welcome Supervisor</h1>
    <div class="div1">
    
    <button>
            <a href="" class="a">Addtional Patient Info </a>
        </button>
        <br>
        <button>
            <a href="" class="a">Doctors Appointment </a>
        </button>
        <br>
    </div>

        <div class="div2">
        <button>
            <a href="" class="a">Employee Roster</a>
        </button>
        <br>
        <button>
            <a href="" class="a">Patients Home</a>
        </button>
        <br>
        </div>
        
       <div class="div3">
       <button>
            <a href="" class="a">Registration Approval</a>
        </button>
        <br>
        <button>
            <a href="" class="a">Roster</a>
        </button>
        <br>
       </div>

       <div class="div4">
       <button>
            <a href="" class="a">New Roster</a>
        </button>
        <br>
        <button>
            <a href="" class="a">Admin's Report</a>
        </button>
        <br>
       </div>
        
       
</div>
</body>
</html>