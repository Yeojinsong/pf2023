/*
Filename: scripts.js
Author: Dahmon Bicheno
Date Created: 8/8/2018
Date Last Updated:
Last Updated By:
Description: JavaScript functions for Kara House Website
Version Number: 0.1
*/

function toggleAccordion(id) {
	var accordion = document.getElementsByClassName(id)[0];
	var accordionArrow = accordion.previousElementSibling.children[0].children[1];

	var maxHeight = window.getComputedStyle(accordion, null).getPropertyValue("max-height");

    if (maxHeight != "0px") {
        accordion.style.maxHeight = "0";
        accordion.style.opacity = "0";
        accordion.style.padding = "0";
        accordionArrow.style.transform = "rotate(0deg)";
    } else {
        accordion.style.maxHeight = (accordion.scrollHeight + 40) + "px";
        accordion.style.opacity = "1";
        accordion.style.padding = "20px 0";
        accordionArrow.style.transform = "rotate(-180deg)";
    }
}

function checkLogin(adminLogin) {
	// set up a variable to store error messages
	var errMsg = "";
	var re = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	// test that email address meets basic syntax
	if (!(re.test(adminLogin.email.value))) {
		// add error message to errMsg variable
		errMsg = errMsg + "Invalid email address\n";
	}

	// Test passord meets proper constraints
	if (adminLogin.password.value.length < 7 || adminLogin.password.value.length > 12) {
		errMsg = errMsg + "Password must be between 7 and 12 characters long\n";
	}

	// Test if there are any error messages to display
	if (errMsg == "") {
		// okay to submit form
		return true;
	} else {
		// not okay to submit form
		alert(errMsg);

		return false;
	}
}

function checkEmail(forgottenPasswordForm) {
	// set up a variable to store error messages
	var errMsg = "";
	var re = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	// test that email address meets basic syntax
	if (!(re.test(forgottenPasswordForm.email.value))) {
		// add error message to errMsg variable
		errMsg = errMsg + "Invalid email address\n";
	}

	// Test if there are any error messages to display
	if (errMsg == "") {
		// okay to submit form
		return true;
	} else {
		// not okay to submit form
		alert(errMsg);

		return false;
	}
}

function checkUpdatePassword(updatePass) {
	// set up a variable to store error messages
	var errMsg = "";

	// Test passord meets proper constraints
	if (updatePass.newPassword.value.length < 8) {
		errMsg = errMsg + "Password must be at least 8 characters long\n";
	}	else if (updatePass.newPassword.value != updatePass.newPasswordConfirm.value) {
		errMsg = errMsg + "Old Passwords do not match\n";
	}

	// Test if there are any error messages to display
	if (errMsg == "") {
		// okay to submit form
		return true;
	} else {
		// not okay to submit form
		alert(errMsg);

		return false;
	}
}

$(function() {
	// opens the modal
	// $(".modalOpen").ready(function() {
	// 	$(".modal").fadeToggle("slow", "linear", function() {
	// 		$(".modalContent").slideToggle("slow");
	// 	});
	// });

	// This script is for the CMS dropdown navs

	var dropdown = document.getElementsByClassName("dropdown-btn");
	var i;

	for (var i = 0; i < dropdown.length; i++) {
		dropdown[i].addEventListener("click", function() {


			this.classList.toggle("active");

			var dropdownContent = this.nextElementSibling;
			if (dropdownContent.style.display ==="block") {
				dropdownContent.style.display = "none";
			} else {
				dropdownContent.style.display = "block";
			}
		});
	};
});

function enableForm(formNbr) {
	document.getElementById('form' + formNbr).disabled = false;
	document.getElementById('edit' + formNbr).style.display = "none";
	document.getElementById('submit' + formNbr).style.display = "inline-block";
	document.getElementById('cancel' + formNbr).style.display = "inline-block";
	document.getElementById('deleteForm' + formNbr).style.display = "none";
}

function disableForm(formNbr) {
	document.getElementById('form' + formNbr).disabled = true;
	document.getElementById('edit' + formNbr).style.display = "inline-block";
	document.getElementById('submit' + formNbr).style.display = "none";
	document.getElementById('cancel' + formNbr).style.display = "none";
	document.getElementById('deleteForm' + formNbr).style.display = "inline";
}

function checkDelete() {
	return(confirm('Are you sure you want to delete this item from the Database?' + '\n' + 'This cannot be undone, consider disabling the item instead.'));
}