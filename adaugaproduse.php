<?php
include 'connect.php';
require 'sesiunelogare.php';
if(isset($_POST['submit'])){
    $denumire=$_POST['denumire'];
    $dataP=$_POST['dataProducere'];
    $dataE=$_POST['dataExpirare'];

    $sql = "INSERT INTO produsalimentar (denumire,dataProducere,dataExpirare) VALUES ('$denumire','$dataP','$dataE')";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location: produse.php");
    }else{
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adauga Produse</title>
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
            margin-top:8%;
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
        <label for="nume">Denumire:</label>
        <input type="text"  name="denumire" placeholder="Introdu denumirea..." required>

        <label for="prenume">Data Producere:</label>
        <input type="text"  name="dataProducere" placeholder="Format data producere(YYYY-MM-DD)..." required>

        <label for="adresa">Data expirare:</label>
        <input type="text"  name="dataExpirare" placeholder="Format data expirare(YYYY-MM-DD)..." required>

        <center>
            <a href="produse.php" class="button1">Inapoi</a>
            <button class="button2" type="submit" name="submit">Adauga</button>
        </center>
    </form>
</div>
<center>
</body>
</html>