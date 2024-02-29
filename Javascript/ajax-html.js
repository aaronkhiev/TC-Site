function makeRequest1() {
    var xhr = new XMLHttpRequest();
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('details').innerHTML = xhr.responseText;
        }
    };
    
    xhr.open('GET', '../Data/this-data.html', true);
    
    xhr.send(null);
}

function makeRequest2() {
    var xhr = new XMLHttpRequest();
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('details').innerHTML = xhr.responseText;
        }
    };
    
    xhr.open('GET', '../Data/ver-data.html', true);
    
    xhr.send(null);
}

function changeOp () {
    var thistle = document.getElementById('thistle');
    var verdan = document.getElementById('verdan');

    thistle.style.opacity = '0.5';
    verdan.style.opacity = '0.5';
}

document.getElementById("thistle").addEventListener("click", function() {
    makeRequest1();
    changeOp();
    document.getElementById("thistle").style.opacity = 1;
    deselect
});

document.getElementById("verdan").addEventListener("click", function() {
    makeRequest2();
    changeOp();
    document.getElementById("verdan").style.opacity = 1;
});