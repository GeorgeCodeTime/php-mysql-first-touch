<?php
require 'connect.php';

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $accountType = $_POST["accounttype"];

    $duplicate = mysqli_query($conn, "SELECT * FROM conturi WHERE username= '$username' OR email = '$email'");
    
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Usernameul sau Emailul este deja folosit');</script>";
        header("Location: index.php");
    } else {
        if ($password == $confirmpassword) {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO conturi (nume, username, email, parola, tip) VALUES ('$name', '$username', '$email', '$hashedPassword', '$accountType')";
            mysqli_query($conn, $query);
            echo "<script>alert('Inregistrarea a avut loc cu succes');</script>";
            header("Location: login.php");
        } else {
            echo "<script>alert('Parolele nu corespund');</script>";
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <title>Creeaza Cont</title>
    <style>
        body {
            font-family: 'Sofia';
            background-image: url('forest.jpg'); 
            background-size: cover; 
            background-repeat: no-repeat;
            background-attachment: fixed; 
            margin: 0; 
            padding: 0; 
        }

        form {
            max-width: 500px;
            border : solid 2px black;
            padding: 30px;
            border-radius: 20px;
            margin-top:10px;
            background-color: rgba(0, 0, 0, 0.3);
        }

        label {
            display: block;
            margin-bottom: 8px;
            text-align: left;
            font-size: 30px;
            color:white;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            font-size: 20px;
        }

        .account{
            width: 20px;
            font-size:25px;
        }

        .button1 {
            background-color: #CD6155;
            color: white;
            padding: 12px 17px;
            border: solid 1px black;
            border-radius: 4px;
            cursor: pointer;
            font-size: 23px;
            margin-top: 150px;
            margin-left:-820px;
            text-decoration:none;
        }

        .button1:hover {
            background-color:#C0392B;
        }

        .radio{
            display: flex;
            align-items: center;
            justify-content:space-between;
            margin-top:-70px;
        }

        .radio label{
             margin-right: -20px;
        }

        .radio input{
            margin-right:-100px;
        }
        .topbar{
            position: fixed;
            background-color:#00000063 ;
            display: flex;
            justify-content: center;
            width: 30%;
            padding-bottom:10px;
            padding-top:10px;
            border-bottom: solid 2px black;
            border-right:solid 2px black;
            font-family: 'Sofia';
            top:0px;
        }

        .buttonNavigare{
            background-color:#2ECC71;
            border: none;
            padding : 12px 17px;
            border-radius: 10px;
            color:white;
            font-size:30px;
            cursor:pointer;
            border: solid black 1.5px;
            display: inline-block;
            text-decoration:none;
            margin-left: 40px;
            font-family: 'Sofia';
        }

        .buttonNavigare:hover {
            background-color: #82E0AA;
        }
    </style>
</head>
<body>
<div class=topbar>
    <a class="buttonNavigare" href="login.php">Intra in Cont</a>
    <a class="buttonNavigare" href="index.php">Creeaza Cont</a>
</div>
    <center>
    <form method="post" id="signup">
        <h1>Creeaza cont</h1>
        <div>
            <label for="name">Nume</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div>
            <label for="password">Parola</label>
            <input type="password" id="password" name="password" required>
        </div>
        
        <div>
            <label for="confirmpassword">Repeta parola</label>
            <input type="password" id="confirmpassword" name="confirmpassword" required>
        </div>

        <div>
            <label for="account_type">Tipul Contului</label>
            <div class="radio">
        
                <input class="account" type="radio" id="user" name="accounttype" value="user" required>
                <label class="account" for="user">user</label>

                <input class="account" type="radio" id="admin" name="accounttype" value="admin" required>
                <label class="account" for="admin">admin</label>
                
            <div>
        </div>
        <center>
        <button class="button1" type="submit" name="submit">Creeaza cont</button>
        </center>
    </form>
    </center>
</body>
</html>