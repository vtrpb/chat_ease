<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ad $ad
 */

$this->loadHelper('DatePicker');

use Cake\Core\Configure;

$domain     = Configure::read('domain');        
$user_role  = $this->request->getSession()->read('Users.role'); 

?>

<!-- jQuery UI -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

<style>
    .ad-image {        
        height: 200px; /* Defina a altura desejada */
        object-fit: cover; /* Redimensiona a imagem para cobrir a área disponível, mantendo a proporção */
        border-radius: 5px; /* Adiciona bordas arredondadas */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Adiciona uma sombra suave */
        transition: transform 0.3s; /* Adiciona uma transição suave para o efeito de zoom */
    }

    .ad-image:hover {
        transform: scale(1.05); /* Adiciona um efeito de zoom ao passar o mouse */
    }

    .row-spacing {
        margin-bottom: 20px; /* Defina o espaço desejado entre as linhas */
    }
</style>


<script language="javascript" type="text/javascript">     

    $(document).ready(function () {      
        
        $('#truck-price').on('input', function() {
            var value = $(this).val();
            value = value.replace(/\D/g, ''); 
            $(this).val(value);
        });

        var myDropzone = Dropzone.forElement(document.getElementById('dropzone'));
          
        $("#dropzone").sortable({
              items: ".dz-preview",
              cursor: "move",
              opacity: 0.5,
              containment: "#dropzone",
              tolerance: "pointer",
              update: function() {            
              
              var order = $("#dropzone").sortable("toArray");                              
              
              myDropzone.files.sort(function(a, b) {
                  return order.indexOf(a.upload.uuid) - order.indexOf(b.upload.uuid);
              });                                      
              
              $.ajax({
                  type: 'POST',
                  url: '<?= $this->Url->build(['controller'=>'AdImages','action' => 'updateImageOrder']); ?>', // Substitua pela URL correta da ação de atualização no seu controlador
                  data: { order: order },
                  headers: {
                    'x-csrf-token': csrfToken            
                  },
                  success: function(response) {                      
                      //console.log(response);
                  },
                  error: function(xhr, status, error) {                      
                      //console.log(error);
                  }
              });

              }
          });
    });
  

    Dropzone.options.dropzone = {  

        paramName: 'file', 
        maxFilesize: 5, 
        acceptedFiles: 'image/*', 
        addRemoveLinks: true, 
        dictRemoveFile: 'Remover', 
        dictDefaultMessage: 'Arraste e solte as imagens aqui ou clique para selecionar', // Mensagem padrão
        dictFileTooBig: "O arquivo é muito grande. O tamanho máximo permitido é 5MB.",
        url: '<?= $this->Url->build(['controller'=>'AdImages','action' => 'upload']); ?>',   

        sending: function(file, xhr, formData) {
          xhr.setRequestHeader('x-csrf-token', csrfToken);                           
          formData.append('ad_id', <?= $ad_id ?>);
        },

        success: function(file, response) {

          //console.log("Imagem enviada com sucesso. ID:", response.id);          
          
          file.id = response.id;

          $(file.previewElement).attr('id', 'file-' + response.id);
        },

        init: function() {              

          this.on('removedfile', function(file) {
            $.ajax({
              type: 'POST',
              headers: {
                    'x-csrf-token': csrfToken            
              },
              url: '<?= $this->Url->build(['controller'=>'AdImages','action' => 'removeImageAjax']); ?>',
              data: {id: file.id}, // Id da imagem a ser removida
              
            });
          });   

        }
      };   

