<?php
$hostname="localhost";
$username="root";
$password="";
$database="odlrs";

//create connection
$connect=mysqli_connect($hostname,$username,$password,$database);

// Check connection
 if (!$connect) {
     die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
// try{
//     $conn= new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//     // echo "Connected successfully";
// }catch(PDOException $e){
//     die("Dtabase Exception".$e->getMessage());
// }