<!DOCTYPE html>
<html lang="pt-br">
<head>	
    <?=
        $this->element('AdminLte/head'); 
    ?>   
</head>
<body class="hold-transition sidebar-mini">
	<?= $this->Flash->render(); ?>
    <div class="wrapper">                                              
        <?= $this->element('AdminLte/header'); ?>        
        <?= $this->fetch('content') ?>
        
        <!-- The Modal -->
		<div id="myModal" class="modal">
		  <!-- The Close Button -->
		  <span class="close">&times;</span>
		  <!-- Modal Content (The Image) -->
		  <img class="modal-content" id="img01">
		  <!-- Modal Caption (Image Text) -->
		  <div id="caption"></div>
		</div> 
    </div>
    <?= 
    	$this->element('AdminLte/footer');
   	?>     
</body>
</html>


