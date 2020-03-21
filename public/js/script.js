$('#reset').click(function(){
	location.reload('true');
 //  document.getElementById("regForm").reset();
 //  showTab(0);
});

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "<i class='fas fa-check-circle'></i> Submit";
    //document.getElementById("nextBtn").setAttribute('type','submit');
    //document.getElementById("nextBtn").setAttribute('name','submit');
    document.getElementById("nextBtn").classList.remove("btn-primary");
    document.getElementById("nextBtn").classList.add("btn-success");
  } else {
    document.getElementById("nextBtn").innerHTML = "Next <i class=\"fas fa-forward\"></i>";
    document.getElementById("nextBtn").classList.add("btn-primary");
    document.getElementById("nextBtn").classList.remove("btn-success");
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}



function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm_JS()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    $('#regForm').submit();
    return false; 
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm_JS() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is invalid...
    if (!y[i].checkValidity()) {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }

  }

  if(currentTab==1){
    country=document.getElementById('country');
    state=document.getElementById('state');
    if(country.value==''){
  	  // add an "invalid" class to the field:
  	  country_label=document.getElementById('country_label');
        country_label.className += " invalid"; 
        // and set the current valid status to false
        valid = false;  	
    }
    if(state.value==''){
  	  // add an "invalid" class to the field:
  	  state_label=document.getElementById('state_label');
        state_label.className += " invalid";
        // and set the current valid status to false
        valid = false;  	
    }

  }else if(currentTab==2){
    if($('#password').val()!=$('#cnfpassword').val()){
      // add an "invalid" class to the field:
        document.getElementById('password').className += " invalid";
        document.getElementById('cnfpassword').className += " invalid";
        // and set the current valid status to false
        valid = false;    
    }
  }

  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    console.log('Valid'+currentTab);
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}