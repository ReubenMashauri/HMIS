<?php
   if(isset($_SESSION["data"])){
    if($_SESSION["empno"]==123243){
        include ("header_doctor.php");
    }
 if($_SESSION["empno"]==123246){
        include ("header_admin.php");
    }   
    // if($_SESSION["empno"]==123245){
    //     include ("header_bursar.php");
    // }
    if ($_SESSION["empno"]==123247){
        include ("header_reception.php");
    }
    if($_SESSION["empno"]==123244){
        include ("header_lab.php");
    }
    if ($_SESSION["empno"]==123248) {
        include ("pharm_header.php");
    }
   }else{
    include ("header.php");
   }
 
 ?>
<div class="mt-5">
<?php include $page; ?>
</div>
<?php include ("footer.php"); ?>