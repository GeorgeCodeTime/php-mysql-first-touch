<?php
include 'connect.php';
require 'sesiunelogare.php';
if(isset($_POST['submit'])){
    $clientID=$_POST['clientID'];
    $produsID=$_POST['produsID'];
    $dataC=$_POST['dataComanda'];
    $cantitate=$_POST['cantitate'];

    $client = "SELECT * FROM clienti WHERE clientID='$clientID'";
    $clientresult = mysqli_query($conn,$client);

    $produs = "SELECT * FROM produsalimentar WHERE produsID='$produsID'";
    $produsresult = mysqli_query($conn, $produs);

    if (mysqli_num_rows($clientresult) > 0 && mysqli_num_rows($produsresult) > 0){
        $sql = "INSERT INTO comenzi (clientID,produsID,dataComanda,cantitate) VALUES ('$clientID','$produsID','$dataC','$cantitate')";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("Location: comenzi.php");
        }else{
            die(mysqli_error($conn));
    }
    }
    else{
        echo "<script>alert('ID-ul clientului sau ID-ul produsului nu exista in baza de date!');window.location.href='adaugacomanda.php';</script>";
    }

    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <title>Adauga Comenzi</title>
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
            margin-top:4%;
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
            margin-top: 25px;
            text-decoration:none;
        }

        .button1:hover {
            background-color:#C0392B;
        }

        .button2 {
            background-color: #76D7C4;
            color: white;
            padding: 12px 17px;
            border: solid 1px black;
            border-radius: 4px;
            cursor: pointer;
            font-size: 23px;
            margin-top: 25px;
            text-decoration:none;
        }

        .button2:hover {
            background-color: #48C9B0;
        }

    </style>
</head>
<body>
<center>
<div class="formular">
    <form method="post">
        <label for="nume">ClientID:</label>
        <input type="text"  name="clientID" placeholder="Introdu id client..." required>

        <label for="prenume">ProdusID:</label>
        <input type="text"  name="produsID" placeholder="Introdu id produs..." required>

        <label for="adresa">Data comanda:</label>
        <input type="text"  name="dataComanda" placeholder="Format data expirare(YYYY-MM-DD)..." required>

        <label for="adresa">Cantitate:</label>
        <input type="text"  name="cantitate" placeholder="Introdu cantitatea..." required>

        <center>
            <a href="comenzi.php" class="button1">Inapoi</a>
            <button class="button2" type="submit" name="submit">Adauga</button>
        </center>
    </form>
</div>
<center>
</body>
</html>