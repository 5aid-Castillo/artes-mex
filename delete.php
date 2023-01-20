<?php
include('con_db.php');

$ide=$_GET['id'];

$sql="DELETE FROM productos  WHERE id='$ide'";
$query=mysqli_query($enlace, $sql);

    if($query){
        Header("Location: venderenp.php");
    }
?>