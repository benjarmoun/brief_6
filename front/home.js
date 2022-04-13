
let r = JSON.parse(localStorage.getItem('ref'))
// console.log(r);
document.getElementById('refe').innerHTML = r.ref;
document.getElementById("nom").innerHTML = r.nom;





var myHeaders = new Headers();
myHeaders.append("Content-Type", "text/plain");
myHeaders.append("Cookie", "PHPSESSID=uobkckoklbhok2hhc7m38uq5st");

var raw = JSON.stringify({
    "ref": r.ref
    });
var result = "";

var requestOptions = {
  method: 'POST',
  headers: myHeaders,
  body: raw,
  redirect: 'follow'
};

fetch("http://localhost/brief_6/php_rest_myblog/getUserReservations", requestOptions)
  .then(response => response.json())
  .then(result => 
    {
    let html = '';
    result.forEach(res => {
        if(res.creneau == 1){
            res.creneau = '9h-10h';
        }else if(res.creneau == 2){
            res.creneau = '10h-11h';
        }else if(res.creneau == 3){
            res.creneau = '11h-12h';
        }else if(res.creneau == 4){
            res.creneau = '14h-15h';
        }else if(res.creneau == 5){
            res.creneau = '15h-16h';
        }else if(res.creneau == 6){
            res.creneau = '8h-9h';
        }
        html+=`
        <tr>
            <th scope="row">${res.id}</th>
            <td>${res.date}</td>
            <td>${res.creneau}</td>
            <td class="d-flex flex-row ">
                                    <a href="editreservation.html?id=${res.id}" class="btn btn-primary mx-1 "><i class="fa fa-edit"></i></a>
                                    <!-- <a href="deletereservation.html?id=${res.id}" class="btn btn-danger mx-1">Delete</a> -->
                                    <form class="mx-1" >
                                    <!-- <input type="hidden" name="delete" value="${res.id}" >-->
                                        <button onclick="myFunction(${res.id})" class="btn  btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>  
                                </td>
        </tr>
    `
    });
    document.getElementById('tbody').innerHTML = html;
})
  .catch(error => console.log('error', error));


function myFunction($id){
    //   console.log($id);
    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");
    myHeaders.append("Cookie", "PHPSESSID=uobkckoklbhok2hhc7m38uq5st");

    var raw = JSON.stringify({
    "id": $id
    });

    var requestOptions = {
    method: 'DELETE',
    headers: myHeaders,
    body: raw,
    redirect: 'follow'
    };

    fetch("http://localhost/brief_6/php_rest_myblog/deleteReservation", requestOptions)
    .then(response => response.json())
    .then(result => console.log(result))
    .catch(error => console.log('error', error));
}

function logout(){
    localStorage.clear();
    window.location.href = "login.html";
}