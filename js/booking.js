document.getElementById("book").onclick=function (e) {
    e.preventDefault();

    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var phone = document.getElementById("phone").value;
    var id = document.getElementById("id").value;
    var payment = document.getElementById("payment");
    var selected = payment.options[payment.selectedIndex];

    var reName = /^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/;
    var rePhone = /^06[012345689]-[0-9]{6,7}$/;
    var errors = [];

    if (!reName.test(firstName)){
        errors.push("greska pri unosu firstName");
        document.getElementById("firstName").style.borderBottom = "3px solid red";
    }
    else {
        document.getElementById("firstName").style.borderBottom = "3px solid transparent";
    }
    if (!reName.test(lastName)){
        errors.push("greska pri unosu lastName");
        document.getElementById("lastName").style.borderBottom = "3px solid red";
    }
    else {
        document.getElementById("lastName").style.borderBottom = "3px solid transparent";
    }
    if (!rePhone.test(phone)){
        errors.push("greska pri unosu phone");
        document.getElementById("phone").style.borderBottom = "3px solid red";
    }
    else {
        document.getElementById("phone").style.borderBottom = "3px solid transparent";
    }

    if (errors.length == 0){
        $.ajax({
            url:"PHP/booking.php",
            method:"post",
            dataType:"json",
            data:{
                book:"ok",
                firstName:firstName,
                lastName:lastName,
                phone:phone,
                id:id,
                selected:selected
            },
            success:function (data) {
                alert(data);
            },
            error:function (xhr,status,errMsg) {
                alert(xhr.status);
            }
        });
    }else{
        console.log(errors);
    }

}
