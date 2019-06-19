<div class="container">
<ul class="list-unstyled list-inline-block " style="float:right">
<li class="pull-right list-inline-items"><a href="index.php?page=signout" class="btn btn-primary btn-sm" title="you are about to sign out ">sign out</a></li>
    <li class="pull-right list-inline-items"><a title="print your results" alt="print screen" onclick="window.print();" target="_blank" style="coursor:pointer;" class="btn btn-success btn-sm">print</a></li>
    </ul>
    <div class="jumbotron">
    
    
    <?php
    include "includes/connection.php";
    $REG_ID="";
    $REG_ID=$_SESSION["reg_id"];
    $sql_reg="SELECT TEST_ID,TEST_RESULTS,DOCTOR_RECOMENDATION FROM patient_test,patients,register WHERE (patient_test.PATIENT_NUMBER=patients.PATIENT_NUMBER AND patients.REG_ID=register.REG_ID AND register.REG_ID=$REG_ID) AND DOCTOR_RECOMENDATION IS NOT NULL";
    $result = mysqli_query($connect, $sql_reg);
    if ($result) {
        ?>
        <table style="width:100%">
        <tr>
            <th>TEST ID</th>
            <th>TEST RESULTS</th>
            <th>DOCTOR RECOMENDATION</th>
        </tr>
        <?php
        while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr style="border:solid black">
                    <td><?=$row['TEST_ID']?></td>
                    <td><?=$row['TEST_RESULTS']?></td>
                    <td><?=$row['DOCTOR_RECOMENDATION']?></td>
                </tr>
                <!-- <?php echo "<p> ".$row['TEST_ID']." " . $row['TEST_RESULTS']."".$row['DOCTOR_RECOMENDATION']."</p>";?> -->
                <?php
            }
            ?>
            </table>
            <?php
    }else {
        echo "0 results";
    }
    ?>
    </div>
</div>