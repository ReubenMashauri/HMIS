<div class="container">
    <div class="jumbotron">
        <?php
        $sql_pay="SELECT  * FROM payments ORDER BY PAYMENT_ID DESC";
        $ans=mysqli_query($connect,$sql_pay);
        if($ans){
            ?>
            <table style="width:100%">
                <tr>
                    <th>PAYMENT ID</th>
                    <th>PAYMENT MODE</th>
                    <th>PATIENT NUMBER</th>
                    <th>TOTAL COST</th>
                    <th>MANAGE</th>
                </tr>
                <?php
                while($row=mysqli_fetch_assoc($ans)){
                    ?>
                    <tr style="border:solid black;">
                        <td><?=$row["PAYMENT_ID"]?></td>
                        <td><?=$row["PAYMENT_MODE"]?></td>
                        <td><?=$row["PATIENT_NUMBER"]?></td>
                        <td><?=$row["TOTAL_COST"]?></td>
                        <td>
                        <a href="index.php?page=vpaydelete&id=<?=$row["PAYMENT_ID"]?>">delete</a>
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