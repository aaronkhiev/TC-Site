
// Taking after the lab, I will be using something similar to describe the content on the page through the request function.
// This code uses the standard format for making a request on an event.
function makeRequest(path) {
    var xhr = new XMLHttpRequest();
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('details').innerHTML = xhr.responseText;
        }
    };
    
    xhr.open('GET', path, true);
    
    xhr.send(null);
}

// Simply changes opacity of the image. Since I can't find a specific use for AJAX since this is an info/wiki based blog, I'll be keeping it simple.
function changeOp () {
    var thistle = document.getElementById('thistle');
    var verdan = document.getElementById('verdan');

    thistle.style.opacity = '0.5';
    verdan.style.opacity = '0.5';
}

// On each event trigger when clicking the image, the path is sent to the function and run.
document.getElementById("thistle").addEventListener("click", function() {
    makeRequest('../../Data/this-data.html');
    changeOp();
    document.getElementById("thistle").style.opacity = 1;
});

document.getElementById("verdan").addEventListener("click", function() {
    makeRequest('../../Data/ver-data.html');
    changeOp();
    document.getElementById("verdan").style.opacity = 1;
});