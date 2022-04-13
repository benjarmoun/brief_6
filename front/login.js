
const form =document.querySelector('.my-form');
    form.addEventListener('submit',function (e){
        e.preventDefault();
        const Nom=document.querySelector('.nom').value;
        const Reference=document.querySelector('.ref').value;

        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");
        myHeaders.append("Cookie", "PHPSESSID=b47vcvq8gp9230rg9bsf2jlal8");

        var raw = JSON.stringify({
        "ref": Reference,
        "nom": Nom
        });

        var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
        };

        fetch("http://localhost/brief_6/php_rest_myblog/auth", requestOptions)
        .then(response => response.json())
            .then(result => {
                // console.log(result);
              localStorage.setItem('ref', JSON.stringify(result));
              window.location.href = "./home.html";
            })
            .catch(error => console.log('error', error));
        });




        // let r = JSON.parse(localStorage.getItem('ref'))
        // console.log(r);
