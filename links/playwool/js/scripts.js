/*
Filename: scripts.js
Author: Yeojin Song
Date: 27 April 2018
Description:JavaScript external file for Play Wool website
*/


// When the user scrolls down 30px from the top of the document, show the top of page button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
		if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
				document.getElementById("topOfPageBtn").style.display = "block";
		} else {
				document.getElementById("topOfPageBtn").style.display = "none";
		}
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
}


// Login Modal
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});

//--------------------------------------------------------------------------------------------------------

function checkAddCustomer(regoForm){
	// create variable to store error messages
	var errMsg = "";
	
	//test that email address meets basic syntax
	if (!(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(regoForm.email.value))){
		// add error message to errMsg variable
		errMsg = errMsg + "Invalid email address\n";	
	}
	
	//test that last name has been provided	
	if(regoForm.lastName.value == ""){
		//add error message to errMsg variable
		errMsg =errMsg + "Last name Required\n";
	}
	
	//test that address has been provided	
	if(regoForm.address.value == ""){
		//add error message to errMsg variable
		errMsg =errMsg + "address Required\n";
	}
	
	//test that suburb has been provided	
	if(regoForm.suburb.value == ""){
		//add error message to errMsg variable
		errMsg =errMsg + "suburb Required\n";
	}
	
	//test that state has been provided	
	if(regoForm.state.value == ""){
		//add error message to errMsg variable
		errMsg =errMsg + "state must be selected \n";
	}
	
	//test that whether post code is 4 digits number or not	
	if(isNaN(regoForm.postCode.value)){
		//add error message to errMsg variable
		errMsg =errMsg + "Post code musb be number \n";
	}
	
	//test that country has been provided	
	if(regoForm.country.value == ""){
		//add error message to errMsg variable
		errMsg =errMsg + "country must be selected \n";
	}
	
	//test that password 7 to 12 digits long	
	if(regoForm.passWord.value.length < 7 || regoForm.passWord.value.length > 12){
		//add error message to errMsg variable
		errMsg =errMsg + "password musb be 7 to 12 \n";
	}
	
	//test that password confirm	
	else  if(regoForm.passWordConfirm.value.length < 7 || regoForm.passWordConfirm.value.length > 12){
		//add error message to errMsg variable
		errMsg =errMsg + "Confirm password musb be 7 to 12 \n";
	}
	else{
		//test if password match
		if(regoForm.passWord.value != regoForm.passWordConfirm.value){
		//add error message to errMsg variable
		errMsg =errMsg + "Confirm password does not match \n";
		}		
	}
	
	
	
	//test if any error messages to display
	if(errMsg == ""){
		// if error msg is empty it's ok to continue
		return true; 
	}	
	else {
		// not ok to submit form
		alert(errMsg);
		return false;	
	}
	
} // end of checkAddCustomer function


//-------------------------------------------------------------------------------------------------------------------------------

function checkDeliveryDetails(deliveryForm){
	// create variable to store error messages
	var errMsg = "";
	
	
	//test that last name has been provided	
	if(deliveryForm.firstName.value == ""){
		//add error message to errMsg variable
		errMsg =errMsg + "First name Required\n";
	}
	
	//test that address has been provided	
	if(deliveryForm.address.value == ""){
		//add error message to errMsg variable
		errMsg =errMsg + "address Required\n";
	}
	
	//test that suburb has been provided	
	if(deliveryForm.suburb.value == ""){
		//add error message to errMsg variable
		errMsg =errMsg + "suburb Required\n";
	}
	
	//test that state has been provided	
	if(deliveryForm.state.value == ""){
		//add error message to errMsg variable
		errMsg =errMsg + "state Required\n";
	}
	
	//test that whether post code is 4 digits number or not	
	if(isNaN(deliveryForm.postCode.value)){
		//add error message to errMsg variable
		errMsg =errMsg + "Post code musb be number \n";
	}
		
	//test that country has been provided	
	if(deliveryForm.country.value == ""){
		//add error message to errMsg variable
		errMsg =errMsg + "country Required\n";
	}
		
	//test if any error messages to display
	if(errMsg == ""){
		// if error msg is empty it's ok to continue
		return true; 
	}	
	else {
		// not ok to submit form
		alert(errMsg);
		return false;	
	}
	
} // end of checkDeliveryDetails function



//--------------------------------------------------------------------------------------------------------------------------------------------------------


