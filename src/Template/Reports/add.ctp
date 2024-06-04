<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Report $report
 */

use Cake\Core\Configure;

// $report_type_id
$domain = Configure::read('domain');

?>

<!--<?= $this->Html->script('ckeditor5/ckeditor5-build-classic/ckeditor'); ?>
<?= $this->Html->script('ckeditor5/ckeditor5-build-classic/translations/pt'); ?>-->

<?= $this->Html->script('ckeditor5/ckeditor5-build-decoupled-document/ckeditor'); ?>
<?= $this->Html->script('ckeditor5/ckeditor5-build-decoupled-document/translations/pt-br'); ?>

<style type="text/css">

    .ck-editor__editable {
    max-height: 400px;
}

    
</style>



<script>

    var domain         = '<?= $domain; ?>';
    var report_type_id = '<?= $report_type_id; ?>';


    $(document).ready(function ($) {

        $('#report-type-id').val(report_type_id).change();



        //window.alert(report_type_id);
        

        //$("#report-number").mask('000', {reverse: false});        
        $("#report-number-judicial-order").mask('0000000-00.0000.0.00.0000', {reverse: false});
        $("#report-date-judicial-order").mask('00/00/0000', {reverse: false});            
        $("#report-number-judicial-order-previous").mask('0000000-00.0000.0.00.0000', {reverse: false});
        $("#report-process-number").mask('0000000-00.0000.0.00.0000', {reverse: false});        
        $("#report-date-judicial-order-previous").mask('00/00/0000', {reverse: false});
        $("#protocol-date").mask('00/00/0000', {reverse: false});
        $("#fact-date").mask('00/00/0000', {reverse: false});

        $("#report-templates").on('change',function() {

                var report_template_id = $('#report-templates :selected').val();

                const url = domain + '/ReportTemplates/getById/' + report_template_id + '.json';

                var jsonData = $.ajax({
                      url: url,
                      dataType: 'json',
                    }).done(function (results) {
                          results["report_template"].forEach(function(template) {
                                report_editor.setData(template.template);
                          });
                    });
        });

        $( "#form-report" ).submit(function( event ) {

                if ( report_editor.getData() == '' )  {
                    alert('O documento não pode ser salvo em branco!');
                    event.preventDefault();
                }
                else  {
                    //window.alert(report_editor.getData());
                    $('#hidden-report').val(report_editor.getData());

                }
        });

        //console.log(Array.from( report_editor.ui.componentFactory.names() ));
        //console.log(Array.from(report_editor.plugins.get( 'FileRepository' ) ));


    });
