<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdImage $adImage
 */
?>

<!-- jQuery UI -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

<script language="javascript" type="text/javascript">       

   Dropzone.options.dropzone = {  

        paramName: 'file', 
        maxFilesize: 5, 
        acceptedFiles: 'image/*', 
        addRemoveLinks: true, 
        dictRemoveFile: 'Remover', 
        dictDefaultMessage: 'Arraste e solte as imagens aqui ou clique para selecionar', // Mensagem padrão
        dictFileTooBig: "O arquivo é muito grande. O tamanho máximo permitido é 5MB.",
        url: '<?= $this->Url->build(['action' => 'upload']); ?>',   

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
              url: '<?= $this->Url->build(['action' => 'removeImage']); ?>',
              data: {id: file.id}, // Id da imagem a ser removida
              headers: {
                        'x-csrf-token': csrfToken            
              }
            });
          });   

        }
      };   
  

  $(document).ready(function() {

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
                  url: '<?= $this->Url->build(['action' => 'updateImageOrder']); ?>', // Substitua pela URL correta da ação de atualização no seu controlador
                  data: { order: order },
                  headers: {
                    'x-csrf-token': csrfToken            
                  },
                  success: function(response) {
                      // Trate a resposta do servidor, se necessário
                      console.log(response);
                  },
                  error: function(xhr, status, error) {
                      // Lida com erros, se ocorrerem
                      console.log(error);
                  }
              });

              }
          });

        });
  
</script>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                            
        <ul class="breadcrumb">
            <li class="active"><?= $this->Html->link("MEUS ANÚNCIOS", '/Ads/index') ?></li>
            <li><strong>  /  </strong></li>
            <li>ADICIONAR IMAGENS AO ANÚNCIO</li>
        </ul>                        
      </div>
    </div>   

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">                
                <div class="card card-danger">                        
                        <?php
                              echo "<div class=\"card-body\">";        

                              echo "<div class=\"row\">";                                    
                                  echo "<div class=\"col-12\">"."<div class=\"dropzone\" id=\"dropzone\"></div></div>";                                  
                              echo "</div>";                                                                                        
                              echo "<div><p> </p></div>";
                              echo "<div class=\"row\">";                                    
                                  echo "<div class=\"col-2\">";
                                      echo $this->Html->link('<button type="button" class="btn btn-default" title="Meus anúncios"><span class="nav-icon fas fa-save" aria-hidden="true" ></span> FINALIZAR</button>',['controller' => 'Ads','action' => 'index'],['escape' => false]);                    
                                  echo "</div>";                                
                              echo "</div>";                                                                                        

                              echo "</div>";
                        ?>
                </div>
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>