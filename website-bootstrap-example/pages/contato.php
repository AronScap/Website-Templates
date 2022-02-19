
<header class="bg-gradient-headerservice">
    <div class="headerservice">
        <div></div>
    </div>
</header>
<div class="section subheader-bg" style="padding:40px 0;">
    <div class="container">
        <div class="row">
            <div class="col-12 animatedParent">
                <div class="quadradosubheader animated fadeInLeftShort">
                    <span class="ti-email"></span>                    
                </div>
                <div class="textsubheader animated bounceInLeft">
                    Entre em Contato
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
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
  function mtel(v){
      v=v.replace(/\D/g,"")  
      v=v.replace(/(\d{2})(\d)/,"($1) $2")
      if(v.length <= 13)v=v.replace(/(\d{4})(\d)/,"$1-$2")
      if(v.length > 13)v=v.replace(/(\d{5})(\d)/,"$1-$2")
      return v
  }
</script>


<div class="section" >
    <div class="container">
        <div class="section-title">
            <small>FALE CONOSCO</small>
            <h3>Como podemos ajudá-lo?</h3>
        </div>

        <div class="row pt-4">
            <div class="col-md-6" style="text-align: center;">
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v4.0"></script>
                <div class="fb-page" data-href="https://www.facebook.com/trasstecnologia" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/trasstecnologia" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/trasstecnologia">Trass</a></blockquote></div>
                <div style="width:340px; text-align:left;margin:30px auto; padding-left:14px;">
                    <p class="mb-2"> <span class="ti-location-pin mr-2"></span> Chapecó - Santa Catarina</p>
                    <div class=" d-block d-sm-inline-block">
                        <p class="mb-2">
                            <span class="ti-email mr-2"></span> <a style="color:#777;" class="mr-4" href="mailto:contato@trass.com.br">contato@trass.com.br</a>
                        </p>
                    </div>
                    <div class="d-block " >
                        <p class="mb-0">
                            <span class="fab fa-whatsapp mr-2"></span> <a style="color:#777;" href="tel:+5549999934272">(49) 99993-4272</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <form action method="post">
                    <div>
                        <label class="labelform">Nome Completo:</label>
                        <input type="text" class="form-control" placeholder="Seu nome completo" name="nomecompleto" required />
                    </div>
                    <div>
                        <label class="labelform">E-mail:</label>
                        <input type="text" class="form-control" placeholder="Seu melhor e-mail" name="email" required />
                    </div>
                    <div>
                        <label class="labelform">Telefone:</label>
                        <input type="text" class="form-control" maxlength="15" onkeypress="mascara(this,mtel)" placeholder="Seu telefone" name="telefone" />
                    </div>
                    <div>
                        <label class="labelform">Sua dúvida:</label>
                        <textarea style="min-height:100px;" class="form-control" placeholder="Sua dúvida" name="mensagem"></textarea>
                    </div>
                    <div style="margin-top:30px;text-align:right;">
                        <button type="submit" class="btn btn-primary" style="cursor:pointer;">
                            Enviar <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 


<div class="section light-bg">
    <div class="container">
        <div class="section-title">
            <small>FAÇA O DOWNLOAD</small>
            <h3>Nosso Aplicativo</h3>
        </div>
        <div class="call-to-action">
            <p class="tagline" style="color:#777">Temos nosso Aplicativo próprio, faça o download e tenha uma comunicação direta e melhor relacionamento com a gente!</p>
            <div class="my-4">
                <a href="#" class="btn btn-light"><img src="images/appleicon.png" alt="icon"> App Store</a>
                <a href="#" class="btn btn-light"><img src="images/playicon.png" alt="icon"> Google play</a>
            </div>
        </div>
    </div>

</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113682.00245246071!2d-52.715842512741474!3d-27.075551946377722!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e4b5c94098efa5%3A0x6b810ae0d4ebfb6a!2sChapec%C3%B3%2C%20State%20of%20Santa%20Catarina!5e0!3m2!1sen!2sbr!4v1570706503950!5m2!1sen!2sbr" height="300" frameborder="0" style="border:0;width:100%;" allowfullscreen=""></iframe>
<script type="text/javascript">
    function showTime(){}
</script>