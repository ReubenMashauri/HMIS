<?php
$pt="";
$t="";
$r="";
$SP1=$_POST["ptno"];
$_SESSION['p']=$SP1;
$sql2="SELECT * FROM TEST WHERE PATIENT_NUMBER=$SP1";
$result2=mysqli_query($connect,$sql2);
$count=mysqli_num_rows($result2);
$_SESSION["count"]=$count;
if ($result2) {
    ?>
    <form action="index.php?page=test1" method="post" role="form">
    <div class="card">
    <div class="card-header"><?= " FILL THE REMARK FOR EACH TEST OF THE PATIENT NUMBER :  ".$SP1?></div>
    <div class="card-body">
    <table style="width:100%; border: 1px solid blue;  ">
    <tr>
    <th>TEST ID</th>
    <th>PATIENT NUMBER</th>
    <th>TEST NAME</th>
    <th>TEST RESULT</th>
    <th>TEST REMARK</th>
    </tr>
    
 <?php
    while ($row=mysqli_fetch_array($result2)) {
        
        
         
    ?>
    <tr>
    <td><input type="text" name="id[]" value="<?= $row['TEST_ID']?>" readonly> </td>
    <td><? $pt[]=$row["PATIENT_NUMBER"]?><?= $row["PATIENT_NUMBER"]?></td>
    <td><? $t[]= $row["TEST_NAME"]?><?= $row["TEST_NAME"]?></td>
    <td><? $tr[]=$row["TEST_RESULTS"]?><?=$row["TEST_RESULTS"]?></td>
    <td><input type="text" name="remark[]" id="" class="form-control" value="<?=$row["TEST_REMARK"]?>"></td>
    </tr>   
    <?php
    }
?>

</table>
<input type="submit" value="REMARK THE TESTS" class="btn btn-primary btn-block">
</form>
 </div>
</div>
<?php
}
 