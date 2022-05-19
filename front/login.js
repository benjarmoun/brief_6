window.addEventListener('load', checkloggedin);
function checkloggedin() {
  if (localStorage.getItem('ref')) {
    window.location.href = './home.html';
  }
}

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
                // let r = JSON.parse(localStorage.getItem('ref'))
                console.log(r.message);
                if (result.message == 'Login Failed') {
                    alert('Login Failed');
                } else {
                if(!result.error){
              localStorage.setItem('ref', JSON.stringify(result));
              console.log(result);
              // window.location.href = "./home.html";
                }else{
                    window.location.href = "./login.html";
                    alert("aaaaa");
                }}
            })
            .catch(error => console.log('error', error));
        });
      
// check if localStorage has a ref value equal to "login failed"
// if it does, display an error message
// if it doesn't, redirect to the home page
// if (localStorage.getItem('ref') === 'login failed') {
//   alert('login failed');
//   localStorage.removeItem('ref');
// } else {
//   window.location.href = './home.html';
// }