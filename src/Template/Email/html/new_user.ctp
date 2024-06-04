<?php

   use Cake\Core\Configure;
   use Cake\Routing\Router;

   $domain           = Configure::read('domain');   

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
        	<h5>Novo usuário cadastrado no Truck Zone</h5>          
        </td>
      </tr>
      <tr>
        <td colspan="2" style="padding:40px 25px 40px; color:#FFFFFF;font-size:14px;line-height:22px;font-family:Verdana,sans;margin-top:0;margin-bottom:20px;font-weight:normal">
        	<p>Olá Suporte Truck Zone,</p>
          <p>O seguinte usuário acabou de se cadastrar:</p>
          <table>
            <tr><td>Nome</td>              <td><?= $user->name ?></td></tr>
            <tr><td>Nome de Empresa</td>   <td><?= $user->corporate_name ?></td></tr>
            <tr><td>CNPJ</td>              <td><?= $user->cnpj ?></td></tr>
            <tr><td>CPF</td>               <td><?= $user->cpf ?></td></tr>
            <tr><td>Telefone</td>          <td><?= $user->mobile_number ?></td></tr>
            <tr><td>Telefone Comercial</td><td><?= $user->commercial_number ?></td></tr>
            <tr><td>Email</td>             <td><?= $user->email ?></td></tr>            
          </table>
        </td>
      </tr>
    </tbody>
  </table> 
</div>





