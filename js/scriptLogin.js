document.getElementById("submit").onclick = function (e) {
    e.preventDefault();

    var email = document.getElementById("email").value;
    var password = document.getElementById("pass").value;


    var reEmail = /^[a-z][A-z0-9\.]+\@[a-z]{3,6}(\.[a-z]{2,6})+$/;
var errors = [];

    if (!reEmail.test(email)){
        errors.push("lose unet mail");
        document.getElementById("email").style.borderBottom = "3px solid red";
    }
    else
    {
        document.getElementById("email").style.borderBottom = "3px solid transparent";
    }
    if(password.length < 6){
        errors.push("lose unet password");
        document.getElementById("pass").style.borderBottom = "3px solid red";
    }
    else
    {
        document.getElementById("email").style.borderBottom = "3px solid transparent";
    }


    if (errors.length == 0){
        $.ajax({
            url:"http://localhost/PHPsajt/PHP/login.php",
            method:"post",
            dataType:"json",
            data:{
                submit:"poslato",
                email:email,
                pass:password

            },
            success:function (podaci) {
                window.location.href = podaci.lokacija;
            },
            error:function (xhr,status,errMsg) {

               var odgovor = JSON.parse(xhr.responseText);

                switch (odgovor.greska) {
                    case '500':
                        window.location.href = "login.php";
                        alert("greska na serveru");
                        break;
                    case '422':
                        window.location.href = "login.php";
                        alert("lose popunjeni podaci");
                        break;
                    case '409':
                        window.location.href = "login.php";
                        alert("korisnik vec postoji");
                        break;
                    case '404':
                        window.location.href = "login.php";
                        alert("ne postoji ova stranica");
                        break;
                }
            }
        });
    }

};