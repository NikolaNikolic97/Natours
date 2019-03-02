document.getElementById("submit").onclick = function (e) {
    e.preventDefault();

    var email = document.getElementById("email").value;
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var phone = document.getElementById("phone").value;
    var comment = document.getElementById("comment").value;



    var reEmail = /^[a-z][A-z0-9\.]+\@[a-z]{3,6}(\.[a-z]{2,6})+$/;
    var reName = /^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/;
    var rePhone = /^06[012345689]-[0-9]{6,7}$/;
    var errors = [];

    if (!reName.test(firstName)){
        errors.push("greska pri unosu imena");
        document.getElementById("firstName").style.borderBottom = "3px solid red";
    }
    else {
        document.getElementById("firstName").style.borderBottom = "3px solid transparent";
    }
    if (!reName.test(lastName)){
        errors.push("greska pri unosu prezimena");
        document.getElementById("lastName").style.borderBottom = "3px solid red";
    }
    else {
        document.getElementById("lastName").style.borderBottom = "3px solid transparent";
    }
    if (!reEmail.test(email)){
        errors.push("lose unet mail");
        document.getElementById("email").style.borderBottom = "3px solid red";
    }
    else
    {
        document.getElementById("email").style.borderBottom = "3px solid transparent";
    }
    if (!rePhone.test(phone)){
        errors.push("greska pri unosu imena");
        document.getElementById("phone").style.borderBottom = "3px solid red";
    }
    else {
        document.getElementById("phone").style.borderBottom = "3px solid transparent";
    }
    if(comment.length == 0){
        errors.push("morate uneti comment");
        document.getElementById("comment").style.borderBottom = "3px solid red";
    }
    else
    {
        document.getElementById("comment").style.borderBottom = "3px solid transparent";
    }

    if (errors.length == 0){
        $.ajax({
            url:"PHP/contact.php",
            method:"post",
            dataType:"json",
            data:{contact:"ok",
                firstName:firstName,
                lastName:lastName,
                email:email,
                phone:phone,
                comment:comment
            },
            success :function (data) {
                alert(data.odg);
                window.location.href="contact.php";
            },
            error :function (xhr,status,errMsg) {
                console.log(xhr.responseText);
            }
        });
    }

}