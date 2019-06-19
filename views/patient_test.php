<div class="container">
<div class="jumbotron">
    <form action="index.php?page=pat_test" method="post">
    <div class="form-group">
                <label for="">PATIENT NUMBER</label>
                <!-- <?php
                    $sql_ptno="SELECT * FROM patients";
                    $sql_pt=mysqli_query($connect,$sql_ptno);
                    if($sql_pt){
                        while($row=mysqli_fetch_assoc($sql_pt)){
                            $ptno=$row["PATIENT_NUMBER"];
                        }
                        // $ptno=$row["PATIENT_NUMBER"];
                        $x=1;
                    }
                ?> -->
                <input type="number" name="patient_number"value="" class="form-control" >
            </div>
        <div class="form-group">
        <label for="">DIAGNOSTIC TESTS</label><br>
        <?php
        $sql_test="SELECT * FROM tests_presents";
        $result_test=mysqli_query($connect,$sql_test);
        $cost="";
        if($result_test){
            while($row=mysqli_fetch_assoc($result_test)){
                ?>
                <input type="checkbox" name="test[]"   value="<?=$row["T_ID"]?>">&nbsp &nbsp&nbsp<?=$row["TEST_NAME"]?><br>
                <?php
                // echo $cost;
            }
            // echo $cost; 
        }
        ?>
        </div>
        <input type="submit" value="ADD TEST" class=" btn btn-primary">
    </form>
</div>
</div>