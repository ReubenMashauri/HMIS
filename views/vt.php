<div class="col-md-4">
<div class="form-group">
                <label for="">PATIENT NUMBER</label>
                <?php
                    $ptno=$_POST["ptno"];
                    $sql_ptno="SELECT * FROM patients where PATIENT_NUMBER=$ptno";
                    $sql_pt=mysqli_query($connect,$sql_ptno);
                    if($sql_pt){
                        while($row=mysqli_fetch_assoc($sql_pt)){
                            $ptno=$row["PATIENT_NUMBER"];
                        }
                        // $ptno=$row["PATIENT_NUMBER"];
                        // $x=1;
                    }
                ?>
            <input type="number" name="patient_number"value="<?=$ptno?>" class="form-control" readonly>
 </div>
</div>
<?php
$sql_t="SELECT * FROM test WHERE PATIENT_NUMBER=$ptno";
$ans=mysqli_query($connect,$sql_t);
if($ans){
    ?>
    <table style="width:100%">
        <tr>
            <th>TEST</th>
            <th>MANAGE</th>
        </tr>
        <?php
        while($row=mysqli_fetch_assoc($ans)){
            ?>
            <tr style="border:solid black;">
                <td><?=$row["TEST_NAME"]?></td>
                <td>
                <!-- <a href="index.php?page=vtedit&id=<?=$row["TEST_ID"]?>">edit</a> -->
                <a href="index.php?page=vtdelete&id=<?=$row["TEST_ID"]?>">delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td></td>
            <td><a href="index.php?page=dt"><b>Add test</b></a>
            </td>
        </tr>
    </table>
    <?php
}