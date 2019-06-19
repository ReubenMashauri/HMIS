<div class="container">
    <div class="jumbotron">
    <div class="row">
    <a href="index.php?page=signout" class="btn btn-primary btn-sm" title="you are about to sign out ">sign out</a>
    </div>
        <form action="index.php?page=lab_tec_save" method="post">
            <div class="row">
                <div class="col-md-4">
                <div class="form-group">
                <label for="">PATIENT NUMBER</label>
                <select name="patient_number" class="form-control">
                    <?php
                    $sql_pat="SELECT PATIENT_NUMBER,FNAME,MNAME,LNAME FROM patients,register WHERE patients.REG_ID=register.REG_ID";
                    $result_pat=mysqli_query($connect,$sql_pat);
                    if($result_pat){
                        while($row=mysqli_fetch_assoc($result_pat)){
                            ?>
                            <option value="<?=$row["PATIENT_NUMBER"]?>"><?=$row["FNAME"]."  ".$row["LNAME"]?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label for="">TEST ID</label>
                    <select name="test_id" class="form-control">
                    <?php
                        $p_t=$_SESSION["reg1"];
                        $sql_p="SELECT TEST_ID FROM patient_test WHERE PATIENT_NUMBER=$p_t";
                        $jib=mysqli_query($connect,$sql_p);
                        if ($jib) {
                            while($row=mysqli_fetch_assoc($jib)){
                                ?>
                                <option value="<?=$row['TEST_ID']?>" class=""><?=$row['TEST_ID']?></option>
                            <?php 
                            }
                        }

                            ?>
                    </select>
                    </div>
                </div>
                <div class="form-group">
                        <label for="">TEST RESULTS</label>
                        <input type="text" name="test_result" class="form-control">
                </div>
            </div>
            <div class="form-group">
                    <input type="submit" value="SAVE" class="btn btn-primary">
                </div>
        </form>
    </div>
</div>