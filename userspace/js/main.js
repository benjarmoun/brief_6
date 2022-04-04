
function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("text");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}

function myFunction2() {
    var checkBox = document.getElementById("mybtn");
    var pass = document.getElementById("text");
    if (checkBox.checked == true){
      pass.style.display = "block";
    } else {
       pass.style.display = "none";
    }
}

function showdiv() {
    document.getElementById('welcomeDiv').style.display = "block";
}

document.getElementById("newsectionbtn").onclick = function() {
    var container = document.getElementById("container");
    var section = document.getElementById("mainsection");
    container.appendChild(section.cloneNode(true));
}

