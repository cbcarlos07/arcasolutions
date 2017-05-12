/**
 * Created by carlos on 11/05/17.
 */

$(function() {

    $('#category').multiselect({

        includeSelectAllOption: true

    });

    $('.btn-save').click(function() {
        var valores = $('#category').val();
       // alert(valores);
        if(valores == "" ){
          //  alert('Vazio');
         $('#myModal').modal();
         return false;
        }else{
            jQuery('#business').submit(function () {
                var title = document.getElementById('title').value;
                var phone = document.getElementById('phone').value;
                var address = document.getElementById('address').value;
                var zipcode = document.getElementById('zipcode').value;
                var city = document.getElementById('city').value;
                var state = document.getElementById('state').value;
                var descricao = document.getElementById('descricao').value;

                var valores = $('#category').val();

                var result = [];

                valores.forEach(function(value) {
                    result.push({id: value});
                });

                // Converte o objeto para JSON:
                var categoria = JSON.stringify(result);

                // Exibe o resultado em JSON:
                // console.log(json);

                $.ajax({
                    type : 'post',
                    dataType : 'json',
                    url : '../function/empresa.php',
                    beforeSend : carregando,
                    data : {
                        title : title,
                        phone : phone,
                        address : address,
                        zipcode : zipcode,
                        city : city,
                        state : state,
                        descricao : descricao,
                        categoria : categoria
                    },

                    success: function( data )
                    {
                        console.log("Retorno: "+data.retorno);
                        if (data.retorno === "1") {
                            sucesso('Opera&ccedil;&atilde;o realizada com sucesso!');
                        }
                        else {
                            errosend('N&atilde;o foi poss&iacute;vel realizar opera&ccedil;&atilde;o. Verifique se todos os campos est&atilde;o preenchidos ');
                        }
                    }

                });

                return false;


            });
        }






    });

});



function carregando(){
    var mensagem = $('.mensagem');
    //alert('Carregando: '+mensagem);
    mensagem.empty().html('<p class="alert alert-warning">Verificando dados!</p>').fadeIn("fast");
    setTimeout(function (){

    },300);

}

function errosend(msg){
    var mensagem = $('.mensagem');
    mensagem.empty().html('<p class="alert alert-danger"><strong>Opa! </strong>'+msg+'</p>').fadeIn("fast");
}
function sucesso(msg){
    //alert("Mensagem: "+msg);
    var mensagem = $('.mensagem');
    mensagem.empty().html('<p class="alert alert-success"><strong>OK. </strong>'+msg+'</p>').fadeIn("fast");
    setTimeout(function (){
        var form = $('<form action="adminlist.php" method="post">' +
            '</form>');
        $('body').append(form);
        form.submit();
    },2000);
}

$('#zipcode').focusout(function () {
    //Nova variável "cep" somente com dígitos.
    var valcep = document.getElementById("zipcode").value;
    var cep = valcep.replace(".","").replace("-","");
    var city = $("#city");
    var state = $("#state");

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.

            city.find("option").remove();
            city.append("...");
            state.find("option").remove();
            state.append("...");
            $("#address").val("...");

            //Consulta o webservice viacep.com.br/
            $.ajax({
                url: 'http://correiosapi.apphb.com/cep/'+cep,
                dataType: 'jsonp',
                crossDomain: true,
                contentType: "application/json",
                statusCode: {
                    200: function(data) {
                        console.log(data);
                        city.find("option").remove();
                        city.append('<option value="'+data.cidade+'">'+data.cidade+'</option>');
                        state.find("option").remove();
                        state.append('<option value="'+data.estado+'">'+data.estado+'</option>');
                        $("#address").val(data.tipoDeLogradouro+" "+data.logradouro+' - '+data.bairro);

                    } // Ok
                    ,400: function(msg) { console.log(msg);  } // Bad Request
                    ,404: function(msg) { console.log("CEP não encontrado!!"); } // Not Found
                }
            })
        } //end if.
        else {
            //cep é inválido.
            limpa_formulario_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulario_cep();
    }
});

function limpa_formulario_cep() {
    // Limpa valores do formulário de cep.
    var city = $("#city");
    var state = $("#state");
    city.find("option").remove();
    city.append("City");
    state.find("option").remove();
    state.append("State");
    $("#address").val("");
}


$(document).ready(function(){
    $('#zipcode').mask('00.000-000');

});
