<div class="container">
    <div class="jumbotron">
        <?php
          $y=$_SESSION["y"];
        $sql_pay="SELECT  * FROM TEST where PATIENT_NUMBER=$y ORDER BY TEST_ID DESC";
        $ans=mysqli_query($connect,$sql_pay);
        if($ans){
            ?>
            <table style="width:100% ;border:solid black;">
                <tr>
                    <th>PATIENT NUMBER</th>
                    <th>TEST NAME</th>
                    <th>TEST RESULTS</th>
                    <th>MANAGE</th>
                </tr>
                <?php
                while($row=mysqli_fetch_assoc($ans)){
                    ?>
                    <tr style="border:solid black;">
                        <td><input type="text" name="" id="" value="<?=$row["PATIENT_NUMBER"]?>"readonly></td>
                        <td><input type="text" name="" id="" value="<?=$row["TEST_NAME"]?>"readonly></td>
                        <td><input type="text" name="" id="" value="<?=$row["TEST_RESULTS"]?>"readonly></td>
                        <td>
                        <a href="index.php?page=vlabedit&id=<?=$row["TEST_ID"]?>&pt=<?=$row["PATIENT_NUMBER"]?>">edit</a>
                        <a href="index.php?page=vlabdelete&id=<?=$row["TEST_ID"]?>&pt=<?=$row["PATIENT_NUMBER"]?>">delete</a>
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