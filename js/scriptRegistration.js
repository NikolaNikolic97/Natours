$("#reg").click( function (e) {
    e.preventDefault();

    var email = document.getElementById("email").value;
    var password = document.getElementById("pass").value;
    var name = document.getElementById("fullname").value;
    var vPassword = document.getElementById("vPass").value;


    var reEmail = /^[a-z][A-z0-9\.]+\@[a-z]{3,6}(\.[a-z]{2,6})+$/;
    var reName = /^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})+$/;
    var errors = [];

    if (!reName.test(name)){
        errors.push("greska pri unosu imena");
        document.getElementById("fullname").style.borderBottom = "3px solid red";
    }
    else {
        document.getElementById("fullname").style.borderBottom = "3px solid transparent";
    }
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
        document.getElementById("pass").style.borderBottom = "3px solid transparent";
    }
    if(vPassword.length < 6 || vPassword !== password ){
        errors.push("nije ista sifra");
        document.getElementById("vPass").style.borderBottom = "3px solid red";
    }
    else
    {
        document.getElementById("vPass").style.borderBottom = "3px solid transparent";
    }

    if (errors.length == 0){
        $.ajax({
            url:"PHP/registration.php",
            method:"post",
            dataType:"json",
            data:{registracija:"ok",
                name:name,
                email:email,
                pass:password,
                vPass:vPassword

            },
            success :function (data) {
                alert(data.odg);
                window.location.href = "login.php";
            },
            error :function (xhr,status,errMsg) {

                var odgovor = JSON.parse(xhr.responseText);
                switch (odgovor.greska) {
                    case '500':
                        window.location.href = "registration.php";
                        alert("greska na serveru");
                        break;
                    case '422':
                        window.location.href = "registration.php";
                        alert("lose popunjeni podaci");
                        break;
                    case '409':
                        window.location.href = "registration.php";
                        alert("korisnik vec postoji");
                        break;
                    case '404':
                        window.location.href = "registration.php";
                        alert("ne postoji ova stranica");
                        break;
                }
            }
        });
    }

});