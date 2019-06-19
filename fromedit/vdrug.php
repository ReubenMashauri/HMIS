<div class="container">
<div class="jumbotron">
            
                <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                <?php
                $sql11="SELECT * FROM `drugs`";
                $v=mysqli_query($connect,$sql11);
                if ($v) {
                    ?>
                        <table style="width:100% ;border:solid black;">
                            <tr>
                                <th>DRUG ID</th>
                                <th>DRUD  NAME</th>
                                <th>COST </th>
                                <th>MANAGE</th>
                            </tr>
                    <?php
                    while ($row=mysqli_fetch_assoc($v)) {
                        ?>
                        <tr>
                        <td><input type="text" name="" id="" value="<?=$row["DRUG_ID"];?>" class="form-control"></td>
                        <td><input type="text" name="" id="" value="<?=$row["DRUD_NAME"];?>" class="form-control"></td>
                        <td><input type="text" name="" id="" value="<?=$row["COST"];?>" class="form-control"></td>
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
</div>
</div>