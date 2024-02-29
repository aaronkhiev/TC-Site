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

function changeOp () {
    var thistle = document.getElementById('thistle');
    var verdan = document.getElementById('verdan');

    thistle.style.opacity = '0.5';
    verdan.style.opacity = '0.5';
}

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