
date.min = new Date().toISOString().split("T")[0];

let r = JSON.parse(localStorage.getItem('ref'));
document.getElementById('refe').innerHTML = r.ref;
document.getElementById('ref').value = r.ref;
document.getElementById("nom").innerHTML = r.nom;

