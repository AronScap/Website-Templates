    
    

    <script src="js/chosen.jquery.js" type="text/javascript"></script>
    
    <script type="text/javascript"> 
        var config = {
          '.chosen-select'           : {},
          '.chosen-select-deselect'  : {allow_single_deselect:true},
          '.chosen-select-no-single' : {disable_search_threshold:10},
          '.chosen-select-no-results': {no_results_text:'Nenhum resultado!'},
          '.chosen-select-width'     : {width:"95%"}
        }

        for (var selector in config) {
          $(selector).chosen(config[selector]);
        }
    </script>  

    <?php if (isset($_GET['go'])): ?>
        <?php if ($_GET['go'] == 'tarefas'): ?>
            <script type="text/javascript">
                $('#id_profissional1').trigger('chosen:activate'); 
            </script>
        <?php endif ?>
        
    <?php endif ?>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script> 
    <script>
      $(document).foundation();
      $(document).ready(function() { 
        function limpa_formulário_cep() {
          // Limpa valores do formulário de cep.
          $("#rua").val("");
          $("#rua2").val("");
          $("#bairro").val("");
          $("#municipio2").val("");
          $("#municipio").val("");
          $("#cep").val(""); 
          $("#cep2").val(""); 
          $("#cidade").val(""); 
          $("#estado2").val("")
          $("#estado").val("")
          $("#uf").val("");
          $("#ibge").val("");
          // $("#idSave").attr('disabled', 'disabled');
        } 
        $("#cep2").blur(function() { 
            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, ''); 
            //Verifica se campo cep possui valor informado.
            if (cep != "") { 
                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/; 
                //Valida o formato do CEP.
                if(validacep.test(cep)) { 
                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...")
                    $("#bairro").val("...")
                    $("#municipio2").val("...")
                    $("#municipio").val("...")
                    $("#cidade").val("...")
                    $("#estado2").val("...")
                    $("#estado").val("...")
                    $("#uf").val("...")
                    $("#ibge").val("...") 
                    $("#rua2").val("...")
                    $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) { 
                        if (!("erro" in dados)) { 
                            $("#bairro").val(dados.bairro); 
                            $("#uf").val(dados.uf);
                            $("#ibge").val(dados.ibge);  
                              
                            // if(dados.localidade != '')$("#municipio2").attr('disabled', 'disabled'); 
                            // if(dados.uf != '')$("#estado2").attr('disabled', 'disabled');    
                            // if(dados.logradouro != '')$("#rua2").attr('disabled', 'disabled');            
                            $("#municipio").val(dados.localidade);
                            $("#estado").val(dados.uf); 
                            $("input#rua").val( dados.logradouro );
                            $("#municipio2").val(dados.localidade);
                            $("#estado2").val(dados.uf); 
                            $("input#rua2").val( dados.logradouro ); 
                            for(var i=0;i<dados.logradouro.length;i++){
                               if(dados.logradouro[i]=='-')break;
                            }
                            var str = document.getElementById("rua").value; 
                            var res = str.substr(0,i);
                            document.getElementById("rua").value = res;

              

                            $("input#bairro").val( result.bairro );
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            document.getElementById("modalcepne1").style.display = "block";
                            document.getElementById("modalcepne").style.display = "block"; 
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    document.getElementById("modalcepf1").style.display = "block";
                    document.getElementById("modalcepf").style.display = "block"; 
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
        $("#cep").blur(function() { 
            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, ''); 
            //Verifica se campo cep possui valor informado.
            if (cep != "") { 
                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/; 
                //Valida o formato do CEP.
                if(validacep.test(cep)) { 
                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...")
                    $("#bairro").val("...")
                    $("#municipio2").val("...")
                    $("#municipio").val("...")
                    $("#cidade").val("...")
                    $("#estado2").val("...")
                    $("#estado").val("...")
                    $("#uf").val("...")
                    $("#ibge").val("...") 
                    $("#rua2").val("...")
                    $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) { 
                        if (!("erro" in dados)) { 
                            $("#bairro").val(dados.bairro); 
                            $("#uf").val(dados.uf);
                            $("#ibge").val(dados.ibge);  
                              
                            if(dados.localidade != '')$("#municipio2").attr('disabled', 'disabled');
                            if(dados.uf != '')$("#estado2").attr('disabled', 'disabled');    
                            if(dados.logradouro != '')$("#rua2").attr('disabled', 'disabled');            
                            $("#municipio").val(dados.localidade);
                            $("#estado").val(dados.uf); 
                            $("input#rua").val( dados.logradouro );
                            $("#municipio2").val(dados.localidade);
                            $("#estado2").val(dados.uf); 
                            $("input#rua2").val( dados.logradouro ); 
                            for(var i=0;i<dados.logradouro.length;i++){
                               if(dados.logradouro[i]=='-')break;
                            }
                            var str = document.getElementById("rua").value; 
                            var res = str.substr(0,i);
                            document.getElementById("rua").value = res;

              

                            $("input#bairro").val( result.bairro );
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            document.getElementById("modalcepne1").style.display = "block";
                            document.getElementById("modalcepne").style.display = "block"; 
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    document.getElementById("modalcepf1").style.display = "block";
                    document.getElementById("modalcepf").style.display = "block"; 
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
      });
    </script>
  </body>
</html>
