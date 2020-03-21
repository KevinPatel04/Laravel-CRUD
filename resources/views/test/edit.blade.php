<?php
	$q=$test->EID;
	$emp_code=$test->EMP_CODE;
	$fname=$test->FNAME;
	$lname=$test->LNAME;
	$GEN=array(1=>'MALE',2=>'FEMALE',3=>'OTHERS');
    $gender=$GEN[$test->GENDER];                    
	$dob=$test->DOB;
	$phone=$test->CONTACT_NUMBER;
	$email=$test->EMAIL;
	$state=$test->STATE;
	$country=$test->COUNTRY;
	$pinCode=$test->PINCODE;
	$city=$test->CITY;
	$addressLine1=$test->ADDRESS1;
	$landmark=$test->LANDMARK;
?>

@extends('layouts.app')


@section('style')
@endsection

@section('content')
	<form id="saveForm" action="/test/{{$q}}" method="POST"> 
        @csrf
        @method('PUT')
    	<div class="card mb-5 pb-3">     
			<div class="card-header py-1">
              	<h3 class="m-0 font-weight-bold text-primary float-left"><?=$fname.' '.$lname.'\'s Record'?></h3>
              	<a href="/test/{{$q}}}" title="Cancel & Exit" id="Cancel" class="btn btn-danger float-right" style="color: white;"><i class="fas fa-times-circle"></i> Cancel & Exit</a>
          	  	<button class="mr-2 btn btn-success float-right" name="save" title="Save <?=$fname.' '.$lname?>" type="submit"><i class="fas fa-check-circle"></i> Save </button>
              
            </div>
            <div class="card-body py-1">
            <div class="container-fluid py-1 my-0 rounded" style="padding: 0 1px">
            	<fieldset>
            		<lagend class="h5">Corporate Information</lagend>
            			<div class="form-group">
		            		<label>Employee Code:</label>
							  	<input oninput="this.className = 'form-control'" readonly value="<?=$emp_code?>" placeholder="First name..." required type="text" class="form-control" name="EMP_CODE">	
            			</div>
            	</fieldset>
            	<fieldset>
            		<lagend class="h5">Personal Information</lagend>
            		<div class="row">
            			<div class="col-md-6">
		            		<div class="form-group">
		            			<label>Name:</label>
							  	<div class="row">
								    <div class="col-md-6">
								    	<input oninput="this.className = 'form-control'" value="<?=$fname?>" placeholder="First name..." required type="text" class="form-control" name="FNAME">
								    </div>
								    <div class="col-md-6">
								    	<input oninput="this.className = 'form-control'" value="<?=$lname?>"  placeholder="Last name..." type="text" class="form-control" name="LNAME">
								    </div>
							  	</div>		
		            		</div>	
            			</div>
            			<div class="col-md-3">
				    		<label>Gender:</label>
						    <div class="row">
						    <div class="custom-control col-md-3 ml-5 custom-radio">
							    <input <?php if($gender=='MALE'){echo 'checked';}?> type="radio" class="custom-control-input" value="1" id="customMale" name="GENDER" required>
							    <label class="custom-control-label" for="customMale">Male</label>
							</div>
							<div class="custom-control col-md-3 custom-radio">
							    <input <?php if($gender=='FEMALE'){echo 'checked';}?> type="radio" class="custom-control-input" value="2" id="customFemale" name="GENDER" required>
							    <label class="custom-control-label" for="customFemale">Female</label>
							</div>
							<div class="custom-control col-md-3 custom-radio">
							    <input type="radio" <?php if($gender=='OTHERS'){echo 'checked';}?> class="custom-control-input" value="3" id="customOthers" name="GENDER" required>
							    <label class="custom-control-label" for="customOthers">Others</label>
							</div>
							</div>		
				    	</div>
				    	<div class="col-md-3">
							<div class="form-group">
								<label>Date of Birth:</label>
								<input oninput="this.className = 'form-control'" value="<?=$dob?>" type="date" class="form-control" name="DOB">
							</div>
				    	</div>
            		</div>
            	</fieldset>
            	<input type="hidden" name="PASSWORD" id="password">
            	<fieldset>
            		<lagend class="h5">Contact Information</lagend>
            		<div class="row">
            			<div class="col-md-6">
            				<div class="form-group">
								<label>Mobile:</label>
								<input oninput="this.className = 'form-control'" value="<?=$phone?>" type="text" placeholder="Enter mobile number..." pattern="^[\d]{10}$" class="form-control" name="CONTACT_NUMBER">
							</div>
            			</div>
            			<div class="col-md-6">
            				<div class="form-group">
							  	<label>Email:</label>
							  	<input oninput="this.className = 'form-control'" value="<?=$email?>" readonly placeholder="you@email.com" required type="email" class="form-control" name="EMAIL">
						    </div>	
            			</div>
            			<div class="col-md-6">
            				<div class="form-group">
								<label>Address Line-1:</label>
								<input oninput="this.className = 'form-control'" value="<?=$addressLine1?>" type="text" class="form-control" placeholder="addressLine1" name="ADDRESS1">
							</div>
            			</div>
            			<div class="col-md-6">
            				<div class="form-group">
								<label for="country">Country</label>
								<select id="country" class="custom-select" name="COUNTRY" required>
									<option value="-1">--- Select Country ---</option>
							  		<option value="101" @if($country==101){{ 'selected' }}@endif>India</option>
							  		<option value="20" @if($country==20){{ 'selected' }}@endif>United States of America</option>
							  		<option value="30" @if($country==30){{ 'selected' }}@endif>United Kingdom</option>
							  		
							  	</select>
							</div>
            			</div>
            			<div class="col-md-6">
							<div class="form-group">
							  	<label>Landmark:</label>
							  	<textarea placeholder="Enter Landmark..." type="textarea" class="form-control" name="LANDMARK"><?=$landmark?></textarea>
						    </div>
            			</div>
            			<div class="col-md-6">
            				<div class="form-group">
							  	<label for="state">State</label>
							  	<select id="state" class="custom-select" name="STATE" required>
							  		<option value="-1" >--- Select State ---</option>
							  		<option value="12" @if($state==12){{ 'selected' }}@endif >Gujarat</option>
							  		<option value="201" @if($state==201){{ 'selected' }}@endif >New York</option>
							  		<option value="301" @if($state==301){{ 'selected' }}@endif >London</option>
							  	</select>
						    </div>
            			</div>
            			<div class="col-md-6">
						    <div class="form-group">
								<label>Zip / Postal Code</label>
								<input oninput="this.className = 'form-control'" value="<?=$pinCode?>" type="text" class="form-control" pattern="^[\d]{6}$" placeholder="Enter Zip / Postal code..." name="PINCODE">
							</div>
            			</div>
            			<div class="col-md-6">
							<div class="form-group">
							  	<label for="city">City</label>
							  	<select id="city" class="custom-select" name="CITY">
							  		<option value="-1">--- Select City ---</option>
							  		<option value="1068" @if($city==1068){{ 'selected' }}@endif >Vadodara</option>
							  		<option value="2000" @if($city==2000){{ 'selected' }}@endif>Edison</option>
							  		<option value="3000" @if($city==3000){{ 'selected' }}@endif>London City</option>
							  	</select>
						    </div>
            			</div>
            		</div>
            	</fieldset>
            </div>	
        </div>
    </div>
</form>
			
@endsection

@section('script')
<script type="text/javascript">
	
	function confirmation(e){
		var c=confirm("Do you want to delete this Employee??");
		if(c==true){
			$('#delete_'+e).submit();
		}else{
			alert("Account is not Deleted");
		}
	}

</script>
@endsection