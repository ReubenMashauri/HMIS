<div class="container">
<?php  $y=$_POST["ptno"]; $_SESSION["y"]=$y?>
        <!-- <form action="index.php?page=lab_tec_save" method="post" name="lab_tec_save" role="form">
            <div class="form-group">
                <label for="">PATIENT NUMBER</label>
                <input type="number" name="patient_number" class="form-control" value="<?=$y?>" readonly>
            </div>
        <div class="col-md-6">
            <div class="form-group">
           <label for="">TEST </label>
           <select name="test_id" class="form-control"> -->
           <?php
           $y=$_POST["ptno"];
            $_SESSION["y"]=$y;
            $sql_recomend="SELECT * FROM test WHERE PATIENT_NUMBER=$y ";
            $sq="SELECT BLOOD_GROUP FROM PATIENTS WHERE PATIENT_NUMBER=$y";
            $b=mysqli_query($connect,$sq);
            $result_recomend=mysqli_query($connect,$sql_recomend);
            $co=mysqli_num_rows($result_recomend);
            $_SESSION["count1"]=$co;
            if($result_recomend){
                ?> 
                <form action="index.php?page=lab_tec_save" method="post" role="form" name="f">
                <div class="card">
                <div class="card-header"><?= " FILL THE PRESCRIPTION FOR THE PATIENT NUMBER :  ".$_POST["ptno"]?></div>
                <div class="card-body">
                <table style="width:100%;   ">
                <tr>
                <th>TEST ID</th>
                <th>TEST NAME</th>
                <th>TEST RESULTS</th>
                </tr>
                <?php
                while($t=mysqli_fetch_assoc($result_recomend)){
                    ?>
                    <tr style=" border: 1px solid BLACK;  ">
                    <td><input type="text" name="testid[]" id=""value="<?=$t["TEST_ID"]?>" readonly></td>
                    <td><input type="text" name="testname[]" id=""value="<?=$t["TEST_NAME"]?>"readonly></td>
                    <td><input type="text" name="testresults[]" id=""value="<?=$t["TEST_RESULTS"]?>"></td>
                    </tr>

               
                    <?php
                }
                ?>
                <tr>
                <div class="form-group">
                <label for="">BLOOD GROUP</label>
                <?php
                if ($b) {
                    while ($bg=mysqli_fetch_assoc($b)) {
                        ?>
                        <input type="text" name="bg" id="bg" class="form-control" value="<?=$bg["BLOOD_GROUP"] ?>">
                        <?php
                    }   
                }
                ?>
                </div>
                </tr>
                </table> 
                <input type="submit" value="SAVE" class="btn btn-success form-control">
            </form> 
    </div>
    </div> 
    <?php
            }
            ?>
          

                </div>