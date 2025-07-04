<?php

@include 'database.php';

if(isset($_POST['submit']))
{
    // ❌ No escaping/sanitization — vulnerable to XSS, SQLi
    $Name = $_POST['Name'];
    $Registration_number = $_POST['Regno'];
    $Phno = $_POST['Phno'];
    $Degree = $_POST['Degree'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $CPassword = $_POST['CPassword'];

    // ❌ SQL Injection possible via Regno and Password
    $select = "SELECT * FROM Student_login WHERE Registration_number = '$Registration_number' AND Password = '$Password'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = "User already exists! Regno: $Registration_number"; // ✅ Reflected XSS
    } else {
        if($Password != $CPassword){
            $error[] = "Passwords do not match!";
        } else {
            // ❌ SQL Injection possible here too
            $insert = "INSERT INTO student_registration (Name, Registration_number, Phone, Email, Password, Degree) 
                       VALUES('$Name', '$Registration_number', '$Phno', '$Email', '$Password', '$Degree')";
            $insertt = "INSERT INTO student_login (Registration_number, Password) VALUES('$Registration_number', '$Password')";
            
            if(mysqli_query($conn, $insert) && mysqli_query($conn, $insertt)) {
                header('location:login.php');
                exit();
            } else {
                $error[] = "Registration failed.";
            }
        }
    }
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>
            Register page
        </title>
        <link rel="stylesheet" href="register.css">
    </head>
    <style>
    body{
            margin: 0;
    padding: 0;
    overflow: hidden;
    height: 100%;
    }
.register .lg{
    color:blue
}
.register .lg:hover{
    color:black
}
.register{
    min-height: 100vh;
    display:inline-table;
    align-items: center;
    justify-content: center;
    padding: 20px;
    padding-bottom: 60px;
    margin-left:35%;
}
.register form h1{
    font-size: 30px;
    margin-bottom: 10px;
    color: rgba(16, 62, 72, 0.71);
    padding: 15px;
    background:  #d29a2240;
    border-radius:15px;
}
.register form input,
.register form select{
    border-radius: 15px;
    width: 90%;
    padding: 10px 15px;
    font-size: 16px;
    margin: 8px 0;
    color:rgba(16, 69, 31, 0.71);
    text-align: center;
    margin-left: 15px;
    margin-right: 25px;
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(16, 108, 79, 0.3);
}
.register form .form-btn1{
    background: rgba(16, 108, 79, 0.73);
    color: black;
    align-items: center;
    display: inline;
}
.register form .form-btn1:hover{
    color: white;
    background: rgba(17, 130, 94, 0.58);
}
.register form p{
    margin-top: 10px;
    font-size: 20px;
    color: black;
}

.register form .error-msg{
    margin:10px 0;
    display: block;
    background: rgba(16, 108, 79, 0.4);
    color: white;
    border-radius: 5px;
    font-size: 20px;
}

.register form .reg-cont{
    padding: 30px;
    border-radius: 15px;
    background:-webkit-linear-gradient(#ac873624,rgba(19, 134, 117, 0.6));
}

.register form .cont .tnc{
    align-items:left;
}

.register form .cont .p1{
    text-align:center;
}
.title .logo{
    width:5%;
    height:5%;
}
.title{
    display: flex;
    align-items: center;
    gap: 20px;
    
    padding: 10px;
    border-radius: 15px;
    background: -webkit-linear-gradient(#ac873624, rgba(19, 134, 117, 0.6));
}

    </style>
    <body background="images/anatomy canva card.jpeg">
        <div class="title">
            <img class="logo" src="images/logo.png">
            <h1>Evergreen Ridge University</h1>
</div>
        <div class="register">
            <form action="" method="post">
            <h1>Register Now!</h1><br/>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
                <div class="reg-cont">
                    <input type="text" name="Name" required placeholder="Enter your Name"><br/>
                    <select name="Degree" required>
                        <option value="">Select Degree</option>
                        <option value="B.Sc">B.Sc</option>
                        <option value="M.Sc">M.Sc</option>
                    </select><br/>
                    <input type="text" name="Regno" required placeholder="Enter your Registration number"><br/>
                    <input type="text" name="Phno" required placeholder="Enter your phone number"><br/>
                    <input type="email" name="Email" required placeholder="Enter Email"/><br/>
                    <input type="password" name="Password" required placeholder="Enter your Password"><br/>
                    <input type="password" name="CPassword" required placeholder="Re-enter your Password"><br/>
                    <input type="submit" name="submit" value="Register" class="form-btn1"><br/>
                    <p>Already have an account?<a id="lg" href="login.php">Click to login</a></p>
                </div>
            </form>
        </div>
    </body>
</html>