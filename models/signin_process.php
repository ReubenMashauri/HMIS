<?php
session_start();
include "../includes/connection.php";
$username="";
$password="";
if(isset($_POST['signin'])){
    $username=$_POST["username"];
    $password=md5($_POST["password"]);
    if(!empty($username) && !empty($password)){
        $sql="SELECT USER_NAME,PASSWORD from register where USER_NAME='".$username."' AND PASSWORD='".$password."'";
        $sql1="SELECT * from emp where EMP_USERNAME='".$username."' AND EMP_PASSWORD='".$password."'";
        $result = mysqli_query($connect, $sql);
        $data=mysqli_fetch_assoc(mysqli_query($connect,$sql1));
        $jibu=mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION["data1"]=$jibu;
            $_SESSION["username"]=$username;
            $_SESSION["password"]=$password;
            // header ("location: ../index.php?page=signin");
            print" <script>location.href='../index.php?page=signin';</script>";
        }
        // if ($username = "reception" && $password="reception"){
        //     print " <script>location.href='../index.php?page=signup';</script>";
        // }
        elseif($data){
            $_SESSION["data"]=$data;
            $_SESSION["empno"]=$data["EMPNO"];
            $_SESSION["emp_username"]=$data["EMP_USERNAME"];
            print "<script>location.href='../index.php?page=employees';</script>"; 

        }
        else{
            // header ("location: ../index.php?page=home");
            $msg="Invalid username/password";
            $_SESSION["error"]=$msg;
            header ("location: ../index.php?page=home");
        }
    }else{
        // header ("location: ../index.php?page=home");
        print "<script>alert('Please fill the username and password field to Signin');location.href='../index.php'</script>";
    }

}













// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//     // output data of each row
//     while($row = mysqli_fetch_assoc($result)) {
//         echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//     }
// } else {
//     echo "0 results";
// }
