<?php
include 'connect.php';
require 'sesiunelogare.php';
if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

    $query = "SELECT * FROM expedieri WHERE expediereID = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $produsID=$row['produsID'];
        $producatorID=$row['producatorID'];
        $dataE=$row['dataExpediere'];
        $cantitate=$row['cantitate'];
    } else {
        die(mysqli_error($conn));
    }
}

if(isset($_POST['submit'])){
    $produsID=$_POST['produsID'];
    $producatorID=$_POST['producatorID'];
    $dataE=$_POST['dataExpediere'];
    $cantitate=$_POST['cantitate'];

    $producator = "SELECT * FROM producatori WHERE producatorID='$producatorID'";
    $producatorresult = mysqli_query($conn,$producator);

    $produs = "SELECT * FROM produsalimentar WHERE produsID='$produsID'";
    $produsresult = mysqli_query($conn,$produs);

    if (mysqli_num_rows($producatorresult) > 0 && mysqli_num_rows($produsresult) > 0){
        $sql = "UPDATE expedieri SET produsID='$produsID', producatorID='$producatorID', dataExpediere='$dataE', cantitate='$cantitate' WHERE expediereID='$id'";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("Location: expedieri.php");
        }else{
            die(mysqli_error($conn));
        }
    }
    else{
        echo "<script>alert('ID-ul producatorului sau ID-ul produsului nu exista in baza de date!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <title>Editeaza Expediere</title>
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
            font-family: 'Sofia';
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
        <label for="nume">ProdusID:</label>
        <input type="text"  name="produsID" value="<?php echo $produsID; ?>" placeholder="Introdu id produs..." required>

        <label for="prenume">ProducatorID:</label>
        <input type="text"  name="producatorID" value="<?php echo $producatorID; ?>" placeholder="Introdu id producator..." required>

        <label for="adresa">Data comanda:</label>
        <input type="text"  name="dataExpediere" value="<?php echo $dataE; ?>" placeholder="Format data expediere(YYYY-MM-DD)..." required>

        <label for="adresa">Cantitate:</label>
        <input type="text"  name="cantitate" value="<?php echo $cantitate; ?>" placeholder="Introdu cantitatea..." required>

        <center>
            <a href="expedieri.php" class="button1">Inapoi</a>
            <button class="button2" type="submit" name="submit">Editeaza</button>
        </center>
    </form>
</div>
<center>
</body>
</html>