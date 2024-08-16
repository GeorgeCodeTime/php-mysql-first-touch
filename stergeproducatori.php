<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql = "DELETE FROM producatori WHERE producatorID=$id";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location: producatori.php");
    }else{
        die(mysqli_error($conn));
    }
}
?>