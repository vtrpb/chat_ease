<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permission $permission
 */

use Cake\Core\Configure;

$domain     = Configure::read('domain');        
$user_role  = $this->request->getSession()->read('Users.role'); 

?>

<script language="javascript" type="text/javascript">  

  $(document).ready(function () {      

     $('#user-id').select2({
               "language": {
                   "noResults": function(){
                       return "(não encontrado...)";
                   }
               },
                escapeMarkup: function (markup) {
                    return markup;
                }
          });
  });
</script>

<style type="text/css">

 .select2-container--default .select2-selection--single {
  height: 100%;
  padding: 6px 12px;
  font-size: 16px;
  line-height: 1.42857143;
  color: #555;
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
}
    
</style>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                            
        <ul class="breadcrumb">
            <li class="active"><?= $this->Html->link("PERMISSÕES", '/Permissions/index') ?></li>
            <li><strong>  /  </strong></li>
            <li>NOVA PERMISSÃO</li>
        </ul>                        
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">                
                <div class="card card-danger">
                        <?= $this->Form->create($permission,['id'=>'form-template','class'=>'form-horizontal']) ?>                        
                            <?php                              
                                echo "<div class=\"card-body\">";        
                                echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-6\">" . $this->Form->control('user_id',['label'=>'Usuário','div' => false,'required'=>true,['options' => $users],'class' => 'form-control'])."</div>";
                                echo "</div>";                               
                                echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-6\">" . $this->Form->control('role_id',['label'=>'Permissão','div' => false,'required'=>true,['options' => $users],'class' => 'form-control'])."</div>";
                                echo "</div>";

                                echo "<div><p> </p></div>";
                                    echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">". $this->Form->button(__('<span class="nav-icon fas fa-save" aria-hidden="true"></span> SALVAR'),['class'=>'btn btn-default'])."</div>";
                                  echo "</div>";
                                
                                echo "</div>";
                            ?>
                        
                        <?= $this->Form->end() ?>                     
                </div>
          </div>
      </div>
    </div>
  </div>
</div>
