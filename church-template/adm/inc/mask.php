<script>
function a(id) 
{
    var n=document.getElementById(id);
    var re=/^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/;

    if(re.test(n.value))
    {
        n.style.backgroundColor="#52F40C";
    }
    else
    {
        window.alert("Invalid Entry");
        n.style.backgroundColor="#F40C0C";
        n.focus();
        n.value="";
    }
}
function Mascara_Hora(Hora){ 
  var hora01 = ''; 
  hora01 = hora01 + Hora; 
  if (hora01.length == 2){ 
  hora01 = hora01 + ':'; 
  document.forms[0].Hora.value = hora01; 
  } 
  if (hora01.length == 5){ 
  Verifica_Hora(); 
  } 
  } 
             
  function Verifica_Hora(){ 
  hrs = (document.forms[0].Hora.value.substring(0,2)); 
  min = (document.forms[0].Hora.value.substring(3,5)); 
                 
  estado = ""; 
  if ((hrs < 00 ) || (hrs > 23) || ( min < 00) ||( min > 59)){ 
  estado = "errada"; 
  } 
                 
  if (document.forms[0].Hora.value == "") { 
  estado = "errada"; 
  } 
   
  if (estado == "errada") { 
  alert("Hora inválida!"); 
  document.forms[0].Hora.focus(); 
  } 
} 

