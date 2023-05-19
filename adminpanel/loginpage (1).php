<?php
    session_start();
    include ('connection.php');
    $username=$_POST['username'];
    $pass=$_POST['password'];

    // $sql="select * from registration_ where username='$username' and password='$pass'";
    //$reasult=mysqli_query($con,$sql);
    //$rec=mysqli_fetch_object($reasult);
    // $num=mysqli_num_rows($reasult);

    // if($num==1){
    //     header("location:adddepartment.php");
    //     echo "Inserted";
    // }else{
    //     echo "error";
    // }

    
    $date=date("YYYY-m-d");
    date_format($date);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
    <script>
        function validate(){
            var pass=document.getElementById('password').value;
            var usr=document.getElementById('username').value;
            var passpattern=/^[1-9a-zA-Z]{1,8}$/;
            var usernamepattern=/^[a-zA-Z]{3,8}$/;


            if(!(usr=="") && !(pass=="")){
                if((pass.match(passpattern)) && (usr.match(usernamepattern))){
                alert("Correct Password & username Pattern");
                }
                else{
                    alert("wrong password");
                }
            }
            else{
                alert("please Enter username and Password");
            }
        }
    </script>
</head>
<body>
    <center>
        <form method="POST">
            <div>
                <h1>Log IN</h1>
                <div class="font">UserName:</div>
                <input type="text" name="username" id="username" placeholder="Enter Username">

                <div class="font">Password:</div>
                <input type="Password" name="password" id="password" placeholder="Enter Username">

                 <div class="font">Date:</div>
                <input type="date" name="date" id="date" max="<?php echo $date;?>">

                <div class="font">Email:</div>
                <input type="email" id="email" name="email">
                
                <br><br>
                <button type="Submit" onclick="validate();" name="login">Log IN</button>
            </div>
        </form>
    </center>
</body>
</html>