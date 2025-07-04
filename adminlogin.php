<?php

@include 'database.php';

if(isset($_POST['submit']))
{
    $Email = $_POST['Email'];        // No sanitization
    $Password = $_POST['Password'];  // No sanitization
    $Code = $_POST['code'];          // No sanitization

    // SQL Injection vulnerability
    $query = "SELECT * FROM adminloginn WHERE Code = '$Code'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        // No authentication, no session management — IDOR risk
        echo "<script>alert('Login successful!');</script>";
        header("Location: admin.php"); // Insecure redirection
        exit();
    } else {
        // XSS vulnerability — user input shown without escaping
        $error[] = "Invalid email or password: $Email";
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
            
.rg{
    color:rgba(198, 179, 179, 0.145);
}
.rg:hover{
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
    <body>
    <div class="video-background">
    <video id="vid" autoplay muted loop>
      <source src="images/bg.mp4" type="video/mp4">
    </video>
  </div>
        <div class="fr">
            <form action="" method="post">
            <h3>Login Now!</h3><br/>
            <?php
        // XSS: echoing unescaped error messages
        if(isset($error)) {
            foreach($error as $msg) {
                echo "<div style='color:red;'>$msg</div>"; // vulnerable to XSS
            }
        }
        ?>
            <div class="log-cont">
            
            <input type="email" name="Email" required placeholder="Enter Email"/><br/>
            <input type="password" name="Password" required placeholder="Enter Password"/><br/>
            <input type="code" autocomplete="off" name="code" required placeholder="Enter Code"><br/>
            <input type="submit" name="submit" value="Login" class="form-btn2"><br/>
            <p> Don't have an account yet? <a id="rg" href="register.php">click to register</a></p>
        </form></div></div>
    </body>
</html>