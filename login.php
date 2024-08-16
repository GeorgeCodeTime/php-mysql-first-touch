<?php

require 'connect.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $parola = $_POST['password'];


$sql = "SELECT * FROM conturi WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {

    if (password_verify($parola, $row['parola'])) {
    
        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['tip'] = $row['tip'];
        header("Location: clienti.php");
        exit();
    } else {
        
        echo "<script>alert('Usernameul sau parola au fost introduse gresit!');</script>";
    }
} else {
    
    echo "<script>alert('Usernameul sau parola au fost introduse gresit!');</script>";
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <title>Intra in cont</title>
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
            margin-top:200px;
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

        .button1 {
            background-color: #CD6155;
            color: white;
            padding: 12px 17px;
            border: solid 1px black;
            border-radius: 4px;
            cursor: pointer;
            font-size: 23px;
            text-decoration:none;
            font-family: 'Sofia';
        }

        .button1:hover {
            background-color:#C0392B;
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
        <h1>Intra in cont</h1>

        <div>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        
        <div>
            <label for="password">Parola</label>
            <input type="password" id="password" name="password" required>
        </div>
        
        <center>
        <button class="button1" type="submit" name="submit">Intra in cont</button>
        </center>
    </form>
</center>
</body>
</html>