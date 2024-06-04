<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * ReportFiles Controller
 *
 * @property \App\Model\Table\ReportFilesTable $ReportFiles
 *
 * @method \App\Model\Entity\ReportFile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($report_id = null)
    {        
        $this->paginate = [
            'contain' => ['Reports'],
            'conditions' => ['ReportFiles.report_id' => $report_id, 'ReportFiles.canceled' => false]
        ];

        $reportFiles = $this->paginate($this->ReportFiles);

        $this->set(compact('reportFiles','report_id'));
    }

    /**
     * View method
     *
     * @param string|null $id Report File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reportFile = $this->ReportFiles->get($id, [
            'contain' => ['Reports']
        ]);

        $this->set('reportFile', $reportFile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($report_id = null,$report_number = null)
    {
        $image_flag = true;

        $max_width = 1920;
        $max_height = 1080;

        $session = $this->request->session();
        $user_id = $session->read('Users.id');        

        $reportFile = $this->ReportFiles->newEntity();

        if ($this->request->is('post')) {

            // Date corrections
            $format = "d/m/Y";
            $date_of_document = \DateTime::createFromFormat($format, $this->request->data['date_of_document']);           
            $this->request->data['date_of_document'] = $date_of_document;                     
            //

            //$reportFile = $this->ReportFiles->patchEntity($reportFile, $this->request->getData());

            $this->checkDir(WWW_ROOT . DS . 'report_files'); 

            if(!empty($this->request->data['filename']['name']))  {
                //
                $conn = ConnectionManager::get('default');            
                $stmt = $conn->execute('SELECT last_value FROM report_files_id_seq;');        
                $max_id = $stmt ->fetchAll('assoc');     
                //
                $uploaded_file = $this->request->data['filename']; //put the data into a var for easy use                

                if (empty($this->request->data['name']) )  {                   
                    $this->request->data['name'] = pathinfo($this->request->data['filename']['name'], PATHINFO_FILENAME);
                }
                else  {                   
                    
                    $forbidden  = array('\\','/',':','*','?','"','<','>');  // \/:*?"<>|
                    $ok         = array('-','-','-','-','-','-','-','-');
                    $this->request->data['name']  = str_replace($forbidden, $ok, $this->request->data['name'] );
                }

                $this->request->data['canceled'] = false;

                $ext = substr(strtolower(strrchr($uploaded_file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpeg', 'jpg', 'gif', 'png', 'pdf', 'tif', 'tiff', 'doc', 'docx', 'txt', 'xls', 'xlsx', 'csv', 'numbers', 'ppt', 'pptx', 'mp3','ogg','wav','mp4','html','htm','zip','rar'); //set allowed extensions                              

                //only process if the extension is valid
                if(in_array($ext, $arr_ext) && (filesize($uploaded_file['tmp_name']) <= 20971520 ) )  { // Critério do tamanho da imgagem dos temas

                    //do the actual uploading of the file. First arg is the tmp name, second arg is
                    //where we are putting it                    
                    $uploaded_file['name'] = ($max_id[0]['last_value']+1) . '.' . $ext;
                    //do the actual uploading of the file. First arg is the tmp name, second arg is where we are putting if                                        
                    move_uploaded_file($uploaded_file['tmp_name'], WWW_ROOT . DS . 'report_files' . DS . $uploaded_file['name']);                    

                    if (in_array($ext,array('jpeg','jpg','gif','png')) )  {

                        list($width, $height, $type, $attr) = getimagesize($uploaded_file['tmp_name']);                     

                        if ($width > $max_width || $height > $max_height)  {

                            if  ($width > $height)  {
                                $new_width  = $max_width;
                                $new_height = ($max_width/$width)*$height;                                                        
                            } elseif  ($width < $height)  {
                                $new_height = $max_height;
                                $new_width = ($max_height/$height)*$width;                                
                            }

                            $new_image = imagecreatetruecolor($new_width, $new_height);

                            switch($ext)  {                                
                                case 'gif':
                                    $image = imagecreatefromgif(WWW_ROOT . DS . 'report_files' . DS . $uploaded_file['name']);
                                    // Copia a imagem original para a imagem com novo tamanho
                                    imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width,$new_height, $width, $height);
                                    // Envia a nova imagem gif para o lugar da antiga
                                    imagegif($new_image, WWW_ROOT . DS . 'report_files' . DS . $uploaded_file['name']);
                                    break;
                                case 'jpg':
                                    $image = imagecreatefromjpeg(WWW_ROOT . DS . 'report_files' . DS . $uploaded_file['name']);
                                    // Copia a imagem original para a imagem com novo tamanho
                                    imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width,$new_height, $width, $height);
                                    // Envia a nova imagem gif para o lugar da antiga
                                    imagejpeg($new_image, WWW_ROOT . DS . 'report_files' . DS . $uploaded_file['name']);
                                    break;
                                case 'jpeg':
                                    $image = imagecreatefromjpeg(WWW_ROOT . DS . 'report_files' . DS . $uploaded_file['name']);
                                    // Copia a imagem original para a imagem com novo tamanho
                                    imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width,$new_height, $width, $height);
                                    // Envia a nova imagem gif para o lugar da antiga
                                    imagejpeg($new_image, WWW_ROOT . DS . 'report_files' . DS . $uploaded_file['name']);
                                    break;
                                case 'png':
                                    $image = imagecreatefrompng(WWW_ROOT . DS . 'report_files' . DS . $uploaded_file['name']);
                                    // Copia a imagem original para a imagem com novo tamanho
                                    imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width,$new_height, $width, $height);
                                    // Envia a nova imagem gif para o lugar da antiga
                                    imagepng($new_image, WWW_ROOT . DS . 'report_files' . DS . $uploaded_file['name']);
                                    break;
                            } 
                        }
                    }                                                         
                    
                    //prepare the filename for database entry 
                    $this->request->data['filename'] = $uploaded_file['name'];

                    $reportFile = $this->ReportFiles->patchEntity($reportFile, $this->request->getData());           
                }
                else  {

                    $image_flag = false;
                    
                }
            }

            $reportFile = $this->ReportFiles->patchEntity($reportFile, $this->request->getData());           

            if ($image_flag)  {         
                
                $reportFile->locked = false;

                if ($this->ReportFiles->save($reportFile) && $image_flag) {

                    $this->Flash->success(__('Arquivo salvo com sucesso!'));

                    $ext = substr(strtolower(strrchr($reportFile->filename, '.')), 1);
                    // public function downloadFile($filename = null, $name = null,$ext=null) { 
                    /*$url_file_link = Router::url(array("controller"=>"Files","action"=>"downloadFile", $reportFile->filename,$reportFile->name, $ext),true);                    
                    $link = "<a href=\"".$url_file_link. "\">Baixar arquivo</a>";

                    $bodyEmail = "Dr(a) ".$doctorUser->full_name." lhe enviou um novo arquivo.";
                    $bodyEmail .= "<table class=\"table-responsive\"><tr><th>Nome do arquivo</th><th>Extensão</th><th>Link</th></tr>";
                    $bodyEmail .= "<tr><td>".$file->name."</td><td>".".". $ext . "</td><td>".$link."</td></tr></table>";
                    $bodyEmail .= "<br><p>Obrigado por usar nosso fichário.</p>";

                   if ( !is_null($patientUser->email) )  {
                        if ($this->Main->sendEmail(['to'=>$patientUser->email,'subject'=>'Novo arquivo enviado para você','title'=>'Veja abaixo o arquivo','body'=>$bodyEmail])) {
                            $this->Flash->success(__('Seu paciente foi informado por email deste arquivo.'));
                            
                       }
                       else {
                            $this->Flash->error(__('Não foi possível notificar seu paciente por email! Fale com suporte.'));                        
                       }
                   }
                   else  {
                        $this->Flash->error(__('Seu paciente está sem email cadastrado. Não foi possível avisá-lo por email desta atualização.'));                        
                   }*/
                   
                   return $this->redirect(['controller'=>'Reports','action' => 'edit',$report_id]);

                }
                debug($reportFile->errors()) or die();

                $this->Flash->error(__('O Arquivo não pode ser salvo, tente novamente!'));
            }
            else  {

                $this->Flash->error(__('Tamanho máximo de 20MB por arquivo.'));
            }            
        }

        $query = $this->ReportFiles->Reports->find('list', [
            'keyField' => 'id',
            'valueField' => 'report_number',
            'conditions' => ['Reports.id' => $report_id]
        ]);

        $reports = $query->toArray();

        $this->set(compact('reportFile', 'reports','report_id','report_number'));


    }

    /**
     * Edit method
     *
     * @param string|null $id Report File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null, $report_id = null, $report_number = null)
    {
        $reportFile = $this->ReportFiles->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            // Date corrections
            $format = "d/m/Y";
            $date_of_document = \DateTime::createFromFormat($format, $this->request->data['date_of_document']);           
            $this->request->data['date_of_document'] = $date_of_document;                     
            //

            $reportFile = $this->ReportFiles->patchEntity($reportFile, $this->request->getData());

            if ($this->ReportFiles->save($reportFile)) {

                $this->Flash->success(__('Arquivo editado com sucesso!'));

                return $this->redirect(['action' => 'index',$report_id,$report_number]);
                //echo $this->Html->link('<button type="button" class="btn btn-default btn-xs" title="Arquivos"><span class="glyphicon glyphicon-folder-open" aria-hidden="true" ></span></button> ',['controller'=>'ReportFiles','action' => 'index',$report->id,$report->report_number],['escape' => false]);
            }
            $this->Flash->error(__('O arquivo não pode ser editado, tente novamente!'));
        }


       // $reports = $this->ReportFiles->Reports->find('list', ['limit' => 200]);

        $query   = $this->ReportFiles->Reports->find('list', [
            'keyField' => 'id',
            'valueField' => 'report_number',
            'conditions' => ['Reports.id' => $report_id]
        ]);

        $reports = $query->toArray();

        $this->set(compact('reportFile', 'reports','report_id','report_number'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Report File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $reportFile = $this->ReportFiles->get($id);

        if ($this->ReportFiles->delete($reportFile)) {

            $this->Flash->success(__('The report file has been deleted.'));

        } else {

            $this->Flash->error(__('The report file could not be deleted. Please, try again.'));

        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Remove method
     *
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function removeFile($file_id = null,$report_id = null,$report_number = null) 
    {
         $file = $this->ReportFiles->find('all',['conditions'=> ['ReportFiles.id'=> $file_id]])->first(); 

         if ($file) {

           $this->ReportFiles->updateAll(['canceled'=> true], ['ReportFiles.id' => $file_id]);

           $this->Flash->success(__('Arquivo deletado com sucesso!'));

           return $this->redirect(['action' => 'index',$report_id,$report_number]);
         }

         else  {

            $this->Flash->error(__('Arquivo não encontrado!'));

         }
      

    }  

    public function downloadFile($filename = null, $name = null,$ext=null) { 

        $filePath = WWW_ROOT .'report_files'. DS . $filename;

        $downloadName = $name . "." . $ext;        

        $response = $this->response->withFile(
            $filePath,
            ['download' => true, 'name' => $downloadName]
        );

        return $response;
    }   

}
