<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql = "DELETE FROM clienti WHERE clientID=$id";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location: clienti.php");
    }else{
        die(mysqli_error($conn));
    }
}
?>