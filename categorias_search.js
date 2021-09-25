$(document).ready(function(){
          $('#categoria').change(function(){
              //Selected value
              var inputValue = $(this).val();
              //alert('teste: '+inputValue)
              var dados = {
                palavra : inputValue
              }
              //Ajax for calling php function
              $.post('categorias_search_return.php', { dropdownValue: dados }, function(retorna){
                  //Mostra dentro da ul os resultado obtidos 
                  $(".resultado").html(retorna);
              });
          });
      });