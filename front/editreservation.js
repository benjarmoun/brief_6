date.min = new Date().toISOString().split("T")[0];

let r = JSON.parse(localStorage.getItem('ref'));
document.getElementById('refe').innerHTML = r.ref;
document.getElementById("nom").innerHTML = r.nom;


const form =document.querySelector('.my-form');
form.addEventListener('submit',function (e){
        e.preventDefault();
        const id=document.querySelector('.id').value;
        const Date=document.querySelector('.date').value;
        const Creneau=document.querySelector('.creneau').value;

        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");
        myHeaders.append("Cookie", "PHPSESSID=uobkckoklbhok2hhc7m38uq5st");

        var raw = JSON.stringify({
        "id": id,
        "date": Date,
        "creneau": Creneau
        });

        var requestOptions = {
        method: 'PUT',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
        };

        fetch("http://localhost/brief_6/php_rest_myblog/updateReservation", requestOptions)
        .then(response => response.text())
        .then(result => console.log(result))
        .catch(error => console.log('error', error));

        window.location.href = "home.html";

    })

    const queryString = window.location.search; 
    const urlParams = new URLSearchParams(queryString);
    const ID = urlParams.get('id');
    console.log(ID)
    document.getElementById("id").value = ID;