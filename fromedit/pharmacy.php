<div class="container">
    <div class="jumbotron">
        <form action="index.php?page=save_drug" method="post">
            <div class="form-group">
                <label for="">PATIENT NUMBER</label>
                <?php
                    $sql_ptno="SELECT PATIENT_NUMBER FROM patients WHERE PATIENT_NUMBER='".$_SESSION["ty"]."' ";
                    $sql_pt=mysqli_query($connect,$sql_ptno);
                    if($sql_pt){
                        while($row=mysqli_fetch_assoc($sql_pt)){
                            $ptno=$row["PATIENT_NUMBER"];
                        }
                        $x=1;
                    }
                ?>
                <input type="number" name="patient_number"value="<?=$ptno?>" class="form-control" readonly>
            </div>
            <div class="form-group">
            <label for="">DOCTOR PRESCRIPTION</label>
            <?php
            $p="SELECT PRESCRIPTION FROM PATIENTS WHERE PATIENT_NUMBER='".$_SESSION["ty"]."'";
            $pr=mysqli_query($connect,$p);
            if ($pr) {
                while ($r=mysqli_fetch_assoc($pr)) {
                    ?>
                    <input type="text" name="pre" id="" value="<?=$r["PRESCRIPTION"]?>" class="form-control" readonly>
                    <?php
                }
            }
            ?>
            </div>
            <div class="form-group">
                <label for="">DRUGS FOR THE PATIENTS</label><br>
                
                <?php
                $sql_select="SELECT * FROM DRUGS";
                $result=mysqli_query($connect,$sql_select);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        ?>
                         
                         <input type="checkbox" name="drug[]"   value="<?=$row["DRUG_ID"]?>">&nbsp &nbsp&nbsp<?=$row["DRUD_NAME"]?><br>
                         <?php
                    }
                }
                ?>
                
            </div>
            <div class="form-group">
            <input type="submit" value="GIVE DRUGS TO PATIENTS" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>