$(function(){
	$.validator.setDefaults({
    errorClass: 'help-block',
    highlight: function(element) {
      $(element)
        .closest('.form-group')
        .addClass('has-error');
    },
    unhighlight: function(element) {
      $(element)
        .closest('.form-group')
        .removeClass('has-error');
    },
    errorPlacement: function (error, element) {
      if (element.prop('type') === 'checkbox') {
        error.insertAfter(element.parent());
      } else {
        error.insertAfter(element);
      }
    }
  });

  $.validator.addMethod('strongPassword', function(value, element) {
    return this.optional(element) 
      || value.length >= 6
      && /\d/.test(value)
      && /[a-z]/i.test(value);
  }, 'Your password must be at least 6 characters long and contain at least one number and one char\'.')


	$('#edit-Form').validate({
		rules: {
			fName: {
				required: true,
		        nowhitespace: true,
		        lettersonly: true,
		        
			},
			lName:{
				required: false,
		        nowhitespace: true,
		        lettersonly: true
			},
			gender:{
				required: true,
			},
			dob:{
				required: false,
			},
			email:{
				required: true,
      			email: true
			},
			state:{
				required: true
			},
			country:{
				required: true
			},
			pinCode: {
		        required: false,
		        digitsonly: true,
		        nowhitespace: true
			},
			city:{
				required: false	
			},
			addressLine1: {
        		required: true
			},
			landmark: {
				required: false
			},
			password: {
		      required: true,
		      strongPassword: true
		    },
		    cnfpassword: {
		      required: true,
		      equalTo: '#password'
		    }
		},

		messages: {
			fName: {
				required: 'First name is compulsory field',
				lettersonly: 'First name can only contain Letters.',
				nowhitespace: 'First name cannot contain white spaces'
			},
			lName:{
				lettersonly: 'First name can only contain Letters.',
				nowhitespace: 'First name cannot contain white spaces'
			},
			gender:{
				required: 'Gender is compulsory field',
			},
			email:{
				required: 'Email is compulsory field',
      			email: 'Invalid Email Address Enter Valid Email'
			},
			state:{
				required: 'State is compulsory field'
			},
			country:{
				required: 'Country is compulsory field'
			},
			pinCode: {
		        digitsonly: 'Only digits are allowed',
		        nowhitespace: 'White spaces are not allowed'
			},
			addressLine1: {
        		required: 'Address is compulsory field'
			},
			password: {
		      required: 'Password is compulsory field',
		      strongPassword: true
		    },
		    cnfpassword: {
		      required: 'Confirm Password is compulsory field',
		      equalTo: '#password'
		    }
		}
	});
});