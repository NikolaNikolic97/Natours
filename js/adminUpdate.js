document.getElementById("submit").onclick = function (e) {
    e.preventDefault();

    var email = document.getElementById("email").value;
    var name = document.getElementById("fullname").value;
    var uloga = document.getElementById("uloga");
    var selektovan = uloga.options[uloga.selectedIndex].value;
    var idKorisnika = document.getElementById("idKorisnika").value;
    var ch = document.getElementById("ch");
    var aktivan = 0;



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
    if (ch.checked){
         aktivan = 1;
    }

    console.log(errors);

    if (errors.length == 0){
        $.ajax({
            url:"PHP/adminUpdate.php",
            method:"post",
            dataType:"json",
            data:{submit:"ok",
                name:name,
                email:email,
                uloga:selektovan,
                idKorisnika:idKorisnika,
                aktivan:aktivan

            },
            success :function (data) {
                window.location.href = "http://localhost/PHPsajt/admin.php";
                alert("uspesno izvrsena izmena");
            },
            error :function (xhr,status,errMsg) {

                var odgovor = JSON.parse(xhr.responseText);
                switch (odgovor.code) {
                    case '500':
                        window.location.href = "http://localhost/PHPsajt/admin.php";
                        alert("greska na serveru");
                        break;
                    case '422':
                        window.location.href = "http://localhost/PHPsajt/admin.php";
                        alert("lose popunjeni podaci");
                        break;
                    case '409':
                        window.location.href = "http://localhost/PHPsajt/admin.php";
                        alert("korisnik vec postoji");
                        break;
                    case '404':
                        window.location.href = "http://localhost/PHPsajt/admin.php";
                        alert("ne postoji ova stranica");
                        break;
                }
            }
        });
    }

}