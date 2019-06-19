<?php
include "includes/connection.php";
$sql11="SELECT * FROM register";
$RE11=mysqli_query($connect,$sql11);

if($RE11){
    ?>
    <style>
    table, th, td {
  border: 1px solid black;
  th {
      width:100%;
  }
}
    </style>
    <div class="container">
    <div class="col-md-12 jumbotron">
    
    <table style="width:100%; border: 1px solid blue;  " >
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

        </tr>
    <?php
    while($row=mysqli_fetch_assoc($RE11)){
        ?>
        <tr style="border:solid black;">
            
            <td><?=$row["FNAME"]?></td>
            <td><?=$row["MNAME"]?></td>
            <td><?=$row["LNAME"]?></td>
            <td><?=$row["GENDER"]?></td>
            <td><?=$row["DOB"]?></td>
            <td><?=$row["M_STATUS"]?></td>
            <td><?=$row["BIRTH_PLACE"]?></td>
            <td><?=$row["REGION"]?></td>
            <td><?=$row["NATIONALITY"]?></td>
            <td><?=$row["OCUPATION"]?></td>
            <td><?=$row["HEIGHT"]?></td>
            <td><?=$row["WEIGHT"]?></td>
            <td><?=$row["MOBILE_NUMBER"]?></td>
            <td><?=$row["MEMBERSHIP_NUMBER"]?></td>
            <td><?=$row["VOTE_NUMBER"]?></td>
            <td><?=$row["STUREGNO"]?></td>
            
            <td>
            <a href="index.php?page=recedit&id=<?=$row["REG_ID"]?>">edit</a>
            <a href="index.php?page=recedit&id=<?=$row["REG_ID"]?>">delete</a>
            </td>
        </tr>
    <?php
    }
?>
</table>
</div>
</div>
<?php
}
