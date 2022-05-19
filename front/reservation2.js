const queryString = window.location.search; 
const urlParams = new URLSearchParams(queryString);
// const reff = urlParams.get('ref');
// const datt = urlParams.get('date');
// console.log(reff)
// console.log(datt)
// document.getElementById("id").value = ID;


//check if date is valid
// var dataA = [];
var myHeaders = new Headers();
myHeaders.append("Content-Type", "application/json");
myHeaders.append("Cookie", "PHPSESSID=t1ji7hl1p555j9edko23blbvfj");

var raw = JSON.stringify({
  "date": urlParams.get('date')
});

var requestOptions = {
  method: 'POST',
  headers: myHeaders,
  body: raw,
  redirect: 'follow'
};

// async function getdata() {
//     const response = await fetch("http://localhost/brief_6/php_rest_myblog/getReservations");
//     const data = await response.json();
//     console.log(data);
//     // if (dataA.message == 'Date is not valid') {
//     //     alert('Date is not valid');
//     // } else {
//     //     if (!dataA.error) {
//     //         document.getElementById("date").value = urlParams.get('date');
//     //         document.getElementById("creneau").value = urlParams.get('creneau');
//     //     } else {
//     //         window.location.href = "./login.html";
//     //         alert("aaaaa");
//     //     }
//     // }
// }

// getdata();

fetch("http://localhost/brief_6/php_rest_myblog/getDayReservations", requestOptions)
  .then(response => response.text())
  .then(result => {
    //   console.log(result)
      const myArr = JSON.parse(result);
        console.log(myArr.data);
        
        document.querySelectorAll("#creneau option").forEach(opt => {
            for(let i = 0; i < myArr.data.length; i++) {
                if(opt.value == myArr.data[i].creneau) {
                    opt.disabled = true;
                    opt.remove();
                }
            }
            // if (myArr.data[].creneau.includes(opt.value))
            // {
            //   opt.disabled = true;
            // }
        });
  })
  .catch(error => console.log('error', error));
// console.log(dataA);
//disable already reserved creneaux


let r = JSON.parse(localStorage.getItem('ref'));
document.getElementById('refe').innerHTML = r.ref;
document.getElementById("nom").innerHTML = r.nom;
// document.getElementById('ref').value = r.ref;

const form =document.querySelector('.my-form');
form.addEventListener('submit',function (e){
        e.preventDefault();
        const Ref= urlParams.get('ref');
        const Date= urlParams.get('date');
        const Creneau=document.querySelector('.creneau').value;
    
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");
        myHeaders.append("Cookie", "PHPSESSID=b47vcvq8gp9230rg9bsf2jlal8");
        
        var raw = JSON.stringify({
          "ref": Ref,
          "date": Date,
          "creneau": Creneau
        });
        
        var requestOptions = {
          method: 'POST',
          headers: myHeaders,
          body: raw,
          redirect: 'follow'
        };
        
        fetch("http://localhost/brief_6/php_rest_myblog/addReservation", requestOptions)
          .then(response => response.text())
          .then(result => console.log(result))
          .catch(error => console.log('error', error));
    
          window.location.href = "home.html";
})

