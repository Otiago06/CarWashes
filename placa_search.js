$(document).ready(function(){
          $("#placa").change(function(){          
            var placa = $(this).val()        
            if(placa != ''){
              var dados = {
                palavra : placa
            }
            $.ajax({ url: 'placa_search_return.php', method: 'POST', dataType: 'json', data: dados }).done(function (retorno) {
                console.info(retorno)
                $("#modelo").val(retorno[0].modelo);
                $("#cor").val(retorno[0].cor);
                $("#categoria").val(retorno[0].categoria);
                $("#categoria").trigger('change');
            }).fail(function (retorno) {
            console.error(retorno)
            })
          }
        });
      });