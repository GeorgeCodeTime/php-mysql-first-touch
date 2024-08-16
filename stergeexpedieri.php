<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql = "DELETE FROM expedieri WHERE expediereID=$id";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location: expedieri.php");
    }else{
        die(mysqli_error($conn));
    }
}
?>