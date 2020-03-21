<?php
	$maxdate=date('Y-m-d', strtotime('-18 years'));
	$mindate=date('Y-m-d', strtotime('-100 years'));
?>

@extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="/css/register.css">
@endsection

@section('content')
<h1 class="float-left mb-1">Add New Employee</h1>
<div class="container-fluid py-1 m-3 my-0 rounded" style="padding: 0 1px">
            	<form id="regForm" method="POST" class="bg-light mx-auto rounded form-wrapper my-0 px-5" action="/test">
            		@csrf
				  <h1 class="h4 mx-auto text-center bold">Fill out the below information</h1>
				  <!-- One "tab" for each step in the form: -->
				  <div class="tab"><span class="h5">Personal Information:</span><br><br>
				  	<div class="form-group">
					  	<label>Name:<span class="require">*</span></label>
					  	<div class="row">
						    <div class="col-md-6">
						    	<input oninput="this.className = ''" placeholder="First name..." title="First-Name can contian alphabets only." required type="text" class="form-control" name="FNAME" id="fName" pattern="^[A-Za-z]+$">
						    </div>
						    <div class="col-md-6">
						    	<input oninput="this.className = ''" placeholder="Last name..." pattern="^[A-Za-z]+$" title="Last-Name can contian alphabets only." type="text" class="form-control" name="LNAME" id="lName">
						    </div>
					  	</div>
				    </div>
				    <div class="row">
				    	<div class="col-md-6">
				    		<label>Gender:<span class="require">*</span></label>
						    <div class="row">
						    <div class="custom-control col-md-3 ml-5 custom-radio">
							    <input type="radio" class="custom-control-input" value="1" id="customMale" name="GENDER" required checked>
							    <label class="custom-control-label" for="customMale">Male</label>
							</div>
							<div class="custom-control col-md-3 custom-radio">
							    <input type="radio" class="custom-control-input" value="2" id="customFemale" name="GENDER" required>
							    <label class="custom-control-label" for="customFemale">Female</label>
							</div>
							<div class="custom-control col-md-3 custom-radio">
							    <input type="radio" class="custom-control-input" value="3" id="customOthers" name="GENDER" required>
							    <label class="custom-control-label" for="customOthers">Others</label>
							</div>
							</div>		
				    	</div>
				    	<div class="col-md-6">
							<div class="form-group">
								<label>Date of Birth:</label>
								<input oninput="this.className = ''" max="<?=$maxdate?>" min="<?=$mindate?>" type="date" class="form-control" name="DOB" id="dob">
							</div>
				    	</div>
				    </div>
				  </div>
				  <div class="tab"><span class="h5">Contact Information:</span><br><br>
					<div class="form-group">
						<label>Mobile:</label>
						<input oninput="this.className = ''" type="text" title="Mobile Number must be 10 digits numeric only." placeholder="Enter mobile number..." pattern="^[\d]{10}$" class="form-control" name="CONTACT_NUMBER" id="phone_number">
					</div>
				  	<div class="form-group">
					  	<label>Email:<span class="require">*</span></label>
					  	<input oninput="this.className = ''" placeholder="you@email.com" title="Enter a valid email address." required type="email" class="form-control" name="EMAIL" id="email">
				    </div>
					<div class="form-group">
						<label>Address:<span class="require">*</span></label>
						<input oninput="this.className = ''" type="text" class="form-control" placeholder="address..." title="Enter proper Address." name="ADDRESS1" id="addressLine1" required>
					</div>
				  	<div class="form-group">
					  	<label>Landmark:</label>
					  	<textarea placeholder="Enter Landmark..." type="textarea" title="Enter proper Landmark." class="form-control" name="LANDMARK" id="landmark"></textarea>
				    </div>
				    <div class="form-group">
						<label>Zip / Postal Code:</label>
						<input oninput="this.className = ''" title="Please enter proper Zip / Pin Code, must be 6digits numeric only." type="text" class="form-control" pattern="^[\d]{6}$" placeholder="Enter Zip / Postal code..." name="PINCODE" id="pinCode">
					</div>
				    <div class="form-group">
						<label class="ok" id="country_label"  onchange="this.className = ''" for="country">Country:<span class="require">*</span></label>
						<select id="country" class="custom-select" required name="COUNTRY">
					  		<option value="-1">--- Select Country ---</option>
					  		<option value="101">India</option>
					  		<option value="20">United States of America</option>
					  		<option value="30">United Kingdom</option>
					  	</select>
					</div>
				  	<div class="form-group">
					  	<label id="state_label"  onchange="this.className = ''" for="state">State:<span class="require">*</span></label>
					  	<select id="state" class="custom-select" name="STATE">
					  		<option value="-1">--- Select State ---</option>
					  		<option value="12">Gujarat</option>
					  		<option value="201">New York</option>
					  		<option value="301">London</option>
					  	</select>
				    </div>
				  	<div class="form-group">
					  	<label id="city_label" onchange="this.className = ''" for="city">City:</label>
					  	<select id="city" required class="custom-select" name="CITY">
					  		<option value="-1">--- Select City ---</option>
					  		<option value="1068">Vadodara</option>
					  		<option value="2000">Edison</option>
					  		<option value="3000">London City</option>
					  	</select>
				    </div>
				  </div>
				  <div class="tab"><span class="h5">Corporate Information:</span><br><br>
				  	<div class="form-group">
					  	<label>Employee Code:</label>
					  	<?php
					  		$next_id=rand(10,100);
					  	?>
					  	<input oninput="this.className = ''" value="<?='JB'.$next_id?>" readonly placeholder="Enter Employee Code..." title="Employee Code can be alpha numeric..." required type="text" class="form-control" name="EMP_CODE" id="emp_code" pattern="^[A-Za-z0-9]+$">

					  	<label>Employee's Password:<span class="require">*</span></label>
					  	<input oninput="this.className = ''" id="password" placeholder="Enter Password..." required type="password" class="form-control" name="PASSWORD">
					  	<label>Confirm Password:<span class="require">*</span></label>
					  	<input oninput="this.className = ''" data-match="#password" data-match-error="Password and confirm password differs" placeholder="Confirm Password..." required type="password" class="form-control" id="cnfpassword" name="cnfpassword">
				    </div>
				  </div>
				  
				  <div style="overflow:auto;">
				  	<div class="float-left">
				      <button type="button" class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)"><i class="fas fa-backward"></i> Previous</button>
				  	</div>
				    <div style="float:right;">
				      <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Next <i class="fas fa-forward"></i></button>
				    </div>
				  </div>
				  <!-- Circles which indicates the steps of the form: -->
				  <div style="text-align:center;margin-top:40px;">
				    <span class="step"></span>
				    <span class="step"></span>
				    <span class="step"></span>
				  </div>
				</form>
            </div>
@endsection

@section('script')
<script src="../js/script.js"></script>
@endsection