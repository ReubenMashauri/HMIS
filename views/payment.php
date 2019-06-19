<div class="container">
    <div class="jumbotron">
    <?php
    ?>
        <form action="index.php?page=add_payment" method="post">
        <div class="form-group">
                <label for="">PAYMENT NUMBER</label>
                <?php
                    $sql_ptno="SELECT * FROM payments";
                    $sql_pt=mysqli_query($connect,$sql_ptno);
                    if($sql_pt){
                        while($row=mysqli_fetch_assoc($sql_pt)){
                            $ptno=$row["PAYMENT_ID"];
                        }
                        // $ptno=$row["PATIENT_NUMBER"];
                        $x=1;
                    }
                ?>
                <input type="number" name="pay_number"value="<?=($ptno+$x)?>" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="">PAYMENT MODE</label>
                <select name="pay_mode" class="form-control">
                    <option>...Select the Payment Mode ...</option>
                    <option value="INSURANCE">INSURANCE</option>
                    <option value="CASH">CASH</option>
                    <option value="BANK">BANK</option>
                    <option value="M-PESA">M-PESA</option>
                    <option value="TIGO-PESA">TIGO-PESA</option>
                    <option value="AIRTEL-MONEY">AIRTEL-MONEY</option>
                    <option value="HALLOPESA">HALLOPESA</option>
                </select>
            </div><?php  $y=$_POST["ptno"];?>
            <div class="form-group">
                <label for="">PATIENT NUMBER</label>
                <input type="number" name="patient_number" class="form-control" value="<?=$y?>" readonly>
            </div>
            <div class="form-group">
                <label for="">TOTAL COST</label>
                <!-- <input type="number" name="cost" class="form-control"> -->
                    <?php 
                    $y=$_POST["ptno"];
                    // $pt=$_SESSION["pat"];
                    $sql_pat_cost="SELECT COST FROM patient_test,tests WHERE PATIENT_NUMBER=$y AND patient_test.TEST_ID=tests.TEST_ID";
                    $result_pat_cost=mysqli_query($connect,$sql_pat_cost);
                    $cost="";
                    if($result_pat_cost){
                        while($select=mysqli_fetch_assoc($result_pat_cost)){
                            // echo $select["COST"].PHP_EOL;
                            $cost=$cost+$select["COST"];

                        }
                        // echo $cost;
                    }
                    ?>
                    <input type="number" name="cost" class="form-control" value="<?=$cost?>" readonly>
            </div>
            <div class="form-group">
                <input type="submit" name="add"  value="ADD PAYMENT" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>