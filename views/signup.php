<div class="container">
				<div class="card">
					<div class="card-header">REGISTRATION FORM</div>
					<div class="card-body">
						<form action="models/reg_process.php" method="post" onsubmit="return validation()" name="signup" role="form">
							<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="firstname">FIRST NAME</label>
									<input type="text" name="fname" class="form-control" id="fname" placeholder="enter the first name" autocomplete="off">
									<span id="first" class="alert-danger"></span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="middlename">MIDDLE NAME</label>
									<input type="text" name="mname" class="form-control" id="mname" placeholder="enter the middle name">
									<span id="middle" class="alert-danger"></span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="lastname">LAST NAME</label>
									<input type="text" name="lname" class="form-control" id="lname" placeholder="enter the last name">
									<span id="last" class="alert-danger"></span>
								</div>
							</div>
							</div>
							<div class="row">
							<div class="col-md-4" >
								<div class="radio form-group">
									<label for="gender">GENDER</label><br>
									<input type="radio" name="gender" class="radio-inline" value="female" checked >female<br>
									<input type="radio" name="gender"class="radio-inline" value="male" >male
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="age">DATE OF BIRTH</label>
									<input type="datetime" name="dob" class="form-control" >
								</div>
							</div>
                            <div class="col-md-4">
								<div class="form-group">
									<label for="tribe">MARITAL STATUS</label>
									<input type="text" name="mstatus" class="form-control" id="lname" placeholder="enter the tribe">
									<span id="last" class="alert-danger"></span>
								</div>
                            </div>
							</div> 
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="tribe" >BIRTH PLACE</label>
											 <input type="text" name="bplace" class="form-control" placeholder="enter the district">
									</div>
									</div>      
								 <div class="col-md-4">
									<div class="form-group">
											<label for="ward">REGION</label>
												<input type="text" name="region" class="form-control" placeholder="enter the ward">
									</div>
									</div>
								<div class="col-md-4">
									<div class="form-group">
												 <label for="street" >NATIONALITY</label>
												<input type="text" name="nationality" class="form-control" placeholder="enter the street name">
										 </div>
										</div>
								 </div>
								 <div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="ocupation" >OCUPATION</label>
											 <input type="text" name="ocupation" class="form-control" placeholder="enter the district">
									</div>
									</div>      
								 <div class="col-md-4">
									<div class="form-group">
											<label for="weight">HEIGHT</label>
												<input type="number" name="height" class="form-control" placeholder="enter the ward">
									</div>
									</div>
								<div class="col-md-4">
									<div class="form-group">
												 <label for="street" >WEIGHT</label>
												<input type="text" name="weight" class="form-control" placeholder="enter the street name">
										 </div>
										</div>
								 </div>
						
							<div class="row">
								<div class="col-md-4">
								<div class="form-group">
									<label for="mobile number">MOBILE NUMBER</label>
									<input type="tel" name="pnumber" class="form-control"id="pno" placeholder="+255717025100">
									<span id="phone" class="alert-danger"></span>
								</div>
								</div>
								<div class="col-md-4">
								<div class="form-group">
								<label for="membership number">MEMBERSHIP NUMBER</label>
								<input type="text" name="membership_number" id="mnumber"class="form-control">
								</div>
								</div>
								<div class="col-md-4">
								<div class="form-group">
								<label for="vote number">VOTE NUMBER</label>
								<input type="text" name="votenumber" id="vote_number"class="form-control">
								</div>
								</div>
							</div>
							<div class="row">
							<div class="col-md-12">
							<div class="form-group">
							<label for="sturegno">STUDENT REGISTRATION NUMBER</label>
							<input type="text" name="sturegno" id="sturegno" class="form-control">
							</div>
							</div>
							</div>
							<div class="row">
							<div class="col-md-2">
							<input type="submit" name="submit" value="register" class="btn btn-primary  btn-block" >
							</div>
							<div class="col-md-2">
							<input type="reset" value="reset" class="btn btn-secondary btn-block">
							</div>
							<div class="col-md-2">
						
							</div>
							</div>
						</form>
				</div>
		</div>  

<script type="text/javascript" >
	function validation(){
		var firstname=document.getElementById('fname').value;
		var middlename=document.getElementById('mname').value;
		var lastname=document.getElementById('lname').value;
		var phonenumber=document.getElementById('pno').value;
		var email=document.getElementById('email').value;
		var uername=document.getElementById('user').value;
		var password=document.getElementById('password').value;
		var confirm=document.getElementById('cpasswords').value;
		

			if(firstname==""){
				document.getElementById('first').innerHTML ="** Please fill first name**";
				return false; 
			}
			if(!(isNaN(firstname))){
				document.getElementById('first').innerHTML ="** Please enter the letters not a number**";
				return false; 
			}
			if(!(isNaN(middlename))){
				document.getElementById('middle').innerHTML ="** Please enter the letters not a number**";
				return false; 
			}
			if(lastname==""){
				document.getElementById('last').innerHTML ="** please fill last name**";
				return false; 
			}
			if(!(isNaN(lastname))){
				document.getElementById('last').innerHTML ="** Please enter the letters not a number**";
				return false; 
			}
			if(phonenumber==" "){
				document.getElementById('phone').innerHTML ="** Please fill the phone numeber**";
				return false; 
			}
			if(phonenumber.length!=10){
				document.getElementById('phone').innerHTML ="** Mobile number should be  10 digits**";
				return false;
			}
			if(isNaN(phonenumber)){
				document.getElementById('phone').innerHTML ="** Mobile number should contain only digits**";
				return false;
			}
			// if(email==""){
			// 	document.getElementById('e-mail').innerHTML ="** please fill the email field**";
			// 	return false;
			// }
			// if(email.indexof('@')<=0){
			// 	document.getElementById('e-mail').innerHTML ="** please fill the email in proper format @ **";
			// 	return false;
			// }
			// if((email.charAt(email.length-4)!='.') &&(email.charAt(email.length-3)!='.')){
			// 	document.getElementById('e-mail').innerHTML ="** please fill the email in proper format . **";
			// 	return false;
			// }
			if(username==" "){
				document.getElementById('userid').innerHTML="** Please fill the username field **";
				return false;
			}
			if((username.length<3) ||(username.length>8)) {
				document.getElementById('userid').innerHTML="** The username should be between 3 and 8 character **";
				return false;
			}
			if(password==" "){
				document.getElementById('pass').innerHTML="** Please fill the password **";
				return false;
			}
			if((password.length<5)||(password.length>20)){
				document.getElementById('pass').innerHTML="** The pasword should be between 5 and 20 **";
				return false;
			}
			if(confirm==" "){
				document.getElementById('cpass').innerHTML="** Please re-enter the password **";
				return false;
			}
			if(password != confirm){
				document.getElementById('cpass').innerHTML="** Password are not matching **";
				return false;
			}
	}
	</script>   