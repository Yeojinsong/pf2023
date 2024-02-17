/*
Filename: scripts.js
Author: Dahmon Bicheno
Date Created: 8/8/2018
Date Last Updated: 23/11/2018
Last Updated By: Harris Salehi
Description: JavaScript functions for Kara House Website
Version Number: 0.4
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

function toggleSectionAccordion(id) {
    var accordion = document.getElementsByClassName(id)[0];
    var moreToggle = document.getElementsByClassName(id+'Toggles')[0].children[0].getElementsByClassName('moreToggle')[0];
    var lessToggle = document.getElementsByClassName(id+'Toggles')[0].children[0].getElementsByClassName('lessToggle')[0];

    var maxHeight = window.getComputedStyle(accordion, null).getPropertyValue("max-height");

    if (maxHeight != "0px") {
        accordion.style.maxHeight = "0";
        accordion.style.opacity = "0";

        lessToggle.style.transform = "rotateX(90deg)";
        lessToggle.style.opacity = "0";

        setTimeout(function() {
            moreToggle.style.transform = "rotateX(0)";
            moreToggle.style.opacity = "1";
        }, 500);
    } else {
        accordion.style.maxHeight = (accordion.scrollHeight + 40) + "px";
        accordion.style.opacity = "1";

        moreToggle.style.transform = "rotateX(90deg)";
        moreToggle.style.opacity = "0";

        setTimeout(function() {
            lessToggle.style.transform = "rotateX(0)";
            lessToggle.style.opacity = "1";
        }, 500);
    }
}

function toggleClientAccordion(id) {
    var accordion = document.getElementsByClassName(id)[0];
    var fade = document.getElementsByClassName('clientAccordionFade')[0];
    var moreToggle = document.getElementsByClassName('clientToggles')[0].children[0].getElementsByClassName('moreToggle')[0];
    var lessToggle = document.getElementsByClassName('clientToggles')[0].children[0].getElementsByClassName('lessToggle')[0];

    var maxHeight = window.getComputedStyle(accordion, null).getPropertyValue("max-height");

    if (maxHeight != "500px") {
        accordion.style.maxHeight = "500px";
        fade.style.opacity = "1";

        lessToggle.style.transform = "rotateX(90deg)";
        lessToggle.style.opacity = "0";

        setTimeout(function() {
            moreToggle.style.transform = "rotateX(0)";
            moreToggle.style.opacity = "1";
        }, 500);
    } else {
        accordion.style.maxHeight = (accordion.scrollHeight + 40) + "px";
        fade.style.opacity = "0";

        moreToggle.style.transform = "rotateX(90deg)";
        moreToggle.style.opacity = "0";

        setTimeout(function() {
            lessToggle.style.transform = "rotateX(0)";
            lessToggle.style.opacity = "1";
        }, 500);
    }
}

function openSectionAccordion(id) {
    // Set maxHeight and opacity
    var accordion = document.getElementsByClassName(id)[0];
    accordion.style.maxHeight = (accordion.scrollHeight + 40) + "px";
    accordion.style.opacity = "1";
    accordion.style.transitionDuration = "0s";

    // Set MoreToggle and LessToggle transform and opacity
    var moreToggle = document.getElementsByClassName(id+'Toggles')[0].children[0].getElementsByClassName('moreToggle')[0];
    var lessToggle = document.getElementsByClassName(id+'Toggles')[0].children[0].getElementsByClassName('lessToggle')[0];
    moreToggle.style.transform = "rotateX(90deg)";
    moreToggle.style.opacity = "0";
    lessToggle.style.transform = "rotateX(0)";
    lessToggle.style.opacity = "1";

    // Reset transition-duration to allow accordion functionality
    setTimeout(function() {
        accordion.style.transitionDuration = "3s";
    }, 500);
}

function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}

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


// jquery from here

$(function() {

    // escape button javascript

    // get away from the website right now
    function getAway() {
        // replace location with a different one
        window.location.replace("https://www.heraldsun.com.au/");
    }

    // click the button to leave the page
    $("#quickEscape, #navQuickEscape").on("click", function(e) {
        getAway();
    });

    // hit the escape key to leave the page
    $(document).keyup(function(e) {
        if (e.keyCode ==  27) { // keycode 27 is the escape key
            getAway();
        }
    });

});

//newsletter sign up input checker
function checkNewsLetterInput(formInput) {
	var errMsg = "";
	if(formInput.footerLastName.value =="") {
	// add error message to errMgs variable
	errMsg = errMsg + "Last name required\n";
	}
	if(!( /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/.test(formInput.footerEmail.value))) {
		errMsg = errMsg + "Email required\n";
	}
	if(!formInput.footerPolicyCheck.checked) {
		errMsg = errMsg + "Please accept our terms and conditons\n";
	}
	if(errMsg == "") {
		return true;
	} else {
		alert(errMsg);
		return false;
	}
}

//Get Involved Form input checker
function checkGetInvolvedFormInput(formInput) {
	var errMsg = "";
	if(formInput.firstName.value =="") {
	// add error message to errMgs variable
	errMsg = errMsg + "First name required\n";
	}
	if(formInput.lastName.value =="") {
	// add error message to errMgs variable
	errMsg = errMsg + "last name required\n";
	}
	if(!( /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/.test(formInput.emailAddress.value))) {
		errMsg = errMsg + "Email required\n";
	}
	if(!formInput.getInvolvedPolicyCheck.checked) {
		errMsg = errMsg + "Please accept our terms and conditons\n";
	}
	if(errMsg == "") {
		return true;
	} else {
		alert(errMsg);
		return false;
	}
}
