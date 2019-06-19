<div class="container">
    <div class="jumbotron">
        <form action="index.php?page=save_signs" method="post">
            
            <div class="col-md-6">
                <div class="form-group">
                <label for="">PATIENT NUMBER</label>
                    <?php
                    
                    $SP2=$_POST["ptno"];
                    $sql_pat="SELECT PATIENT_NUMBER FROM patients WHERE PATIENT_NUMBER=$SP2";
                    $result_pat=mysqli_query($connect,$sql_pat);
                    if($result_pat){
                        while($row=mysqli_fetch_assoc($result_pat)){
                            $p=$row["PATIENT_NUMBER"];
                        }
                        ?>
                         <input type="number"   value="<?=$p?>"  name="ptno" class="form-control" readonly>
                        <?php
                    }
                    ?>
                </select>
                </div>
                </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="">SIGNS AND SYMPTOMS</label>
                <textarea name="symptoms" class="form-control" cols="30" rows="4"></textarea>
                </div>
            </div>
            <!-- </div> -->
            <div class="col-md-6">
                <div class="form-group">
                <input type="submit" value="SAVE" class="btn btn-success form-control">
                </div>
            </div>
           
        </form>
    </div>
</div>