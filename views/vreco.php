<div class="container">
    <div class="jumbotron">
    <?php
    $x=$_SESSION["empno"];
    $vreco="SELECT * FROM patients WHERE EMPNO=$x AND PRESCRIPTION IS NOT NULL ORDER BY PATIENT_NUMBER DESC";
    $n=mysqli_query($connect,$vreco);
    if($n){
        ?>
        <table style="width:100%; border: 1px solid blue;  ">
            <tr>
                <td>PATIENT NUMBER</td>
                <td>BLOOD GROUP </td>
                <td>DISEASE</td>
                <td>PRESCRIPTION</td>
                <td>MANAGE</td>
            </tr>
            <?php
            while($row=mysqli_fetch_assoc($n)){
                ?>
                <tr style="border:solid black;">
                    <td><input type="text" name="" id="" value="<?=$row["PATIENT_NUMBER"]?>"></td>
                    <td><input type="text" name="" id="" value="<?=$row["BLOOD_GROUP"]?>"></td>
                    <td><input type="text" name="" id="" value="<?=$row["DISEASE"]?>"></td>
                    <td><input type="text" name="" id="" value="<?=$row["PRESCRIPTION"]?>"></td>
                    <td>
                    <a href="index.php?page=vrecedit&id=<?=$row["PATIENT_NUMBER"]?>&test=<?=$row["TEST_ID"]?>">edit</a>
                    <a href="index.php?page=vrecdelete&id=<?=$row["PATIENT_NUMBER"]?>&test=<?=$row["TEST_ID"]?>">delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    <?php
    }
    ?>
    </div>
</div>