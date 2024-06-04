<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>:: Truck Zone :: </title>
<script>
var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
</script>
<?php
	echo $this->Html->script('../plugins/jquery/jquery.min');
	echo $this->Html->script('../plugins/bootstrap/js/bootstrap.bundle.min');	
	echo $this->Html->script('bootstrap-switch.min');	
	echo $this->Html->script('../dist/js/adminlte.min');
	echo $this->Html->script('select2/select2.min');
	echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'); 
	echo $this->Html->script('../plugins/bootstrap-datepicker-1.9.0-dist/js/bootstrap-datepicker.min');	
	echo $this->Html->script('../plugins/dropzone/min/dropzone.min');	
	
	
	echo "<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js'></script>";	
	echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js'></script>";

	echo $this->Html->css('../plugins/bootstrap-datepicker-1.9.0-dist/css/bootstrap-datepicker.min');
	echo $this->Html->css('../plugins/dropzone/min/dropzone.min');
	echo $this->Html->css('../plugins/fontawesome-free/css/all.min');
	echo $this->Html->css('../dist/css/adminlte.min');
	echo $this->Html->css('custom');
	echo $this->Html->css('select2.min');	
	
	//echo $this->Html->css('../plugins/daterangepicker/daterangepicker');
	//echo $this->Html->css('../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min');		
	//echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.css'>";
	echo "<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback'>";
	echo "<link rel='styleshee' href='https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css'>";
?>