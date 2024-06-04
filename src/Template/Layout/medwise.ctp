<?php 
    use Cake\Core\Configure;

    $domain = Configure::read('domain');

    $this->assign('title', $title); 
?>
<!DOCTYPE html>

<html lang="pt-br">

<head>      
    <?= $this->element('Medwise/head'); ?>   
</head>

<body>
    <!--<div class="loader-backdrop">
        <div class="loader">
            <i class="nav-icon fa fa-solid fa-truck"></i>
        </div>
    </div>-->
    <?= $this->Flash->render(); ?>
    
    <?= $this->element('Medwise/header'); ?>        

    <?= $this->fetch('content') ?>        
    
    <?= $this->element('Medwise/footer');  ?>     
</body>

</html>