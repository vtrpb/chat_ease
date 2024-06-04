<?php

   use Cake\Core\Configure;
   use Cake\Routing\Router;

   $domain     = Configure::read('domain');
   $loginLink  = Router::url(["controller"=>"Users","action"=>"login"],true);

?>
<div class="container-fluid mt-20 mb-20">
  <table cellpadding="0" cellspacing="0" class="table table-striped table-condensed" valign="center" style="background-color:#2a3947;">
    <tbody>
      <tr>                                                   
        <td align="center"><br><img src= <?= $domain . "/img/logo_extra_small.png"  ?> alt=""></td>
        <td valign="top" style="padding-top:35px;color:rgb(255,255,255);font-size:23px;text-align:center"></td> 
      </tr>
      <tr>
        <td colspan="2" valign="top" style="padding-top:35px;color:rgb(255,255,255);font-size:23px;text-align:center">
          <h5>Recuperação de senha</h5>
          <h6>Nova senha gerada com sucesso!</h6>        	
        </td>
      </tr>
      <tr>
        <td colspan="2" style="padding:40px 25px 40px; color:#FFFFFF;font-size:14px;line-height:22px;font-family:Verdana,sans;margin-top:0;margin-bottom:20px;font-weight:normal">
        	<p>Olá <?= $user->name ?>,</p>
        	<p>Sua nova senha de acesso é: </p>			    
          <p style="width:50%;color:#ffffff;text-decoration:none;background:#333;display:block;padding:10px;text-align:center;-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;margin:10px auto"><br>login: <?=$user->email."<br> senha: ". $uniquecode.  "</p>" ?>
          <p><a href="<?= $loginLink ?>" style="color: white; font-weight: normal;" onmouseover="this.style.color='white'; this.style.fontWeight='bold';" onmouseout="this.style.color='white'; this.style.fontWeight='normal';">PÁGINA DE LOGIN</a></p>

        </td>
      </tr>
    </tbody>
  </table> 
</div>





