<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ReportTemplate $reportTemplate
 */

use Cake\Core\Configure;  
$domain = Configure::read('domain');

?>

<?= $this->Html->script('ckeditor5/ckeditor5-build-decoupled-document/ckeditor'); ?>
<?= $this->Html->script('ckeditor5/ckeditor5-build-decoupled-document/translations/pt-br'); ?>

<script>

    var domain = '<?php echo $domain; ?>';

    $(document).ready(function ($) {        

        $( "#form-template" ).submit(function( event ) {
                
                if ( report_editor.getData() == '' )  {
                    alert('O Modelo de Documento não pode ser salvo em branco!');
                    event.preventDefault();
                }
                else  {
                    $('#hidden-template').val(report_editor.getData());
                } 
        });

        $("#sector-id").on('change',function() { 
                
                var sector_id = $(this).val();               

                const url = domain + '/Subsectors/getBySectorId/' + sector_id +'.json';                                      

                $('.subsector-id').empty();
                $('.subsector-id').append($("<option></option>").attr('value','').text('(selecione o Subsetor pesquisado)'));

                $.getJSON(url, function (data) {                         

                       $.each(data.json_array, function (key, entry) { 
                            $('.subsector-id').append($("<option></option>").attr('value',entry.id).text(entry.name));                            
                      });                
                });                
                       
        });                       

        $("#subsector-id").on('change',function() { 
                
                var subsector_id = $(this).val();               

                const url = domain + '/Cores/getBySubsectorId/' + subsector_id +'.json';                                      

                $('.core-id').empty();
                $('.core-id').append($("<option></option>").attr('value','').text('(selecione o Núcleo pesquisado)'));

                $.getJSON(url, function (data) {                         

                       $.each(data.json_array, function (key, entry) { 
                            $('.core-id').append($("<option></option>").attr('value',entry.id).text(entry.name));                            
                      });                
                });                
                       
        });                       

        
    }); 
</script> 


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                            
        <ul class="breadcrumb">
            <li class="active"><?= $this->Html->link("MODELOS DE DOCUMENTO", '/ReportTemplates/index') ?></li>
            <li><strong>  /  </strong></li>
            <li>NOVO MODELO DE DOCUMENTO</li>
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
                        <?= $this->Form->create($reportTemplate,['id'=>'form-template','class'=>'form-horizontal']) ?>                        
                            <?php                              
                                echo "<div class=\"card-body\">";                                

                                 echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">";
                                        echo "<div class=\"form-check form-check-inline\">".$this->Form->control('locked', ['label'=>['class'=>'form-check-label','for'=>'inlineCheckbox1','text'=>'Travado para edição'],'type'=>'checkbox','div' => false,'class'=>'form-check-input','id'=>'inlineCheckbox1'])."</div>";                                     
                                    echo "</div>";                                    
                                    echo "</div>";                                    

                                    echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-8\">" . $this->Form->control('report_type_id',['label'=>'Tipo de Relatório','options'=>[1=>'RTEC',2=>'RTEC EXTRAÇ.',3=>'RLINT'],'div' => 'false','class' => 'form-control'])."</div>";
                                    echo "</div>";                                    

                                    echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-8\">" . $this->Form->control('sector_id', ['label'=>'Setor','options' => $sectors, 'empty' => '(selecione o Setor)','class'=>'form-control'])."</div>";
                                    echo "</div>";                                    

                                    echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-8\">" . $this->Form->control('subsector_id', ['label'=>'Subsetor','type' => 'select', 'empty' => '(selecione o SubSetor)','class'=>'form-control subsector-id'])."</div>";
                                    echo "</div>";                                                                        

                                    echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-8\">" . $this->Form->control('core_id',['label'=>'Núcleo','type'=>'select','empty'=>'(selecione o Núcleo)','class'=>'form-control core-id'])."</div>";
                                    echo "</div>";                                                                        

                                    echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-8\">" . $this->Form->control('name',['label'=>'Descrição do Modelo','class'=>'form-control'])."</div>";
                                    echo "</div>";                                                                        

                                    echo "<br><div id=\"toolbar-container\"></div>";                
                                    echo "<div id=\"editor\" class=\"editor\"></div>";
                                    echo $this->Form->hidden('hidden_template',['id'=>'hidden-template']);                                                
                                    echo"<p>
                                        <b>Observação:</b> Use o termo genérico a seguir para ser substituído pelo real no momento da geração do relatório:<code language=\"php\">\$dataAtual, \$assunto, \$origem, \$difusao, \$difusaoAnterior, \$referencia, \$anexos, \$numDePaginas, \$relatorioNum, \$numOrdemJudicial', \$autoridade, \$dataOrdemJudicialExtenso, \$numProcesso, \$comarca, \$vara. 
                                        </code>    
                                        </p>";                                           
                                    echo "<div class=\"row\"> </div>";                                    
                                    echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-8\">". $this->Form->button(__('<span class="nav-icon fas fa-save" aria-hidden="true"></span> SALVAR'),['class'=>'btn btn-default'])."</div>";
                                    echo "</div>";

                                echo "</div>";                                
                            ?>                       
                        
                        <?= $this->Form->end() ?>                     
                </div>
            </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!--<script>
    reportEditor = ClassicEditor.create(document.querySelector('.report-editor'),{language: 'pt' })
      .then( newEditor => {
          report_editor = newEditor;
      } )
      .catch( error => {
          console.error( error );
      } );     


    var allEditors = document.querySelectorAll('.editor');

    for (var i = 0; i < allEditors.length; ++i) {
      ClassicEditor.create(allEditors[i],{language: 'pt' });      
    }
</script>-->

<script>
    DecoupledEditor
        .create( document.querySelector( '.editor' ),{ 
            image: {
                // ...
                upload: {
                    panel: {
                        items: [ 'insertImageViaUrl' ]
                    }
                },
            },
            language: 'pt-br' 
        } )
        .then( editor => {
            report_editor = editor;
            const toolbarContainer = document.querySelector( '#toolbar-container' );

            toolbarContainer.appendChild( editor.ui.view.toolbar.element );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>