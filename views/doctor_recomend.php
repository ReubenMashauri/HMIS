           <?php
           $SP=$_POST["ptno"];
           $_SESSION["p"]=$_POST["ptno"];
           $tw="";
            $sql_recomend="SELECT * FROM test WHERE PATIENT_NUMBER='".$_POST["ptno"]."' AND TEST_REMARK IS NOT NULL";
            $result_recomend=mysqli_query($connect,$sql_recomend);
            $cou=mysqli_num_rows($result_recomend);
            if($result_recomend){
                ?>
                <form action="index.php?page=save_reco" method="post" role="form" name="f">
                <div class="card">
                <div class="card-header"><?= " FILL THE PRESCRIPTION FOR THE PATIENT NUMBER :  ".$_POST["ptno"]?></div>
                <div class="card-body">
                <table style="width:100%; border: 1px solid blue;  ">
                <tr>
                <th>TEST NAME</th>
                <th>TEST RESULT</th>
                <th>TEST REMARK</th>
                <th>DOCTOR PRESCRIPTION</th>
                </tr>
                <?php
                while ($tw=mysqli_fetch_assoc($result_recomend)) {
                    ?>
                    <tr>
                    <td><input type="text" name="tname[]" id="" value="<?php echo $tw["TEST_NAME"]?>" class="form-control" readonly></td>
                    <td><input type="text" name="tresults[]" id="" value="<?php echo $tw["TEST_RESULTS"]?>" class="form-control"readonly></td>
                    <td><input type="text" name="tremark[]" id="" value="<?php echo $tw["TEST_REMARK"]?>" class="form-control"readonly></td>
                    <?php
                }
                ?>
                <td>
                
                <label for="dis">DISEASE</label>
                <input type="text" name="diseases" id="dis" class="form-control">
                
                
                <label for="">DOCTOR PRESCRIPTION</label>
                <!-- <textarea name="presc" id="" cols="10" rows="5" class="form-control">
                 -->
                 <input type="text" name="presc" id="dis" class="form-control">
                </td>
                </tr> 
                </table> 
                        <input type="submit" value="SAVE" class="btn btn-success form-control">
                    </form> 
            </div>
            </div> 
            <?php
            }     
        