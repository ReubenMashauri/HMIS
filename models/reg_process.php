<?php 
session_start();
include "../includes/connection.php";
// if(isset($_POST["signup"])){
    $fname=$_POST["fname"];
    $mname=$_POST["mname"];
    $lname=$_POST["lname"];
    $gender=$_POST["gender"];
    $dob=$_POST["dob"];
    $mstatus=$_POST["mstatus"];
    $bplace=$_POST["bplace"];
    $region =$_POST["region"];
    $nationality =$_POST["nationality"];
    $ocupation=$_POST["ocupation"];
    $height=$_POST["height"];
    $weight=$_POST["weight"];
    $pnumber=$_POST["pnumber"];
    $membership_number=$_POST["membership_number"];
    $votenumber =$_POST["votenumber"];
    $sturegno= $_POST["sturegno"];
  //  $sql="INSERT INTO register(FNAME,MNAME,LNAME,GENDER,AGE,TRIBE,DISTRICT,WARD,STREET,PNUMBER,EMAIL,PADDRESS) VALUES('$fname','$mname','$lname','$gender','$age','$tribe','$district','$ward','$street','$pnumber','$email','$paddress')";
  if ($_SESSION["data"]) {
    $sql="INSERT INTO `register`( `FNAME`, `MNAME`, `LNAME`, `GENDER`, `DOB`, `M_STATUS`, `BIRTH_PLACE`, `REGION`, `NATIONALITY`, `OCUPATION`, `HEIGHT`, `WEIGHT`, `MOBILE_NUMBER`, `MEMBERSHIP_NUMBER`, `VOTE_NUMBER`, `STUREGNO`, `DATE_TIME`) VALUES ('$fname','$mname','$lname','$gender','$dob','$mstatus','$bplace','$region','$nationality','$ocupation','$height','$weight','$pnumber','$membership_number','$votenumber','$sturegno','')";
    $result=mysqli_query($connect,$sql);
    if($result){
        print "<script>alert('Registered a Patient Successfull');location.href='../index.php?page=v_pt'</script>";
    }
    else {
      print "<script>alert('Not Registered a Patient Successfull');location.href='../index.php?page=add_pt'</script>";
    }
  }else {
    header ("location: index.php?page=home");
  }
 