<?php
include 'connect.php';
require 'sesiunelogare.php';
if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

    $query = "SELECT * FROM producatori WHERE producatorID = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $denumire=$row['denumire'];
        $tara=$row['taraOrigine'];
        $adresa=$row['adresa'];
    } else {
        die(mysqli_error($conn));
    }
}

if(isset($_POST['submit'])){
    $denumire=$_POST['denumire'];
    $tara=$_POST['taraOrigine'];
    $adresa=$_POST['adresa'];

    $sql = "UPDATE producatori SET denumire='$denumire', taraOrigine='$tara', adresa='$adresa' WHERE producatorID='$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location: producatori.php");
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
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <title>Editeaza Producator</title>
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
            font-family: 'Sofia';
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
        <input type="text"  name="denumire" value="<?php echo $denumire; ?>" placeholder="Introdu denumirea..." required>

        <label for="prenume">Tara Origine:</label>
        <input type="text"  name="taraOrigine" value="<?php echo $tara; ?>" placeholder="Introdu tara de origine..." required>

        <label for="adresa">Adresa:</label>
        <input type="text"  name="adresa" value="<?php echo $adresa; ?>" placeholder="Introdu adresa..." required>

        <center>
            <a href="producatori.php" class="button1">Inapoi</a>
            <button class="button2" type="submit" name="submit">Editeaza</button>
        </center>
    </form>
</div>
<center>
</body>
</html>