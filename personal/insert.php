<?php
include("conexion.php");
$con=conectar();

$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$role=$_POST['role'];


$sql="INSERT INTO `mainlogin` (`username`, `email`, `password`, `role`) VALUES ('$username','$email','$password','$role')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: personal_portada.php");
    
}
else {

}
?>