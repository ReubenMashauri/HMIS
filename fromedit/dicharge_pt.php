<?php
$sql12="SELECT * FROM `register`,`patients` WHERE patients.DISCHARGE_TIME is null and patients.REG_ID=register.REG_ID ";
$dis=mysqli_query($connect,$sql12);
if ($dis) {
    ?>
    <div class="card">
    <div class="card-header">DICHARGE THE PATIENTS</div>
    <div class="card-body">
    <table style="width:100%;   ">
    <tr>
    <th>FIRST NAME</th>
    <th>MIDDLE NAME</th>
    <th>LAST NAME</th>
    <th>DATE INCHARGED</th>
    <th>DISCHARGE</th>
    </tr>
    <?php
    while ($row=mysqli_fetch_assoc($dis)) {
        ?>
        <tr>
        <td><input type="text" name="" id=""value="<?=$row["FNAME"]?>"class="form-control" readonly></td>
        <td><input type="text" name="" id=""value="<?=$row["MNAME"]?>"class="form-control" readonly></td>
        <td><input type="text" name="" id=""value="<?=$row["LNAME"]?>" class="form-control"readonly></td>
        <td><input type="text" name="" id=""value="<?=$row["DATE_TIME"]?>"class="form-control" readonly></td>
        <td><a href="index.php?page=discharge&id=<?=$row["PATIENT_NUMBER"]?>" class="btn btn-success">Discharge</a></td>
        </tr>
        <?php
    }
    ?>
    </table>
    </div>
    </div>
    <?php
    
}