</script>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">                            
        <ul class="breadcrumb">
            <li class="active"><?= $this->Html->link("DOCUMENTOS", '/Reports/index') ?></li>
            <li><strong>  /  </strong></li>
            <li>NOVO DOCUMENTO</li>
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
                        <?= $this->Form->create($report,['id'=>'form-report','class'=>'form-horizontal']) ?>                        
                            <?php                              
                                echo "<div class=\"card-body\">";                                
                                // Shared fields
                                echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">";
                                        echo "<div class=\"form-check form-check-inline\">".$this->Form->control('cover', ['label'=>['class'=>'form-check-label','for'=>'inlineCheckbox1','text'=>'Capa'],'type'=>'checkbox','div' => false,'class'=>'form-check-input','id'=>'inlineCheckbox1'])."</div>";
                                        echo "<div class=\"form-check form-check-inline\">".$this->Form->control('photographic_attachment', ['label'=>['class'=>'form-check-label','for'=>'inlineCheckbox2','text'=>'Anexo'],'type'=>'checkbox','div' => false,'class'=>'form-check-input','id'=>'inlineCheckbox2'])."</div>";
                                    echo "</div>";                                    
                                echo "</div>";                                    

                                echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">" . $this->Form->control('report_type_id',['label'=>'Tipo de Relatório','options'=>[1=>'RTEC',2=>'RTEC EXTRAÇ.',3=>'RLINT'],'div' => 'false','disabled'=>'disabled','class' => 'form-control'])."</div>";                                    
                                echo "</div>";
                                echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-8\">" . $this->Form->control('core_id',['label'=>'Núcleo','options'=>$cores,'readonly'=>'readonly','div' => 'false','class' => 'form-control'])."</div>";                                        
                                echo "</div>";
                                echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-8\">" . $this->Form->control('user_id',['label'=>'Analista','options'=>$users,'readonly'=>'readonly','div' => 'false','class' => 'form-control'])."</div>";                                        
                                echo "</div>";                                
                                if ($report_type_id != 3)  {
                                    echo "<div class=\"row\">";                                    
                                        echo "<div class=\"col-8\">" . $this->Form->control('operation_id',['label'=>'Operação','options'=>$operations,'empty'=>'(selecino a Operação)','div' => 'false','class' => 'form-control'])."</div>";                                        
                                    echo "</div>";                                
                                }
                                echo "<div class=\"row\">";                                                                            
                                        echo "<div class=\"col-8\">" . $this->Form->control('report_number',['label'=>'Rel.Téc.Núm.','type'=>'text','div' =>false,'class' => 'form-control'])."</div>";                                   
                                echo "</div>";
                                //

                                if ($report_type_id == 1 || $report_type_id == 2 )  { // RETC or RTEC EXTRAC.
                                    

                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_subject',['label'=>'Assunto','type'=>'text','div' => false,'class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_origin',['label'=>'Origem','type'=>'text','div' => false,'class' => 'form-control'])."</div>";
                                    echo "</div>";

                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_difusion',['label'=>'Difusão','type'=>'text','div' => false,'class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_difusion_previous',['label'=>'Difusão Anterior','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "</div>";                                

                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_number_judicial_order',['label'=>'Ordem Judicial','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_date_judicial_order',['label'=>'Data da Ordem Judicial','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "</div>";  

                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_number_judicial_order_previous',['label'=>'Ordem Judicial Ant.','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_date_judicial_order_previous',['label'=>'Data da Ordem Judicial Ant.','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "</div>";  

                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-3\">" . $this->Form->control('report_court',['label'=>'Comarca','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-3\">" . $this->Form->control('report_district',['label'=>'Vara','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-2\">" . $this->Form->control('report_reference',['label'=>'Referência','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "</div>";  

                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-3\">" . $this->Form->control('report_process_number',['label'=>'Núm.Processo','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-3\">" . $this->Form->control('report_official_license_number',['label'=>'Núm.Alvará','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-2\">" . $this->Form->control('report_judicial_order_name',['label'=>'Juiz','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "</div>";  

                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-8\">" . $this->Form->control('report_attachment',['label'=>'Anexo(s)','type'=>'textarea','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "</div>";
                                }

                                /*else if ($report_type_id == 2)  { // RETC EXTRACAO

                                }*/

                                else if ($report_type_id == 3)  { // RLINT

                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_subject',['label'=>'Assunto','type'=>'text','div' => false,'class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_origin',['label'=>'Origem','type'=>'text','div' => false,'class' => 'form-control'])."</div>";
                                    echo "</div>";

                                    echo "<div class=\"row\">";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_difusion',['label'=>'Difusão','type'=>'text','div' => false,'class' => 'form-control'])."</div>";
                                        echo "<div class=\"col-4\">" . $this->Form->control('report_difusion_previous',['label'=>'Difusão Anterior','type'=>'text','div' => 'false','class' => 'form-control'])."</div>";
                                    echo "</div>";                                


                                }                                

                               
                                echo "<div class=\"row\">";
                                    echo "<div class=\"col-8\">" . $this->Form->control('report_templates',['label'=>'Modelo(s) de Documento','type'=>'select','div' => false,'options'=>$report_templates,'required' => false,'empty'=>'(selecione o modelo)','class' => 'form-control'])."</div>";
                                echo "</div>";
                                echo "<br>";
                                echo "<div id=\"toolbar-container\"></div>";
                                echo "<div id=\"editor\" class=\"editor\"></div>";
                                echo $this->Form->hidden('hidden_report',['id'=>'hidden-report']);                                
                                echo "<p>
                                        <b>Observação:</b> Use o termo genérico a seguir para ser substituído pelo real no momento da geração do relatório:<code language=\"php\">\$dataAtual, \$assunto, \$origem, \$difusao, \$difusaoAnterior, \$referencia, \$anexos, \$numDePaginas, \$relatorioNum, \$numOrdemJudicial', \$autoridade, \$dataOrdemJudicialExtenso, \$numProcesso, \$comarca, \$vara. 
                                        </code>    
                                        </p>"; 
                                echo "<div class=\"row\"> </div>";                                    
                                echo "<div class=\"row\">";                                    
                                    echo "<div class=\"col-8\">". $this->Form->button(__('<span class="nav-icon fas fa-save" aria-hidden="true"></span> SALVAR'),['class'=>'btn btn-default'])."</div>";
                                echo "</div>";
                                
                                //echo $this->Form->control('report',['label'=>'Laudo','class' => 'report-editor','required' => false]);

                                //echo "</div>";
                                
                                   
                                //echo "</div>";
                                echo "</div>";
                            ?>
                        <!--</fieldset> -->
                        
                        <?= $this->Form->end() ?>                     
                </div>
            </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script>
    var domain = '<?= $domain; ?>';

    class MyUploadAdapter {

        constructor( loader ) {
            // The file loader instance to use during the upload.
            this.loader = loader;
        }

        // Starts the upload process.
        upload() {

            /*server.onUploadProgress( data => {
                loader.uploadTotal = data.total;
                loader.uploaded = data.uploaded;
            } );*/

            return this.loader.file
                .then( file => new Promise( ( resolve, reject ) => {
                    this._initRequest();
                    this._initListeners( resolve, reject, file );
                    this._sendRequest( file );
                } ) );
        }

        // Aborts the upload process.
        abort() {
            if ( this.xhr ) {
                this.xhr.abort();
            }
        }

        // Initializes the XMLHttpRequest object using the URL passed to the constructor.
        _initRequest() {
            const xhr = this.xhr = new XMLHttpRequest();

            // Note that your request may look different. It is up to you and your editor
            // integration to choose the right communication channel. This example uses
            // a POST request with JSON as a data structure but your configuration
            // could be different.
            xhr.open( 'POST', domain+'/img_uploaded/', true);
            xhr.responseType = 'json';
        }

        // Initializes XMLHttpRequest listeners.
        _initListeners( resolve, reject, file ) {
            const xhr = this.xhr;
            const loader = this.loader;
            const genericErrorText = `Couldn't upload file: ${ file.name }.`;

            xhr.addEventListener( 'error', () => reject( genericErrorText ) );
            xhr.addEventListener( 'abort', () => reject() );
            xhr.addEventListener( 'load', () => {
                const response = xhr.response;

                // This example assumes the XHR server's "response" object will come with
                // an "error" which has its own "message" that can be passed to reject()
                // in the upload promise.
                //
                // Your integration may handle upload errors in a different way so make sure
                // it is done properly. The reject() function must be called when the upload fails.
                if ( !response || response.error ) {
                    return reject( response && response.error ? response.error.message : genericErrorText );
                }

                // If the upload is successful, resolve the upload promise with an object containing
                // at least the "default" URL, pointing to the image on the server.
                // This URL will be used to display the image in the content. Learn more in the
                // UploadAdapter#upload documentation.
                resolve( {
                    default: response.url
                } );
            } );

            // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
            // properties which are used e.g. to display the upload progress bar in the editor
            // user interface.
            if ( xhr.upload ) {
                xhr.upload.addEventListener( 'progress', evt => {
                    if ( evt.lengthComputable ) {
                        loader.uploadTotal = evt.total;
                        loader.uploaded = evt.loaded;
                    }
                } );
            }
        }

        // Prepares the data and sends the request.
        _sendRequest( file ) {
            // Prepare the form data.
            const data = new FormData();

            data.append( 'upload', file );

            // Important note: This is the right place to implement security mechanisms
            // like authentication and CSRF protection. For instance, you can use
            // XMLHttpRequest.setRequestHeader() to set the request headers containing
            // the CSRF token generated earlier by your application.

            // Send the request.
            this.xhr.send( data );
        }
    }

    // ...

    function UploadAdapterPlugin( editor ) {
        editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
            // Configure the URL to the upload script in your back-end here!
            return new MyUploadAdapter( loader );
        };
    }


    DecoupledEditor
        .create( document.querySelector( '#editor' ),{
            extraPlugins: [ UploadAdapterPlugin ],
             image: {
                // ...
                upload: {
                    panel: {
                        items: [ 'insertImageViaUrl' ]
                    }
                }
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
