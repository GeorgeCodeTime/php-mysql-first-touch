<?php
include 'connect.php';
require 'sesiunelogare.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producatori</title>
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
            background-color: rgba(0, 0, 0, 0.305);         
        }
        th, td {
            border: 2px solid black;
            padding-left:10px;
            padding-top:4px;
            padding-bottom:4px;
            text-align: left;
            font-size: 25px;
            color:white;
        }
        th {
            background-color: #2ECC71;
            color:white;
            font-size:30px;
            
        }

        body{
            background-image: url('forest.jpg'); 
            background-size: cover; 
            background-repeat: no-repeat;
            background-attachment: fixed; 
            margin: 0; 
            padding: 0; 
            font-family: 'Sofia';
        }
        
        .button{
            margin-left:10%;
            margin-top: 9%;
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
            font-family: 'Sofia';
        }

        .button:hover {
            background-color: #82E0AA;

        }

        .topbar{
            position: fixed;
            background-color:#00000063 ;
            display: flex;
            justify-content: center;
            width: 100%;
            padding-bottom:10px;
            padding-top:10px;
            border-bottom: solid 2px black;
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

        .delButton{
            background-color:#CB4335;
            border: none;
            padding : 7px 10px;
            border-radius: 10px;
            color:white;
            font-size:25px;
            cursor:pointer;
            border: solid black 1.5px;
            text-decoration:none;
            font-family: 'Sofia'
        }

        .delButton:hover{
            background-color: #B03A2E;
        }

        .Buttons{
            display:flex;
            justify-content:center;
            width:auto;
            
        }

        .editButton{
            background-color:#1F618D;
            border: none;
            padding : 7px 10px;
            border-radius: 10px;
            color:white;
            font-size:25px;
            cursor:pointer;
            border: solid black 1.5px;
            text-decoration:none;
            font-family: 'Sofia';
            margin-left:20px;
        }

        .editButton:hover{
            background-color:#1A5276;
        }

        .adresa {
            max-width: 400px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .welcome{
            position:relative;
            top:180px;
            margin-left:200px;
            color:white;
            font-size:40px;
        }

    </style>
</head>
<body>
<div class=topbar>
    <a class="buttonNavigare" href="clienti.php">Clienti</a>
    <a class="buttonNavigare" href="producatori.php" style="background-color:#5D6D7E;">Producatori</a>
    <a class="buttonNavigare" href="produse.php">Produse</a>
    <a class="buttonNavigare" href="comenzi.php">Comenzi</a>
    <a class="buttonNavigare" href="expedieri.php">Expedieri</a>
    <a class="buttonNavigare" style="margin-left:100px;background-color:red;" href="logout.php">Logout</a>
</div>
<p class="welcome"><?php echo "Utilizator: " . $utilizator .""?></p>
<a class="button" href="adaugaproducator.php">Adauga producator</a>
<center>    
    <table>
        <tr>
            <th>PoducatorID</th>
            <th>Denumire</th>
            <th>Tara Origine</th>
            <th>Adresa</th>
            <th>Opreatii</th>
        </tr>
        <tbody>
            <?php
                $sql = "SELECT * FROM producatori";
                $result = mysqli_query($conn,$sql);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        $id=$row['producatorID'];
                        $denumire=$row['denumire'];
                        $tara=$row['taraOrigine'];
                        $adresa=$row['adresa'];
                        echo '<tr>';
                        echo '<td>'.$id.'</td>';
                        echo '<td>'.$denumire.'</td>';
                        echo '<td>'.$tara.'</td>';
                        echo '<td class="adresa">'.$adresa.'</td>';
                        echo '<td>';
                        echo '<center>';
                        echo '<div class="Buttons">';
                        
                        if ($_SESSION['tip'] == 'admin') {
                            echo '<a class="delButton" href="stergeproducatori.php?deleteid='.$id.'">Sterge</a>';
                        }
                        
                        echo '<a class="editButton" href="editproducatori.php?updateid='.$id.'">Editeaza</a>';
                        
                        echo '</div>';
                        echo '</center>';
                        echo '</td>';
                        echo '</tr>';
                    }
                }

            ?>
        </tbody>    
    </table>
</center>
</body>
</html>