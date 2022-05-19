// const form =document.querySelector('.my-form');
// form.addEventListener('submit',function (e){
//         e.preventDefault();
//         const Ref=document.querySelector('.ref').value;
//         const Date=document.querySelector('.date').value;
//         const Creneau=document.querySelector('.creneau').value;
    
//         var myHeaders = new Headers();
//         myHeaders.append("Content-Type", "application/json");
//         myHeaders.append("Cookie", "PHPSESSID=b47vcvq8gp9230rg9bsf2jlal8");
        
//         var raw = JSON.stringify({
//           "ref": Ref,
//           "date": Date,
//           "creneau": Creneau
//         });
        
//         var requestOptions = {
//           method: 'POST',
//           headers: myHeaders,
//           body: raw,
//           redirect: 'follow'
//         };
        
//         fetch("http://localhost/brief_6/php_rest_myblog/addReservation", requestOptions)
//           .then(response => response.text())
//           .then(result => console.log(result))
//           .catch(error => console.log('error', error));
    
//           window.location.href = "home.html";
//     })

date.min = new Date().toISOString().split("T")[0];

let r = JSON.parse(localStorage.getItem('ref'));
document.getElementById('refe').innerHTML = r.ref;
document.getElementById('ref').value = r.ref;
document.getElementById("nom").innerHTML = r.nom;

