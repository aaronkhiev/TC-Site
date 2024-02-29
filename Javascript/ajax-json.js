function makeRequestJ(index) {
    var xhr = new XMLHttpRequest();
    
    xhr.onload = function() {
        if (xhr.status === 200) {
            responseObject = JSON.parse(xhr.responseText);
            var newContent = '';
            
            for (var i = 0; i < responseObject.npc.length; i++) {
                if (index == 0) {
                    newContent += '<h3>' + responseObject.npc[0].name + '<h3>';
                    newContent += '<p>' + responseObject.npc[0].description + '<p>'
                }
                if (index == 1) {
                    newContent += '<h3>' + responseObject.npc[1].name + '<h3>';
                    newContent += '<p>' + responseObject.npc[1].description + '<p>'
                }
                if (index == 2) {
                    newContent += '<h3>' + responseObject.npc[2].name + '<h3>';
                    newContent += '<p>' + responseObject.npc[2].description + '<p>'
                }
            }
            document.getElementById('ndetails').innerHTML = newContent;
        }
    };
    
    xhr.open('GET', '../../Data/npc-data.json', true);
    
    xhr.send(null);
}

function changeOpJ() {
    var nora = document.getElementById('nora');
    var finn = document.getElementById('finn');
    var tenti = document.getElementById('tenti');

    nora.style.opacity = '0.5';
    finn.style.opacity = '0.5';
    tenti.style.opacity = '0.5';
}
document.getElementById("nora").addEventListener("click", function() {
    makeRequestJ(0);
    changeOpJ();
    document.getElementById("nora").style.opacity = 1;
});

document.getElementById("finn").addEventListener("click", function() {
    makeRequestJ(1);
    changeOpJ();
    document.getElementById("finn").style.opacity = 1;
});

document.getElementById("tenti").addEventListener("click", function() {
    makeRequestJ(2);
    changeOpJ();
    document.getElementById("tenti").style.opacity = 1;
});