function checkUpdateCustomer(updateForm){
	// create variable to store error messages
	var errMsg = "";
	
	//test that email address meets basic syntax
	if (!(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(updateForm.email.value))){
		// add error message to errMsg variable
		errMsg = errMsg + "Invalid email address\n";	
	}
	
	//test that last name has been provided	
	if(updateForm.lastName.value == ""){
		//add error message to errMsg variable
		errMsg =errMsg + "Last name Required\n";
	}
	
	//test that address has been provided	
	if(updateForm.address.value == ""){
		//add error message to errMsg variable
		errMsg =errMsg + "address Required\n";
	}
	
	//test that suburb has been provided	
	if(updateForm.suburb.value == ""){
		//add error message to errMsg variable
		errMsg =errMsg + "suburb Required\n";
	}
	
	//test that state has been provided	
	if(updateForm.state.value == ""){
		//add error message to errMsg variable
		errMsg =errMsg + "state Required\n";
	}
	
	//test that whether post code is 4 digits number or not	
	if(isNaN(updateForm.postCode.value)){
		//add error message to errMsg variable
		errMsg =errMsg + "Post code musb be number \n";
	}
	
	//test that country has been provided	
	if(updateForm.country.value == ""){
		//add error message to errMsg variable
		errMsg =errMsg + "country Required\n";
	}
		
	//test if any error messages to display
	if(errMsg == ""){
		// if error msg is empty it's ok to continue
		return true; 
	}	
	else {
		// not ok to submit form
		alert(errMsg);
		return false;	
	}
	
} // end of checkUpdateCustomer function

//--------------------------------------------------------------------------------------------------------------------------------------------------------
function checkUpdatePassWord(changeForm){
	// create variable to store error messages
	var errMsg = "";
	
		
	//test that password 7 to 12 digits long	
	if(changeForm.passWordNew.value.length < 7 || changeForm.passWordNew.value.length > 12){
		//add error message to errMsg variable
		errMsg =errMsg + "password musb be 7 to 12 \n";
	}
	
	//test that password confirm	
	else  if(changeForm.PassWordNewConfirm.value.length < 7 || changeForm.PassWordNewConfirm.value.length > 12){
		//add error message to errMsg variable
		errMsg =errMsg + "Confirm password musb be 7 to 12 \n";
	}
	else{
		//test if password match
		if(changeForm.passWordNew.value != changeForm.PassWordNewConfirm.value){
		//add error message to errMsg variable
		errMsg =errMsg + "Confirm password does not match \n";
		}		
	}
	
	
	
	//test if any error messages to display
	if(errMsg == ""){
		// if error msg is empty it's ok to continue
		return true; 
	}	
	else {
		// not ok to submit form
		alert(errMsg);
		return false;	
	}
	
} // end of checkAddCustomer function

//---------------------------------------
function displayImage(path, pName, desc){
	//create an empty popup window
	var puw = window.open("","","height=530, width=430, top=200, left=200, toolbar=no, status=no, location=no, titlebar=no");
	
	//display image in the popup window
	puw.document.write("<img src='" +path +"' alt='"+pName +"' height='400' width='400'>");
	
	//display description
	puw.document.write("<p style='text-alignt: center'>" +desc + "</p>");
	
	//add close button
	puw.document.write("<p style='text-alignt: center'><input type='button' value='Close Window' onClick='window.close()'></p>");
}// end of function displayImage



//------------------------------------------------------------------------------------------------------------------------------------------------------------------

function checkLogin(modalForm){
	
	// create variable to store error messages
	var errMsg = "";
	
	//test that email address meets basic syntax
	if (!(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(modalForm.loginEmail.value))){
		// add error message to errMsg variable
		errMsg = errMsg + "Invalid email address\n";	
	}	
	
	//test that password 7 to 12 digits long	
	if(modalForm.loginPassWord.value.length < 7 || modalForm.loginPassWord.value.length > 12){
		//add error message to errMsg variable
		errMsg =errMsg + "Invalid pasword \n";
	}
	
	
	//test if any error messages to display
	if(errMsg == ""){
		// if error msg is empty it's ok to continue
		return true; 
	}	
	else {
		// not ok to submit form
		alert(errMsg);
		return false;	
	}
	
	
}// end of function check login

//-------------------------------------------------------------------------------------------------------------------------------
function checkEmail(forgettenPasswordForm){
	// create variable to store error messages
	var errMsg = "";
	
	//test that email address meets basic syntax
	if (!(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(forgettenPasswordForm.email.value))){
		// add error message to errMsg variable
		errMsg = errMsg + "Invalid email address\n";	
	}	
	
	
	//test if any error messages to display
	if(errMsg == ""){
		// if error msg is empty it's ok to continue
		return true; 
	}	
	else {
		// not ok to submit form
		alert(errMsg);
		return false;	
	}
}// end of function check checkEmail
//-------------------------------------------------------------------------------------------------------------------------------



//-------------------------------------------------------------------------------------------------------------------------------





















