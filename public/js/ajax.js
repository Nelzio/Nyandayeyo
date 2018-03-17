$(document).ready(function(){

//==================formulario

//Distrito e bairro
    $("select.selecionar").change(function() {
        if($(this).val() === "1"){
            $("#bairro").empty();
            var id_distrito=1;
            $.ajax({
                    url: "/listbairro",
                    method:'POST',
                    data:{id_distrito:id_distrito},
                    crossDomain: true,
                    dataType: "json",
                    success:function(data){
                        $.each(data, function(idx, obj){
                        $("#bairro").append('<option value="'+obj.id+'">'+obj.nome+'</option>');
                    });
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Erro a exibir imagens");
                    }
                });
        }
        else if($(this).val() === "2"){
             $("#bairro").empty();
            var id_distrito=2;
            $.ajax({
                    url: "/listbairro",
                    method:'POST',
                    data:{id_distrito:id_distrito},
                    crossDomain: true,
                    dataType: "json",
                    success:function(data){
                        $.each(data, function(idx, obj){
                        $("#bairro").append('<option value="'+obj.id+'">'+obj.nome+'</option>');
                    });
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Erro a exibir imagens");
                    }
                });
        }
        else {
            $("#bairro").empty();
            $("#bairro").append('<option value="1">Heeee</option>\n\
                                    <option value="2">heeeee</option>');
        }
    });
        $("select.selecionar").change();


//=====================================+Insert================================
    $("#formDenuncia").submit(function(event){
        event.preventDefault();
        //alert("deu");
        $.ajax({
            url:'/insertDenuncia',
            method:'POST',
            data:new FormData(this),
            contentType:false,
            processData:false,
            success:function(data){
                alert("Certo");
                alert(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Erro ao inserir");
            }
        });
    });

});