</script>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                            
        <ul class="breadcrumb">
            <li class="active"><?= $this->Html->link("MEUS ANÚNCIOS", '/Ads/index') ?></li>
            <li><strong>  /  </strong></li>
            <li>EDITA ANÚNCIO</li>
        </ul>                        
       </div>      
    </div>   

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">                
                <div class="card card-danger">
                        <?= $this->Form->create($ad) ?>                            
     
                            <?php                                  
                                echo "<div class=\"card-body\">";        

                                    echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-md-6\">". $this->Form->control('user_id', ['label'=>'Usuário','options' => $users,'div' => false,'class' => 'form-control','readonly'=>'readonly']) ."</div>";
                                        echo "<div class=\"col-md-6\">". $this->Form->control('truck_id',['label'=>'Caminhão','options' => $trucks,'div' => false,'class' => 'form-control','readonly'=>'readonly'])."</div>";
                                    echo "</div>";                                  

                                    echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-md-6\">" . $this->Form->control('title',['label'=>'Título','div' => false,'class' => 'form-control']) . "</div>";
                                        //echo $this->Form->control('truck_price',['label'=>'Preço','type'=>'text','div' => false,'class' => 'form-control']);
                                        echo "<div class=\"col-md-6\">";
                                            echo "<label for=\"546\">Preço</label>";
                                            echo "<div class=\"input-group\" id=\"546\">";
                                                echo "<div class=\"input-group-prepend\">";
                                                    echo "<span class=\"input-group-text\">R$</span>";
                                                echo "</div>";                                                
                                                echo "<input type=\"text\" class=\"form-control\" name=\"truck_price\" id=\"truck-price\" value=\"$ad->truck_price\">";                                                
                                                echo "<div class=\"input-group-append\">";
                                                echo "<span class=\"input-group-text\">,00</span>";
                                                echo "</div>";
                                            echo "</div>";
                                        echo "</div>";                                        

                                    echo "</div>";
                                    
                                    

                                    echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-md-12\">" . $this->Form->control('content',['label'=>'Descrição','div' => false,'class' => 'form-control','type'=>'textarea']). "</div>";                                        
                                    echo "</div>";                                                                    

                                    if ($user_role == 'individual')  {                                        
                                        echo "<div class=\"row\">";                                    
                                            echo "<div class=\"col-md-12\">" . $this->Form->control('ad_plan_id',['label'=>'Plano','options'=>$adPlans,'required'=>true,'div' => false,'class' => 'form-control']). "</div>";
                                        echo "</div>";                                                                    
                                    }
                            
                                    echo "<div><p> </p></div>";

                                    echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-md-12\">";
                                            echo "<div class=\"dropzone\" id=\"dropzone\"></div>";                                  
                                        echo "</div>";
                                    echo "</div>";   

                                    echo "<div><p> </p></div>";

                                    echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-md-12\">". $this->Form->button(__('<span class="nav-icon fas fa-save" aria-hidden="true"></span> SALVAR'),['class'=>'btn btn-default'])."</div>";
                                    echo "</div>";
                                
                                echo "</div>";
                            ?>
                        
                        <?= $this->Form->end() ?>                     
                </div>
            </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      
      <!-- row -->
      <!--<div class="row">
          <div class="col-md-md-12">                
                <div class="card card-danger">                        
                        <?php
                              echo "<div class=\"card-body\">"; 

                                  echo "<div class=\"row\">";                                    
                                      echo "<div class=\"col-md-12\">"."<div class=\"dropzone\" id=\"dropzone\"></div>";                                  
                                  echo "</div>";                                                                                        

                                  echo "<div class=\"row\"><p> </p></div>";

                                  echo "<div class=\"row\">";                                    
                                      echo "<div class=\"col-md-12\">". $this->Html->link('<button type="button" class="btn btn-default" title="Meus anúncios"><span class="nav-icon fas fa-save" aria-hidden="true" ></span> FINALIZAR</button>',['controller' => 'Ads','action' => 'index'],['escape' => false]) . "</div>";                                
                                  echo "</div>";


                              echo "</div>";                                                                                        

                              
                        ?>
                </div>
            </div>        
      </div>-->
      <!-- row -->

          <div class="row row-spacing">
            <?php 
            $counter = 0;
            foreach ($ad->ad_images as $adImage): ?>
                <div class="col-md-3">
                    <div class="box box-default" align="center">
                        <div class="box-body">
                            <img src=<?=$domain.'/files/ad_images/'.$adImage->name ?>  class="img-responsive pad ad-image" alt=<?=$adImage->name?>>
                        </div>
                        <div class="box-footer">                                
                            <br>
                            <?= $this->Form->postLink(
                                '<i class="fa fa-trash"></i> Excluir',
                                ['controller' => 'AdImages', 'action' => 'removeImage', $adImage->id],
                                [
                                    'confirm' => __('Tem certeza que deseja excluir a imagem {0}?', $adImage->name),
                                    'class' => 'btn btn-danger',
                                    'escape' => false
                                ]
                            ) ?>
                            <br>
                        </div>
                    </div>
                </div>
                
                <?php
                    $counter++;
                    if ($counter % 4 == 0) {
                        echo '</div><div class="row">';
                    }
                ?>
            <?php endforeach; ?>
        </div>

    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>