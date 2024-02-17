// Get all div elements inside the #work_img
var workDivs = document.querySelectorAll('#work_img > div');

// Add a mouseover event listener to each div
workDivs.forEach(function (div) {
    div.addEventListener('mouseover', function () {
        // Generate a random HSL color
        var randomHue = Math.floor(Math.random() * 360);
        var randomSaturation = Math.floor(Math.random() * 100);
        var randomLightness = Math.floor(Math.random() * 50) + 50; // Ensuring a minimum lightness for better visibility

        // Remove the existing 'hovered' class from all divs
        workDivs.forEach(function (div) {
            div.classList.remove('hovered');
        });

        // Add the 'hovered' class to the current div
        this.classList.add('hovered');
    });

    // Add a mouseout event listener to each div
    div.addEventListener('mouseout', function () {
        // Remove the 'hovered' class when the mouse leaves the div
        this.classList.remove('hovered');
    });
});
