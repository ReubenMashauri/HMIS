<?php
// session_start();
if(!empty($_GET["page"])){
    $page=$_GET["page"];
    if($page=="home"){
        $page="views/home.php";
    }
    elseif($page=="about"){
        $page="views/about.php";
    }
    elseif($page=="contacts"){
        $page="views/contacts.php";
    }
    elseif($page=="add_pt"){
        if(isset($_SESSION["data"])){
            if($_SESSION["empno"]==123247){$page="views/signup.php" ;}else{header ("location: index.php?page=home");}
        }
        else{header ("location: index.php?page=home");} 
    }
    elseif($page=="signin"){
         if(isset($_SESSION["data1"])){
             $page = "views/dashboard.php";
         }else{
             header ("location: index.php?page=home");
         }
    }
    elseif($page=="signout"){
        $page="views/signout.php";
    }
    elseif($page=="results"){
        if(isset($_SESSION["data1"])){
            $page="views/results.php";
        }else{
            header ("location: index.php?page=home");
        }
    }
    elseif($page=="patient_test"){
        if(isset($_SESSION["data"])){
            $page="views/patient_test.php";
        }
        else{
            header ("location: index.php?page=home");
        }
    }
    elseif($page=="employees"){
       if(isset($_SESSION["data"])){
        if($_SESSION["empno"]==123243){
            $page="views/doc_dash.php";
        }
        if($_SESSION["empno"]==123247){
            $page="views/rec_dash.php";
        }
        if($_SESSION["empno"]==123246){
            $page="views/a_dash.php";
        }
        if($_SESSION["empno"]==123245){
            $page="views/b_dash.php";
        }
        if($_SESSION["empno"]==123244){
            $page="views/lab_dash.php";
        }if($_SESSION["empno"]==123248){
            $page="fromedit/p_dash.php";
        }
       }else{
        header ("location: index.php?page=home");
       }
    }
    elseif($page=="admin"){
        if(isset($_SESSION["data"])){
            if($_SESSION['empno']==123246){$page="views/a_dash.php";}else{header ("location: index.php?page=home");}
            
        }else{
            header ("location: index.php?page=home");
        }
    }
    elseif($page=="supadd"){
        if(isset($_SESSION["data"])){
            if($_SESSION['empno']==123246){$page="views/superadd.php";}else{header ("location: index.php?page=home");}
            
        }else{
            header ("location: index.php?page=home");
        }
    }
    elseif($page=="form"){
        if(isset($_SESSION["data"])){
            if($_SESSION['empno']==123245){$page="views/form.php";}else{header ("location: index.php?page=home");}
            
        }else{
            header ("location: index.php?page=home");
        }
    }
    elseif ($page=="patno") {
        if (isset($_SESSION["data"])) {
            if ($_SESSION["empno"]==123248) { 
                $page="fromedit/ptform.php";
            }else {
                header ("location: index.php?page=home");
            }
        }else {
            header ("location: index.php?page=home");
        }
    }
    elseif ($page=="ph") {
        $_SESSION["ty"]=$_POST["ptno"];
        if(isset($_SESSION["data"])){
            $page="fromedit/pharmacy.php";
        }
    }
    elseif ($page=="save_drug") {
        $ty=$_SESSION["ty"];
        if(!empty($_POST['drug'])){
            foreach($_POST['drug'] as $drugid){
                $sql8="INSERT INTO `pharmacy`(`P_ID`, `PATIENT_NUMBER`, `DRUG_ID`) VALUES ('','".$ty."','".$drugid."')";
                $sr=mysqli_query($connect,$sql8);
            }
            $date=time();
            $d=date("Y-m-d h:i:sa",$date);
            $sql11="UPDATE `patients` SET `DISCHARGE_TIME`='".$d."' WHERE `PATIENT_NUMBER`=$ty ";
            $up=mysqli_query($connect,$sql11);
        }
        if ($sr && $up) {
            print "<script>alert('Drug Saved Successfull');location.href='index.php?page=vdrug'</script>";
        }else{
            print "<script>alert('Drug not Saved Successfull');location.href='index.php?page=ptno'</script>";
        }
    }
    elseif ($page=="adddrug") {
        if (isset($_SESSION["data"])) {
            if ($_SESSION["empno"]==123248) {
                $page="fromedit/adddrug.php";
            }
        }
    }
    elseif ($page=="savedrug") {
        $drugname=$_POST["drugname"];
        $cost=$_POST["cost"];
        $sql5="INSERT INTO `drugs`( `DRUD_NAME`, `COST`) VALUES ('".$drugname."','".$cost."')";
        $savedrug=mysqli_query($connect,$sql5);
        if ($savedrug) {
            print "<script>alert('Drud Added Successfull');location.href='index.php?page=adddrug'</script>";
        }else{
            print "<script>alert('Drud not Added Successfull');location.href='index.php?page=adddrug'</script>";
        }
    }
    elseif ($page=="vdrug") {
        if (isset($_SESSION["data"])) {
            $page="fromedit/vdrug.php";
        }
    }
    elseif($page=="add_patient"){
        
        $patient_id=$_POST["patient_number"];
        $reg_id=$_POST["reg_id"];

        $sql_add_patient="INSERT INTO patients(PATIENT_NUMBER,REG_ID) VALUES ('$patient_id','$reg_id')";

        $result_pat=mysqli_query($connect,$sql_add_patient);
        if($result_pat){
            print "<script>alert('Patients added successfull');location.href='index.php?page=addp'</script>";
        }else{
            print "<script>alert('Patients not added successfull');location.href='index.php?page=patient_add'</script>";
        }
    }
    elseif($page=="pat_test"){
            $patient_id=$_POST["patient_number"];
            if(!empty($_POST['test'])){
                foreach($_POST['test'] as $test){
                    $sql_pat_test="INSERT INTO test (PATIENT_NUMBER,TEST_NAME) VALUES('$patient_id','$test')";
                    $result_pat_test=mysqli_query($connect,$sql_pat_test);
                }
            }
            if($result_pat_test){
                print "<script>alert('Successfull added');location.href='index.php?page=dt'</script>";
            }else{
                print "<script>alert('Unsuccessfull added');location.href='index.php?page=dt'</script>";
            }
    }
    elseif($page=="add_payment"){
        
        $pay_id=$_POST["pay_number"];
        $pay_mode=$_POST["pay_mode"];
        $patient_id=$_POST["patient_number"];
        $pay_cost=$_POST["cost"];

        $sql1="UPDATE  patient_test SET PAYMENT_ID=$pay_id WHERE PATIENT_NUMBER=$patient_id"; 
        $sql_pay="INSERT INTO payments (PAYMENT_ID,PAYMENT_MODE,PATIENT_NUMBER,TOTAL_COST) VALUES('$pay_id','$pay_mode','$patient_id','$pay_cost')";
        $result_pay=mysqli_query($connect,$sql_pay);
        $jibu=mysqli_query($connect,$sql1);
        if($result_pay){
            print "<script>alert('Payments successfull');location.href='index.php?page=pat_data'</script>";
        }
        if($jibu){
            print "<script>alert('Payments successfull');location.href='index.php?page=pat_data'</script>";
        }else{
            print "<script>alert('Payments successfull');location.href='index.php?page=pat_data'</script>";
        }
    }
    elseif($page=="sup_add"){
        if(isset($_SESSION["data"])){
            if($_SESSION['empno']==123246){ 
                $emp_number=$_POST["emp_number"];
                $emp_name=$_POST["emp_name"];
                $emp_username=$_POST["emp_username"];
                $emp_password=md5($_POST["password"]);
        
                $sql_sup="INSERT INTO EMP(EMPNO,EMP_NAME,EMP_USERNAME,EMP_PASSWORD) VALUES ('$emp_number','$emp_name','$emp_username','$emp_password')";
                $supperadd=mysqli_query($connect,$sql_sup);
                if($supperadd){
                    // echo "successfull <a href='views/superadd.php'> go</a> ";  
                    print "<script> alert('Add staff success'); location.href='index.php?page=superadd';</script>"; 
                }else{
                    // echo "no data was inserted";
                    print "<script> alert('Add fail '); location.href='index.php?page=superadd';</script>";
                }
            }else{header ("location: index.php?page=home");}
            
        }else{
            header ("location: index.php?page=home");
        }
       
    }
    elseif ($page=="superadd") {
        if (isset($_SESSION["data"])) {

            if ($_SESSION["empno"]==123246) {

            $page= "views/superadd.php";
            }else {
            header ("location: index.php?page=home");
            }
        }else{ 
            header ("location: index.php?page=home");
        }
    }
    elseif($page=="lab_tec_save"){

        $count=$_SESSION["count1"];
        $test_id=$_POST["testid"];
        $test_name=$_POST["testname"];
        $testresults=$_POST["testresults"];
        $bg=$_POST["bg"];
        $y=$_SESSION["y"];
        for($i=0;$i<$count;$i++){
            $sql10="UPDATE test SET TEST_RESULTS='$testresults[$i]' WHERE TEST_ID='$test_id[$i]'";
            $result12=mysqli_query($connect,$sql10);
            }
            $blood1="UPDATE patients SET BLOOD_GROUP='".$bg."' WHERE PATIENT_NUMBER=$y";  
            $blood=mysqli_query($connect,$blood1);
            if($result12 && $blood){
                print "<script>alert('Tests results added successfull');location.href='index.php?page=pat_data'</script>";
            }else{
                print "<script>alert('Tests results not added successfull');location.href='index.php?page=pat_data'</script>";
            }
    }elseif($page=="save_reco"){
      if (isset($_SESSION["data"])) {
          if ($_SESSION["empno"]==123243) {
            $diseases=$_POST["diseases"];
            $presc=$_POST["presc"];
            $p=$_SESSION["p"];
            // $reco=$_POST["reco"];
            // $test_id=$_POST["test_id"];
            // $patient_number=$_POST["ptno"];
    
            $d=$_SESSION["empno"];
            $sql9="UPDATE patients SET DISEASE='".$_POST["diseases"]."',PRESCRIPTION='".$_POST["presc"]."',EMPNO='".$d."' WHERE PATIENT_NUMBER='".$_SESSION["p"]."'";
            $ans=mysqli_query($connect,$sql9);
            if($ans){
                print "<script>alert('Successfull recomended');location.href='index.php?page=rec'</script>";
            }else{
                print "<script>alert('Unsuccessfull recomended');location.href='index.php?page=rec'</script>";
            }
          }else {
            header ("location: index.php?page=home");
          }
      }else {
          header ("location: index.php?page=home");
      }   
    }
    elseif($page=="doctor"){
        if(isset($_SESSION["data"])){
            if($_SESSION['empno']==123243){$page="views/doc_dash.php";}else{header ("location: index.php?page=home");}
            
        }else{
            header ("location: index.php?page=home");
        }
    }elseif($page=="addp"){
        // $page="views/patient_add.php";
        if(isset($_SESSION["data"])){
            if($_SESSION['empno']==123243){$page="views/patient_add.php";}else{header ("location: index.php?page=home");}
            
        }else{
            header ("location: index.php?page=home");
        }
    }
    elseif($page=="lab"){
        // $page="views/lab_dash.php";
        if(isset($_SESSION["data"])){
            if($_SESSION['empno']==123244){$page="views/lab_dash.php";}else{ header ("location: index.php?page=home");}
        }else{
            header ("location: index.php?page=home");
        }
    }
    elseif($page=="bursar"){
        // $page="views/b_dash.php";
        if(isset($_SESSION["data"])){
            if($_SESSION['empno']==123245){$page="views/b_dash.php";}else{header ("location: index.php?page=home");}
            
        }else{
            header ("location: index.php?page=home");
        }
    }
    elseif($page=="vp"){
        // $page="views/vp.php";
        if(isset($_SESSION["data"])){
            if($_SESSION['empno']==123243){$page="views/vp.php";}else{header ("location: index.php?page=home");}
        }else{
            header ("location: index.php?page=home");
        }
    }
    elseif($page=="vpdelete"){
        $id=$_GET["id"];
        $sql_vpdel="DELETE FROM patients WHERE PATIENT_NUMBER=$id";
        $ans=mysqli_query($connect,$sql_vpdel);
        if($ans){
            print "<script>alert('Delete Succsessfully');location.href='index.php?page=vp'</script>";
        }else{
            print "<script>alert('Delete Unsuccsessfully');location.href='index.php?page=vp'</script>";
        }
    }
    elseif($page=="vtdelete"){
        $id=$_GET["id"];
        $sql_vtdel="DELETE  FROM test WHERE TEST_ID=$id";
        $ans=mysqli_query($connect,$sql_vtdel);
        if($ans){
            print "<script>alert('Delete Succsessfully');location.href='index.php?page=vt'</script>";
        }else{
            print "<script>alert('Delete Unsuccsessfully');location.href='index.php?page=vt'</script>";
        }
    }
    elseif($page=="vpaydelete"){
        $id=$_GET["id"];
        $sql_vpaydel="UPDATE  patient_test SET PAYMENT_ID=NULL WHERE PAYMENT_ID=$id";
        $ans1=mysqli_query($connect,$sql_vpaydel);
        if($ans1){
            $sql_vpaydel="DELETE FROM payments WHERE PAYMENT_ID=$id";
            $ans=mysqli_query($connect,$sql_vpaydel);
            if($ans){
            print "<script>alert('Delete Succsessfully');location.href='index.php?page=vpay'</script>";
            }
        }else{
            print "<script>alert('Delete Unsuccsessfully');location.href='index.php?page=vpay'</script>";
        }
    }
    elseif($page=="vlabdelete"){
        $id=$_GET["id"];
        $pt=$_GET["pt"];
        $sql_vtdel="UPDATE  TEST SET TEST_RESULTS=NULL WHERE PATIENT_NUMBER=$pt AND TEST_ID='".$id."'";
        $ans=mysqli_query($connect,$sql_vtdel);
        if($ans){
            print "<script>alert('Delete Succsessfully');location.href='index.php?page=vlab'</script>";
        }else{
            print "<script>alert('Delete Unsuccsessfully');location.href='index.php?page=vlab'</script>";
        }
    }
    elseif($page=="vrecdelete"){
        $test=$_GET["test"];
        $id=$_GET["id"];
        $sql_vrec="UPDATE patient_test SET DOCTOR_RECOMENDATION=NULL, EMPNO=NULL WHERE PATIENT_NUMBER=$id AND TEST_ID='".$test."'";
        $d=mysqli_query($connect,$sql_vrec);
        if($d){
            print "<script>alert('Delete Succsessfully');location.href='index.php?page=vrec'</script>";
        }else{
            print "<script>alert('Delete Succsessfully');location.href='index.php?page=vrec'</script>";
        }
    }
    elseif($page=="dt"){
        // $page="views/patient_test.php";
        if(isset($_SESSION["data"])){
            if($_SESSION['empno']==123243){$page="views/patient_test.php";}else{header ("location: index.php?page=home");}
        }else{
            header ("location: index.php?page=home");
        }
    }
    elseif($page=="vt"){
        // $page="views/vt.php";
        if(isset($_SESSION["data"])){
            if($_SESSION['empno']==123243){  $page="views/form_vt.php";}else{header ("location: index.php?page=home");}
            // $page="views/form_vt.php";
        }else{
            header ("location: index.php?page=home");
        }
    }
    elseif($page=="vt1"){
        // $page="views/vt.php";
        if(isset($_SESSION["data"])){
            if($_SESSION['empno']==123243){  $page="views/vt.php";}else{header ("location: index.php?page=home");}
            // $page="views/vt.php";
        }else{
            header ("location: index.php?page=home");
        }
    }
    elseif($page=="vrec"){
        // $page="views/vreco.php";
        if(isset($_SESSION["data"])){
            if($_SESSION['empno']==123243){   $page="views/vreco.php";}else{header ("location: index.php?page=home");}
            // $page="views/vreco.php";
        }else{
            header ("location: index.php?page=home");
        }
    }
    elseif($page=="rec"){
        // $page="views/form_reco.php";
        if(isset($_SESSION["data"])){
            if($_SESSION['empno']==123243){   $page="views/form_reco.php";}else{header ("location: index.php?page=home");}
            // $page="views/form_reco.php";
        }else{
            header ("location: index.php?page=home");
        }
    }
    elseif($page=="pd"){
        // $page="views/form_pay.php";
        if(isset($_SESSION["data"])){
            $page="views/form_pay.php";
        }else{
            header ("location: index.php?page=home");
        }
    }
    elseif($page=="payment"){
        // $page="views/payment.php";
        if(isset($_SESSION["data"])){
            $page="views/payment.php";
        }else{
            header ("location: index.php?page=home");
        }
    }
    elseif($page=="pat_data"){
        // $page="views/lab.php";
        if(isset($_SESSION["data"])){
            $page="views/lab.php";
        }else{
            header ("location: index.php?page=home");
        }
    }
    elseif($page=="lab_tec"){
        // $page="views/lab_tec.php";
        if(isset($_SESSION["data"])){
            $page="views/lab_tec.php";
        }else{
            header ("location: index.php?page=home");
        }
    }
    elseif($page=="vpay"){
        // $page="views/vpay.php";
        if(isset($_SESSION["data"])){
            $page="views/vpay.php";
        }else{
            header ("location: index.php?page=home");
        }
    }
    elseif($page=="vlab"){
        // $page="views/vlab.php";
        if(isset($_SESSION["data"])){
            $page="views/vlab.php";
        }else{
            header ("location: index.php?page=home");
        }
    }
    elseif($page=="prescription"){
        if(isset($_SESSION["data"])){
            if($_SESSION['empno']==123243){    $page="views/doctor_recomend.php";}else{header ("location: index.php?page=home");}
            // $page="views/doctor_recomend.php";
        }else{
            header ("location: index.php?page=home");
        }
    }
    elseif($page=="vpedit"){
        $_SESSION["id"]=$_GET["id"];
        $page="views/vpedit.php";
    }
    elseif($page=="vpupdate"){
        $patid=$_POST["patient_number"];
        $reg_id=$_POST["reg_id"];
        $vpup="UPDATE patients SET REG_ID=$reg_id WHERE PATIENT_NUMBER=$patid";
        $jib=mysqli_query($connect,$vpup);
        if($jib){
            print "<script>alert('Patient Updated Succsessfully');location.href='index.php?page=vp'</script>";
        }else{
            print "<script>alert('Patient updated Unsuccsessfully');location.href='index.php?page=patient_add'</script>";
        }
    }
    elseif($page=="vrecedit"){
        $_SESSION["recid"]=$_GET["id"];
        $_SESSION["test"]=$_GET["test"];
        $page="views/vrecedit.php";
    }
    elseif($page=="vrecupdate"){
        $patno=$_POST["ptno"];
        $test=$_POST["test_id"];
        $reco=$_POST['reco'];
        $vpup="UPDATE patient_test SET DOCTOR_RECOMENDATION='".$reco."' WHERE TEST_ID='".$test."' AND PATIENT_NUMBER=$patno ";
        $jib=mysqli_query($connect,$vpup);
        if($jib){
            print "<script>alert('Patient Updated Succsessfully');location.href='index.php?page=vrec'</script>";
        }else{
            print "<script>alert('Patient updated Unsuccsessfully');location.href='index.php?page=vrec'</script>";
        } 
    }
    elseif($page=="vlabedit"){
        $_SESSION['testid']=$_GET['id'];
        $_SESSION['patient']=$_GET['pt'];
        $page="views/vlabedit.php";
    }
    elseif($page=="vlabupdate"){
        $pt=$_POST['patient_number'];
        $test_id=$_POST['test_id'];
        $reco=$_POST['reco'];
        $sql6="UPDATE patient_test SET TEST_RESULTS='".$reco."' WHERE PATIENT_NUMBER=$pt AND TEST_ID='".$test_id."'";
        $res=mysqli_query($connect,$sql6);
        if($res){
            print "<script>alert('Test Results Updated Succsessfully');location.href='index.php?page=vlab'</script>";
        }else{
            print "<script>alert('Test Results not Updated Succsessfully');location.href='index.php?page=vlab'</script>";
        }
    }
    elseif ($page=="v_pt") {
        if (isset ($_SESSION["data"])) {
           $page="views/view_pat.php"; 
        }
    }
    elseif ($page=="search_pt") {
        if (isset ($_SESSION["data"])) {
            $page="views/search.php"; 
         }
    }
    elseif ($page=="recedit") {
        $_SESSION["idid"]=$_GET["id"];
        $page="fromedit/rec_edit.php";
    }
    elseif ($page=="rece_edit") {
        $reg_idid=$_SESSION["idid"];
        $fname=$_POST["efname"];
        $mname=$_POST["emname"];
        $lname=$_POST["elname"];
        $gender=$_POST["egender"];
        $dob=$_POST["edob"];
        $mstatus=$_POST["emstatus"];
        $bplace=$_POST["ebplace"];
        $region =$_POST["eregion"];
        $nationality =$_POST["enationality"];
        $ocupation=$_POST["eocupation"];
        $height=$_POST["eheight"];
        $weight=$_POST["eweight"];
        $pnumber=$_POST["epnumber"];
        $membership_number=$_POST["emembership_number"];
        $votenumber =$_POST["evotenumber"];
        $sturegno= $_POST["esturegno"];

        $sql2="UPDATE register SET FNAME='".$fname."',MNAME='".$mname."',LNAME='".$lname."',GENDER='".$gender."',DOB='".$dob."',M_STATUS='".$mstatus."',BIRTH_PLACE='".$bplace."',
        REGION='".$region."',NATIONALITY='".$nationality."',OCUPATION='".$ocupation."',HEIGHT='".$height."',WEIGHT='".$weight."',MOBILE_NUMBER='".$pnumber."',
        MEMBERSHIP_NUMBER='".$membership_number."',VOTE_NUMBER='".$votenumber."',STUREGNO='".$sturegno."' WHERE REG_ID='".$reg_idid."' ";
        $r=mysqli_query($connect,$sql2);
        if($r){
            print "<script>alert('Patient Updated Succsessfully');location.href='index.php?page=search_pt'</script>";
        }else{
            print "<script>alert('Patient not Updated Succsessfully');location.href='index.php?page=search_pt'</script>";
        }
    }
    elseif ($page=="recdelete") {
        $_SESSION["idi"]=$_GET["id"];
        $ql4="DELETE FROM register where REG_ID='".$_SESSION["idi"]."'";
        $re=mysqli_query($connect,$ql4);
        if ($re) {
            print "<script>alert('Patient Deleted Succsessfully');location.href='index.php?page=search_pt'</script>";
        }else{
            print "<script>alert('Patient not Deleted Succsessfully');location.href='index.php?page=search_pt'</script>";
        }
    }
    elseif ($page=="sympt") {
        $page="fromedit/symptoms.php";
    }
    elseif ($page=="save_signs") {
        $patn=$_POST["ptno"];
        $sign=$_POST["symptoms"];
        $sql4="INSERT INTO `signs`(`SIGN_ID`, `PATIENT_NUMBER`, `SIGN_SYMPTOMS`) VALUES ('','".$patn."','".$sign."') ";
        $sy=mysqli_query($connect,$sql4);
        
        if ($sy) {
            print "<script>alert('Patient signs and symptoms added Succsessfully');location.href='index.php?page=mark1'</script>";
        }else{
            print "<script>alert(' Unsuccsessfully addition');location.href='index.php?page=symptoms'</script>";
        }

    }elseif ($page=="dicharge_pt") {
        $page="fromedit/dicharge_pt.php";
    }
    elseif ($page=="discharge") {
        $ptno=$_GET["id"];
        $date=time();
        $d=date("Y-m-d h:i:sa",$date);
        $sql12="UPDATE `patients` SET `DISCHARGE_TIME`='".$d."' WHERE `PATIENT_NUMBER`='".$_GET["id"]."'";
        $up=mysqli_query($connect,$sql12);
        if ($up) {
            print "<script>alert('Patient Discharged Succsessfully');location.href='index.php?page=dicharge_pt'</script>";
        }else{
            print "<script>alert(' Unsuccsessfully Discharge');location.href='index.php?page=dicharge_pt'</script>";
        }
    }
    elseif ($page=="report") {
        $page="fromedit/report.php";
    }
    elseif ($page=="mark1") {
        $page="fromedit/formtest.php";
    }
    elseif ($page=="test1") {
        $count=$_SESSION["count"];
        $remark=$_POST["remark"];
        $id=$_POST["id"];
        for($i=0;$i<$count;$i++){
            $sql7="UPDATE test SET TEST_REMARK='$remark[$i]' WHERE TEST_ID='$id[$i]'";
            $result11=mysqli_query($connect,$sql7);
            }
        if($result11){
            print "<script>alert('Successfull added');location.href='index.php?page=rec1'</script>";
        }else{
            print "<script>alert('Unsuccessfull added');location.href='index.php?page=mark1'</script>";
        }
    }
    elseif ($page=="test") {
        $page="fromedit/tests.php";
    }
    elseif ($page="symptoms") {
        $page="fromedit/formsymptoms.php";
    }
    
    else{
        $page="views/home.php";
    }
}else{
    $page="views/home.php";
}