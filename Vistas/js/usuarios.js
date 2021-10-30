$(".T").on("click", ".EditarUsuario", function(){

    var Uid = $(this).attr("Uid");

    var datos = new FormData();
    datos.append("Uid", Uid);

    $.ajax({

        url: "Ajax/usuariosA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success: function(resultado){

            $("#Uid").val(resultado["id"]);

            $("#apellidoEU").val(resultado["apellido"]);
            $("#nombreEU").val(resultado["nombre"]);
            $("#usuarioEU").val(resultado["carnet"]);
            $("#claveEU").val(resultado["clave"]);

            if(resultado["rol"]== "Administrador"){
                $("#carrera").hide();
            }else{
                $("#carrera").show();
            }

            $("#rolActual").html("Rol actual: "+resultado["rol"]);
            
            $("#rol").val(resultado["rol"]);
            $("#rol").hide();

            $("#carr").val(resultado["id_carrera"]);
            $("#carr").hide();

        }
    })
})


$(".T").on("click", ".EliminarUsuario", function(){

    var Uid = $(this).attr("Uid");

    window.location = "index.php?url=usuarios&Uid="+Uid;
})


$("#carnet").change(function(){

    $(".alert").remove();

    var carnet = $(this).val();
    var datos = new FormData();
    datos.append("verificarCarnet", carnet);

    $.ajax({
        url: "Ajax/usuariosA.php",
        method: "POST",
        data: datos,
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,

        success:function(resultado){
            if(resultado){
                $("#carnet").parent().after('<div class="alert alert-danger">El carnet ya existe</div>');
                $("#carnet").val("");
            }
        }
    })
})