$('input:submit[name=anketa]').on('click',function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var radio = document.getElementsByName("radio"+id);
    for(var i=0;i<radio.length;i++){
        if(radio[i].checked){
            var odgovor=radio[i].value;

        }
    }
    $.ajax({
        url:"PHP/anketa.php",
        method:"post",
        dataType:"json",
        data:{
            anketa:"ok",
            id:id,
            odgovor:odgovor
        },
        success:function (data) {
            alert(data.odg);
        },
        error:function (xhr,status,errMes) {
            alert("you are already vote");
        }
    });
})