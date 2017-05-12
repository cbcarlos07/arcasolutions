/**
 * Created by carlos on 11/05/17.
 */

$('.btn-search').on('click',function () {

   var find = document.getElementById('find').value;
   if(find == ""){
       $('#myModal').modal();
       document.getElementById('find').focus();

   }else{
       var form = $('<form action="search.php" method="post">'+
                   '<input type="hidden" name="find" value="'+find+'" > '+
                    '</form>');
       $('body').append(form);
       form.submit();
   }
});

$('.btn-logar').on('click',function () {

  jQuery('#form').submit(function () {
      var username = document.getElementById('username').value;
      var password = document.getElementById('password').value;
      $.ajax({
          dataType  : 'json',
          type      : 'post',
          url       : '../function/usuario.php',
          beforeSend: carregando,
          data: {
              username : username,
              password : password
          },
          success: function (data) {
              if(data.retorno === 1){
                  sucesso();
              }
              else{
                  errosend();;
              }
          }

      });
      return false;
  });

});

function carregando(){
    var mensagem = $('.mensagem');
    //alert('Carregando: '+mensagem);
    mensagem.empty().html('<p class="alert alert-warning">Checking data!</p>').fadeIn("fast");
    setTimeout(function (){

    },300);

}

function errosend(){
    var mensagem = $('.mensagem');
    mensagem.empty().html('<p class="alert alert-danger"><strong>Oops!</strong> Please, verify your username and password</p>').fadeIn("fast");
}
function sucesso(msg){
    var mensagem = $('.mensagem');
    mensagem.empty().html('<p class="alert alert-success"><strong>Success</strong> Redirecting </p>').fadeIn("fast");
    var url = 'adminlist.php';
    var form = $('<form action="' + url + '" method="post">' +

        '</form>');
    $('body').append(form);
    form.submit();
}

$(document).keypress(function(e) {
    if(e.which == 13) $('.btn-search').click();
});



