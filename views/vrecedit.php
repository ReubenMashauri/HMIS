<div class="container">
    <div class="jumbotron">
        <form action="index.php?page=vrecupdate" method="post">
            <!-- <div class="row"> -->
            <div class="col-md-5">
                <div class="form-group">
                <label for="">PATIENT NUMBER</label>
                         <input type="number"   value="<?= $_SESSION['recid']?>" name="ptno" class="form-control" readonly>
                </select>
                </div>
                </div>
        <div class="col-md-6">
            <div class="form-group">
           <label for="">TEST  AND ITS RESULTS</label>
           <select name="test_id" class="form-control">
           <?php
           $REG=$_SESSION['recid'];
            $sql_recomend="SELECT * FROM patient_test WHERE PATIENT_NUMBER=$REG AND TEST_ID='".$_SESSION['test']."'";
            $result_recomend=mysqli_query($connect,$sql_recomend);
            if($result_recomend){
                while($t=mysqli_fetch_assoc($result_recomend)){
                    ?>
                    <option value="<?=$t["TEST_ID"]?>"> <?=$t["TEST_ID"].PHP_EOL. " -> ".$t["TEST_RESULTS"]?></option>
                    <?php
                }
            }
            ?>
           </select>
           </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="">DOCTOR RECOMENDATION</label>
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
</div>