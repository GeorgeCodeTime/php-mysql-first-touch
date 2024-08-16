<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql = "DELETE FROM produsalimentar WHERE produsID=$id";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location: produse.php");
    }else{
        die(mysqli_error($conn));
    }
}
?>