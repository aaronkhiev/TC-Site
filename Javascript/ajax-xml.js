function changeOpX() {
    var fireball = document.getElementById('fire');
    var invulnerability = document.getElementById('invul');
    var heal = document.getElementById('heal');

    fireball.style.opacity = '0.5';
    invulnerability.style.opacity = '0.5';
    heal.style.opacity = '0.5';
}
 
 function loadXMLData(index) {
    var xhr = new XMLHttpRequest();
    var detailsDiv = document.getElementById('sdetails');
    detailsDiv.innerHTML = '';

    xhr.onload = function() {
        if (xhr.status === 200) {
            var xml = xhr.responseXML;
            var spells = xml.getElementsByTagName('content');
            var selectedSpell = spells[index];
 
            var name = selectedSpell.getElementsByTagName('name')[0].textContent;
            var vsm = selectedSpell.getElementsByTagName('vsm')[0].textContent;
            var dice = selectedSpell.getElementsByTagName('dice')[0].textContent;
            var description = selectedSpell.getElementsByTagName('desc')[0].textContent;

            var spellDetails = document.createElement('div');
            spellDetails.innerHTML = `
                <h2>${name}</h2>
                <p><strong>VSM & Components:</strong> ${vsm}</p>
                <p><strong>Dice Rolled:</strong> ${dice}</p>
                <p><strong>Description:</strong> ${description}</p>
            `;

            detailsDiv.appendChild(spellDetails);
        }
    };
 
    xhr.open('GET', '../../Data/spells.xml', true);
    xhr.send();
 }
  
 const fireImg = document.getElementById('fire');
 fireImg.addEventListener('click', function() {
    loadXMLData(0);
    changeOpX();
    fireImg.style.opacity = '1';
 });
  
 const inImg = document.getElementById('invul');
 inImg.addEventListener('click', function() {
    loadXMLData(1);
    changeOpX();
    inImg.style.opacity = '1';
 });
  
 const healImg = document.getElementById('heal');
 healImg.addEventListener('click', function() {
    loadXMLData(2);
    changeOpX();
    healImg.style.opacity = '1';
 });
 