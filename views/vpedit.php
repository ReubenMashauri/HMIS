<div class="container">
    <div class="jumbotron">
        <form action="index.php?page=vpupdate" method="post">
            <div class="form-group">
                <label for="">PATIENT NUMBER</label>
                <!-- <?php
                    $sql_ptno="SELECT * FROM patients";
                    $sql_pt=mysqli_query($connect,$sql_ptno);
                    if($sql_pt){
                        while($row=mysqli_fetch_assoc($sql_pt)){
                            $ptno=$row["PATIENT_NUMBER"];
                        }
                        $x=1;
                    }
                ?> -->
                <input type="number" name="patient_number"value="<?=$_SESSION["id"]?>" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">PATIENT NAME</label>
                <select name="reg_id" class="form-control" placeholder="...Select the Patient Name...">
                <option>...Select the Patient Name ...</option>
                <?php
                $sql_select="SELECT * FROM register";
                $result=mysqli_query($connect,$sql_select);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        ?>
                         <option value="<?= $row["REG_ID"]?>" ><?= $row["FNAME"]."          ".$row["LNAME"]?></option>
                         <?php
                    }
                }
                ?>
                </select>
            </div>
            <div class="form-group">
            <input type="submit" value="ADD PATIENT" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>