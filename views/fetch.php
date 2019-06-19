<?php
include "../includes/connection.php";
// $connect = mysqli_connect("localhost", "root", "", "testing");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM register 
	WHERE FNAME LIKE '%".$search."%'
	OR MNAME LIKE '%".$search."%' 
	OR LNAME LIKE '%".$search."%' 
	OR VOTE_NUMBER LIKE '%".$search."%'
	OR MEMBERSHIP_NUMBER LIKE '%".$search."%' 
	OR STUREGNO LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM register ORDER BY REG_ID";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
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
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
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
			<td>
            <a href="index.php?page=recedit&id='.$row["REG_ID"].'">edit</a>
            <a href="index.php?page=recdelete&id='.$row["REG_ID"].'">delete</a>
            </td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>