function validarCNPJ(cnpj2,id) {
    cnpj = document.getElementById(cnpj2).value;
    cnpj = cnpj.replace(/[^\d]+/g,'');
    //alert(cnpj);
    if(cnpj == '') 
        return false; 
    if (cnpj.length != 14){
        document.getElementById(cnpj2).value ='';
        return document.getElementById(id).innerHTML = "<b style='color:red'>CNPJ inválido</b>";
    } 
    if (cnpj == "00000000000000" || cnpj == "11111111111111" || cnpj == "22222222222222" || cnpj == "33333333333333" || cnpj == "44444444444444" || cnpj == "55555555555555" || cnpj == "66666666666666" || cnpj == "77777777777777" || cnpj == "88888888888888" || cnpj == "99999999999999"){
        document.getElementById(cnpj2).value ='';
        return document.getElementById(id).innerHTML = "<b style='color:red'>CNPJ inválido</b>";
    } 
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0)){
        document.getElementById(cnpj2).value ='';
        return document.getElementById(id).innerHTML = "<b style='color:red'>CNPJ inválido</b>";
    } 
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1)){
        document.getElementById(cnpj2).value ='';
        return document.getElementById(id).innerHTML = "<b style='color:red'>CNPJ inválido</b>";
    } 
    return document.getElementById(id).innerHTML = "";     
}
function limpa(id){
    document.getElementById(id).innerHTML = '';

}
function validarCPF(cpf2,id) {  
    cpf = document.getElementById(cpf2).value;
    cpf = cpf.replace(/[^\d]+/g,'');    
    if(cpf == '') return false; 
    // Elimina CPFs invalidos conhecidos    
    if (cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999"){
        document.getElementById(cpf2).value ='';
        return document.getElementById(id).innerHTML = "<b style='color:red'>CPF inválido</b>"; 
    }
    // Valida 1o digito 
    add = 0;    
    for (i=0; i < 9; i ++)       
        add += parseInt(cpf.charAt(i)) * (10 - i);  
        rev = 11 - (add % 11);  
        if (rev == 10 || rev == 11)     
            rev = 0;    
        if (rev != parseInt(cpf.charAt(9)))   {
            document.getElementById(cpf2).value ='';
            return document.getElementById(id).innerHTML = "<b style='color:red'>CPF inválido</b>"; 
        }  
              
    // Valida 2o digito 
    add = 0;    
    for (i = 0; i < 10; i ++)        
        add += parseInt(cpf.charAt(i)) * (11 - i);  
    rev = 11 - (add % 11);  
    if (rev == 10 || rev == 11) 
        rev = 0;    
    if (rev != parseInt(cpf.charAt(10))){
        document.getElementById(cpf2).value ='';
        return document.getElementById(id).innerHTML = "<b style='color:red'>CPF inválido</b>";     
    }
    return document.getElementById(id).innerHTML = "";        
    //return alert("CPF válido");     
}
  function mascara(o,f){           
    $(document).keyup(function(e) {
      if (e.keyCode != 37 && e.keyCode != 39) {
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
      }
    }); 
    return;
  }
  function execmascara(){
    v_obj.value=v_fun(v_obj.value)
  }
  function mreais(v){
    v=v.replace(/\D/g,"")           //Remove tudo o que não é dígito
    v=v.replace(/(\d{0})(\d)/,"$1R$ $2")       //Coloca o R$
    v=v.replace(/(\d{2})$/,",$1")       //Coloca a virgula
    v=v.replace(/(\d+)(\d{3},\d{2})$/g,"$1.$2")   //Coloca o primeiro ponto
    return v
  }
  function mdouble(v){

    v=v.replace(/\D/g,"")           //Remove tudo o que não é dígito  
    // alert(v.length);
    if(v.length < 4){
      if(v.length == 3){
        v=v.replace(/^(0+)(\d)/g,"$2")    
      } 
      if(v.length == 1)v=v.replace(/(\d{0})(\d)/,"$10.$2")   
      else v=v.replace(/(\d{0})(\d)/,"$10$2") 
    }
    else v=v.replace(/^(0+)(\d)/g,"$2");
    v=v.replace(/(\d{2})$/,".$1")       //Coloca a virgula
    v=v.replace(/(\d+)(\d{3},\d{2})$/g,"$1.$2")   //Coloca o primeiro ponto
    return v
  }
  function cnpj_mask(v){
    v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
    v=v.replace(/(\d{2})(\d)/,"$1.$2")    //Coloca ponto entre o terceiro e o quarto dígitos
    v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o setimo e o oitava dígitos
    v=v.replace(/(\d{3})(\d)/,"$1/$2")   //Coloca ponto entre o decimoprimeiro e o decimosegundo dígitos
    v=v.replace(/(\d{4})(\d)/,"$1-$2")
    return v
  }
  function cpf_mask(v){
    v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
    v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o terceiro e o quarto dígitos
    v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o setimo e o oitava dígitos
    v=v.replace(/(\d{3})(\d)/,"$1-$2")   //Coloca ponto entre o decimoprimeiro e o decimosegundo dígitos
    return v
  }
  function cep_mask(v){
    v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
    v=v.replace(/(\d{2})(\d)/,"$1.$2")    //Coloca ponto entre o terceiro e o quarto dígitos
    v=v.replace(/(\d{3})(\d)/,"$1-$2")   //Coloca ponto entre o decimoprimeiro e o decimosegundo dígitos
    return v
  }
  function rg_mask(v){
    v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
    v=v.replace(/(\d{1})(\d)/,"$1.$2")    //Coloca ponto entre o terceiro e o quarto dígitos
    v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o setimo e o oitava dígitos
    v=v.replace(/(\d{3})(\d)/,"$1-$2")   //Coloca ponto entre o decimoprimeiro e o decimosegundo dígitos
    return v
  }
  function data(v){
    v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
    v=v.replace(/(\d{2})(\d)/,"$1/$2")    //Coloca ponto entre o terceiro e o quarto dígitos
    v=v.replace(/(\d{2})(\d)/,"$1/$2")    //Coloca ponto entre o decimoprimeiro e o decimosegundo dígitos
    return v
  }
  function mtime(v){
    v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
    v=v.replace(/(\d{2})(\d)/,"$1:$2")     //Coloca ponto entre o decimoprimeiro e o decimosegundo dígitos
    return v
  }
  function mtel(v){
    v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
  function magencia(v){
      v=v.replace(/\D/g,"") 
      v=v.replace(/(\d)(\d)$/,"$1-$2");    //Coloca ponto entre o terceiro e o quarto dígitos
      return v
  }
  function mCONTA(v){
      v=v.replace(/[^a-zA-Z0-9]/g,"") 
      v=v.replace(/([a-zA-Z0-9])([a-zA-Z0-9])$/,"$1-$2");    //Coloca ponto entre o terceiro e o quarto dígitos
      return v
  }
  
</script>