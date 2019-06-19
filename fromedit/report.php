<div class="card">
<div class="card-header">TO DAY REPORTS</div>
<div class="card-body">
<?php 
$total="INSURANCE";


$sql13="SELECT * FROM PATIENTS";
$sql14="SELECT  DISTINCT PATIENT_NUMBER FROM TEST where TEST_RESULTS IS NOT NULL";
$sql15="SELECT * FROM PAYMENTS WHERE PAYMENT_MODE='".$total."'";
$resul=mysqli_query($connect,$sql13);
$resul1=mysqli_query($connect,$sql14);
$resul2=mysqli_query($connect,$sql15);
$count=mysqli_num_rows($resul);
$count1=mysqli_num_rows($resul1);
$count2=mysqli_num_rows($resul2);
if ($resul && $resul1 && $resul2) {
    ?>
    <table>
    <tr>
    <th>TOTAL NUMBER OF PATIENTS VISITED THE HOSPTITAL</th>
    <TH>NUMBER OF PATIENTS WITH INSUARANCE</TH>
    <th>NUMBER OF PATIENTS UNDERGOES LAB DIAGNOSIS</th>
    <th>NUMBER OF PATIENT PRECRIBED WITHOUT LAB</th>
    <th>COMMON DISEASES</th>
    </tr>
    <TR>
    <TD><?=$count?></TD>
    <TD><?=$count2?></TD>
    <TD><?=$count1?></TD>
    <TD><?=$count-$count1?></TD>
    <td>
    <?php
    while ($r=mysqli_fetch_assoc($resul)) {
    ?>
    <?=$r["DISEASE"]."  "?>
    <?php
    }
    ?>
    </td>
    </TR>
    </table>
    <?php
    }


?>
</div>
</div>