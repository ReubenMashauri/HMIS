<?php
include "includes/connection.php";
$sql_vp="SELECT PATIENT_NUMBER,FNAME,MNAME,LNAME FROM patients,register WHERE patients.REG_ID=register.REG_ID ORDER BY PATIENT_NUMBER DESC ";
$result=mysqli_query($connect,$sql_vp);
if($result){
    ?>
    <table style="width:100%;  ">
        <tr >
            <td>PATIENT NUMBER</td>
            <td>FIRST NAME</td>
            <td>MIDDLE NAME</td>
            <td>LAST NAME</td>
            <td>MANAGE</td>
        </tr>
    <?php
    while($row=mysqli_fetch_assoc($result)){
        ?>
        <tr style="border:solid black;">
            <td><?=$row["PATIENT_NUMBER"]?></td>
            <td><?=$row["FNAME"]?></td>
            <td><?=$row["MNAME"]?></td>
            <td><?=$row["LNAME"]?></td>
            <td>
            <a href="index.php?page=vpedit&id=<?=$row["PATIENT_NUMBER"]?>">edit</a>
            <a href="index.php?page=vpdelete&id=<?=$row["PATIENT_NUMBER"]?>">delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
    </table>
    <?php
}