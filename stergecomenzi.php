<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql = "DELETE FROM comenzi WHERE comandaID=$id";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location: comenzi.php");
    }else{
        die(mysqli_error($conn));
    }
}
?>