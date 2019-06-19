<div class="container">
        <?php 
              $testid=$_SESSION['testid'];
                $patno=$_SESSION['patient'];
        ?>
        <form action="index.php?page=vlabupdate" method="post" name="lab_tec_save" role="form">
            <div class="form-group">
                <label for="">PATIENT NUMBER</label>
                <input type="number" name="patient_number" class="form-control" value="<?=$patno?>" readonly>
            </div>
        <div class="col-md-6">
            <div class="form-group">
           <label for="">TEST </label>
           <select name="test_id" class="form-control">
           <?php
            $sql_recomend="SELECT * FROM patient_test WHERE PATIENT_NUMBER=$patno AND TEST_ID='".$testid."'";
            $result_recomend=mysqli_query($connect,$sql_recomend);
            if($result_recomend){
                while($t=mysqli_fetch_assoc($result_recomend)){
                    ?>
                    <option value="<?=$t["TEST_ID"]?>"> <?=$t["TEST_ID"]?></option>
                    <?php
                }
            }
            ?>
           </select>
           </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="">TEST RESULTS</label>
                <textarea name="reco" class="form-control" cols="30" rows="4"></textarea>
                </div>
            </div>
            <!-- </div> -->
            <div class="col-md-2">
                <div class="form-group">
                <input type="submit" value="SAVE" class="btn btn-success form-control">
                </div>
            </div>
                </form>
                </div>