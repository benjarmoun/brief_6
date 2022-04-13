


// program to generate random strings

// declare all characters
const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

function generateString(length) {
    let result = '';
    const charactersLength = characters.length;
    for ( let i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }

    return result;
}

document.getElementById('ref').value = generateString(6);

date_naissance.max = new Date().toISOString().split("T")[0];

const form =document.querySelector('.my-form');
    form.addEventListener('submit',function (e){
        e.preventDefault();
        const Nom=document.querySelector('.nom').value;
        const Prenom=document.querySelector('.prenom').value;
        const Naissance=document.querySelector('.date_naissance').value;
        const ref=document.querySelector('.ref').value;

        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");
        myHeaders.append("Cookie", "PHPSESSID=fi7p6mbd7il03lkv8gr0npm5k9");

        var raw = JSON.stringify({
        "ref": ref,
        "nom": Nom,
        "prenom": Prenom,
        "date_naissance": Naissance
        });

        var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
        };

        fetch("http://localhost/brief_6/php_rest_myblog/addUser", requestOptions)
        .then(response => response.text())
        .then(result => alert(result))
        .catch(error => console.log('error', error));
    })
