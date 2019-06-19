<?php
  // include "../includes/connection.php";
  $reg_id="";
  $reg_id=$_SESSION["idid"];
  $query2="SELECT * FROM register WHERE REG_ID=$reg_id";
  $result1=mysqli_query($connect,$query2);
  if ($result1) {
    while ($row=mysqli_fetch_array($result1)) {
        ?>
        <div class="container">
                <div class="card">
								<? echo $reg_id; ?>
					<div class="card-header"><input type="number" name="pat"value="<?=$_SESSION["idid"]?>" class="form-control" readonly></div>
					<div class="card-body">
						<form action="index.php?page=rece_edit" method="post" name="edit" role="form">
							<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="firstname">FIRST NAME</label>
									<input type="text" name="efname" class="form-control" id="fname" value="<?=$row["FNAME"]?>" autocomplete="off">
									<span id="first" class="alert-danger"></span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="middlename">MIDDLE NAME</label>
									<input type="text" name="emname" class="form-control" id="mname" value="<?=$row["MNAME"]?>">
									<span id="middle" class="alert-danger"></span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="lastname">LAST NAME</label>
									<input type="text" name="elname" class="form-control" id="lname" value="<?=$row["LNAME"]?>">
									<span id="last" class="alert-danger"></span>
								</div>
							</div>
							</div>
							<div class="row">
							<div class="col-md-4">
								<div class="radio">
									<label for="gender">GENDER</label><br>
									<input type="radio" name="egender" class="radio-inline" value="female">female<br>
									<input type="radio" name="egender"class="radio-inline" value="male" >male
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="age">DATE OF BIRTH</label>
									<input type="datetime" name="edob" class="form-control" value="<?=$row["DOB"]?>" >
								</div>
							</div>
                            <div class="col-md-4">
								<div class="form-group">
									<label for="tribe">MARITAL STATUS</label>
									<input type="text" name="emstatus" class="form-control" id="lname" value="<?=$row["M_STATUS"]?>">
									<span id="last" class="alert-danger"></span>
								</div>
                            </div>
							</div> 
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="tribe" >BIRTH PLACE</label>
											 <input type="text" name="ebplace" class="form-control" value="<?=$row["BIRTH_PLACE"]?>">
									</div>
									</div>      
								 <div class="col-md-4">
									<div class="form-group">
											<label for="ward">REGION</label>
												<input type="text" name="eregion" class="form-control" value="<?=$row["REGION"]?>">
									</div>
									</div>
								<div class="col-md-4">
									<div class="form-group">
												 <label for="street" >NATIONALITY</label>
												<input type="text" name="enationality" class="form-control" value="<?=$row["NATIONALITY"]?>">
										 </div>
										</div>
								 </div>
								 <div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="ocupation" >OCUPATION</label>
											 <input type="text" name="eocupation" class="form-control" value="<?=$row["OCUPATION"]?>">
									</div>
									</div>      
								 <div class="col-md-4">
									<div class="form-group">
											<label for="weight">HEIGHT</label>
												<input type="number" name="eheight" class="form-control" value="<?=$row["HEIGHT"]?>">
									</div>
									</div>
								<div class="col-md-4">
									<div class="form-group">
												 <label for="street" >WEIGHT</label>
												<input type="text" name="eweight" class="form-control" value="<?=$row["WEIGHT"]?>">
										 </div>
										</div>
								 </div>
						
							<div class="row">
								<div class="col-md-4">
								<div class="form-group">
									<label for="mobile number">MOBILE NUMBER</label>
									<input type="tel" name="epnumber" class="form-control"id="pno" value="<?=$row["MOBILE_NUMBER"]?>">
									<span id="phone" class="alert-danger"></span>
								</div>
								</div>
								<div class="col-md-4">
								<div class="form-group">
								<label for="membership number">MEMBERSHIP NUMBER</label>
								<input type="text" name="emembership_number" id="mnumber" class="form-control" value="<?=$row["MEMBERSHIP_NUMBER"]?>">
								</div>
								</div>
								<div class="col-md-4">
								<div class="form-group">
								<label for="vote number">VOTE NUMBER</label>
								<input type="text" name="evotenumber" id="vote_number" class="form-control" value="<?=$row["VOTE_NUMBER"]?>">
								</div>
								</div>
							</div>
							<div class="row">
							<div class="col-md-12">
							<div class="form-group">
							<label for="sturegno">STUDENT REGISTRATION NUMBER</label>
							<input type="text" name="esturegno" id="sturegno" class="form-control" value="<?=$row["STUREGNO"]?>">
							</div>
							</div>
							</div>
						
							<div class="row">
							<div class="col-md-2">
							<input type="submit" name="submit" value="UPDATE" class="btn btn-primary  btn-block" >
							</div>
							<div class="col-md-2" >
							<input type="reset" value="reset" class="btn btn-secondary btn-block" hidden>
							</div>
							<div class="col-md-2">
								<a href="index.php?page=search_pt" class="btn btn-danger btn-block">CANCEL</a>
							</div>
							</div>
						</form>
				</div>
		</div>  

<?php
    }
  }              
 
