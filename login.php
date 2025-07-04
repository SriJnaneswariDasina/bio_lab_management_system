<?php

@include 'database.php';

if(isset($_POST['submit']))
{
    $Registration_number =$_POST['Regno'];
    $Password =$_POST['Password'];
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    
    $query = "SELECT * FROM student_login WHERE Registration_number = '$Registration_number' && Password = '$Password'";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result)==1) 
    {
           $error[]= 'Login successful!';
           $row = mysqli_fetch_assoc($result);
           $student_id = $row['id']; // assuming the table has an 'id' column
           header("Location:home.php?id=$student_id");
           exit();
    } else {
            $error[] = 'Invalid email or password!';
        }

        $conn->close();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">   
        <meta name="viewport" content="width=divice-width, initial-scale=1.0">
        <title>
            Login Page
        </title>

        <style>
            
.fr .log-cont p a{
    color:black;
    font-size: 22px;
    border: 4px;
    border-color: rgb(244, 224, 7);
    border-radius: 10px;
    font-weight: 700;
    padding: 10px 30px;
    margin: 5px;
}
.fr .log-cont p a:hover{
    color:black
}
.fr{
    min-height:80vh;
    display:flex;
    align-items:last baseline;
    align-self:center;
    justify-content: center;
    padding: 20px;
    padding-bottom: 70px;
    height:30px;
}
.fr form{
    align:center;
}
.fr form h3{
    font-size: 30px;
    text-transform: uppercase;
    margin-bottom: 10px;
    color:rgba(228, 10, 10);
    padding: 15px;
    background-color:rgba(198, 179, 179, 0.145);
    border-radius:15px;
}
.fr form input{
    border-radius: 15px;
    width: 90%;
    padding: 10px 15px;
    font-size: 16px;
    margin: 8px 0;
    color:rgba(228, 10, 10, 0.277);
    text-align: center;
    margin-left: 15px;
    margin-right: 25px;
}
.fr form .form-btn2{
    background-color:rgba(228, 10, 10, 0.277);
    color: white;
}

.fr form .form-btn2:hover{
    background: rgba(213, 159, 21, 0.518);
    color:black;
}
.fr form p{
    margin-top: 10px;
    font-size: 20px;
    color: black;
}
.log-cont{
    background-color:rgba(198, 179, 179, 0.145);
    width: 500px;
    height: 40%;
    align-content: center;
    border-radius: 15px;
    margin-right:25px;
    padding-top: 30px;
    padding-right: 15px;
    padding-bottom: 12px;
}   
.fr form .error-msg{
    margin:10px 0;
    display: block;
    background-color:rgba(198, 179, 179, 0.145);
    color: white;
    border-radius: 5px;
    font-size: 20px;
}

.log-cont p{
    margin-left: 15px;
}
.video-background {
      position: fixed;
      top:0;
      left:0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: -1;
    }

    .video-background video {
      object-fit: cover;
      width: 100%;
      height: 100%;
    }
        </style>
    </head>
    <body style="background-color: black;">

    <div class="video-background">
    <video id="vid" autoplay muted loop>
      <source src="images/bg.mp4" type="video/mp4">
    </video>
  </div>
        
        <div class="fr">
            <form action="" method="post">
            <h3>Login Now!</h3><br/>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <div class="log-cont">
            
            <input type="text" name="Regno" required placeholder="Enter Registration Number"/><br/>
            <input type="password" name="Password" required placeholder="Enter Password"/><br/>
            <input type="submit" name="submit" value="Login" class="form-btn2"><br/>
            <p> Don't have an account yet? <a id="rg" href="registeration.php">click to register</a></p>
            <p><a id="rg" href="adminlogin.php">Login as Admin</a></p>
        </form></div></div>
    </body>
</html>