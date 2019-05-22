function auth(){
    var password = prompt('Ingrese su contraseña');
    if(password != ".fiscalia.2019.")
        auth();
}

$(document).ready(function () {
    $("#username").blur(function () { 
        if($("#username").val() == ""){
            $("#alert-login").html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><span>Debe ingresar su nombre de usuario</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }
    });
    $("#password").blur(function () { 
        if($("#password").val() == ""){
            $("#alert-login").html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><span>Debe ingresar su contraseña</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        }
    });
    $("#button-login").click(function () { 
        if($("#username").val() != "" && $("#password").val() != ""){
            loguearse();
        }
    });
    function loguearse() {
        var usuario = $("#form-login").serialize();
        $.ajax({
            type: "POST",
            url: "controllers/Usuario.php?peticion=login",
            data: usuario,
            success: function (response) {
                if(response == "correcto"){
                    location.href ="views/vacaciones/personal";
                }else{
                    $("#alert-login").html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><span>'+ response + '</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                }
            }
        });    
    }
    
});

//auth();