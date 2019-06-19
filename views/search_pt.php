
<!-- /*
$handle=fopen('names.txt','w');
fwrite($handle,'alex'."\n");
fwrite($handle,'billy');
fclose($handle);
echo 'written.';
*/

/*
if(isset($_POST["searchname"])){
$searchname=$_POST["searchname"];
if(!empty($searchname)){
$quer12="SELECT FNAME,MNAME,LNAME FROM register WHERE (FNAME LIKE '%".$searchname."%'  OR MNAME like '%".$searchname."%' OR LNAME '%".$searchname."%'  )";
$resu=mysqli_query($connect,$quer12);
if($resu) {
    while($row=mysqli_fetch_assoc($resu)) {
        echo $row["FNAME"]." ".$row["MNAME"]." ".$row["LNAME"];
    }
}else {
    echo 'no results found';
}

}else{ echo 'please type a name to search';}

}*/ -->


<div class="container">
<div class="row">
<div class="form-group">
<div class="input-group">
<span class="input-group-addon">search</span>
<input type="text" name="searchname" id="searchname" class="form-control">
</div>
</div>
</div>
</div>
<div id="results"></div>
</div>

<script>
$(document).ready(function () {
   $('#searchname').keyup(function () {
       var txt=$(this).val();
       if (txt != '') {
        $.ajax({
               url:"search_pt.php",
               method:"post",
               data:{seach:txt},
               dataType:"text",
               success:function(data){
                   $('#result').html(data);
               }
           });
       }else{
           $('#result').html('');
           $.ajax({
               url:"search_pt.php",
               method:"post",
               data:{seach:txt},
               dataType:"text",
               success:function(data){
                   $('#result').html(data);
               }
           });
       }
   }) ;
});
</script>
<?php
$output="";
$quer12="SELECT * FROM register WHERE (FNAME LIKE '%".$_POST['search']."%'  OR MNAME like '%".$_POST['search']."%' OR LNAME '%".$_POST['search']."%'  )";
$resu=mysqli_query($connect,$quer12);
if ($resu) {
    $output .='<h4 align="center">Search Result<h4>';
    $output .= ' <div class="table-rensponsive">
        <tbale class="table table borded">
        <tr >
        <th>FIRST NAME</th>
        <th>MIDDLE NAME</th>
        <th>LAST NAME</th>
        <th>GENDER</th>
        <th>DATE OF BIRTH</th>
        <th>MARITAL STATUS</th>
        <th>BIRTH PLACE</th>
        <th>REGION </th>
        <th>NATIONALITY</th>
        <th>OCUPATION</th>
        <th>HEIGHT</th>
        <th>WEIGHT</th>
        <th>MOBILE NUMBER</th>
        <th>MEMBERSHIP NUMBER</th>
        <th>VOTE NUMBER</th>
        <th>STUDENT REGISTATION NUMBER</th>
        <th>MANAGE</th>
        </tr>';
    while ($row=mysqli_fetch_array($resu)) {
        $output .='
        <tr>
        <td>'.$row["FNAME"].'</td>
        <td>'.$row["MNAME"].'</td>
        <td>'.$row["LNAME"].'</td>
        <td>'.$row["GENDER"].'</td>
        <td>'.$row["DOB"].'</td>
        <td>'.$row["M_STATUS"].'</td>
        <td>'.$row["BIRTH_PLACE"].'</td>
        <td>'.$row["REGION"].'</td>
        <td>'.$row["NATIONALITY"].'</td>
        <td>'.$row["OCUPATION"].'</td>
        <td>'.$row["HEIGHT"].'</td>
        <td>'.$row["WEIGHT"].'</td>
        <td>'.$row["MOBILE_NUMBER"].'</td>
        <td>'.$row["MEMBERSHIP_NUMBER"].'</td>
        <td>'.$row["VOTE_NUMBER"].'</td>
        <td>'. $row["STUREGNO"].'</td>
        </tr>';
    }
    echo  $output;
}else {
    echo 'data not found';
}
?>
