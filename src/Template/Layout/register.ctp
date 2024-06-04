<?php 
    use Cake\Core\Configure;

    $domain = Configure::read('domain');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>	
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>:: Truck Zone :: </title>
	<?php
		echo $this->Html->script('../plugins/jquery/jquery.min');
		echo $this->Html->script('../plugins/bootstrap/js/bootstrap.bundle.min');			
		echo $this->Html->script('bootstrap-switch.min');	
		echo $this->Html->script('../dist/js/adminlte.min');		
		echo "<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js'></script>";	
		echo "<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js\"></script>";		

		echo $this->Html->css('../plugins/fontawesome-free/css/all.min');
		echo $this->Html->css('../dist/css/adminlte.min');
		echo $this->Html->css('custom');
		
		echo "<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback'>";
		echo "<link rel='styleshee' href='https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css'>";
	?>

	<!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5ST98M5');</script>
    <!-- End Google Tag Manager -->

    <script type="text/javascript">
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "h6x3ftb15i");
    </script>
	
</head>
<body class="hold-transition">
	
  <?= $this->Flash->render(); ?>

  <?= $this->fetch('content') ?>

  <div class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-8">                
          	  <div class="col-md-12" align="left">                
	  		Já é cadastrado? <a href=<?=$domain . '/Users/login'?> > clique aqui.</a>
			  </div>	  
			  <div class="col-md-12" align="right">                
			  		<strong>Copyright &copy; <?php echo date('Y');  ?> / Truck Zone.</strong>     
			  </div>
          </div>
        </div>
       </div>
  </div>

  
  <!--<div class="row justify-content-center">
  	  <div class="col-md-4" align="left">                
	  		Já é cadastrado? <a href=<?=$domain . '/Users/login'?> > clique aqui.</a>
	  </div>	  <div class="col-md-8" align="left">                
	  		<strong>Copyright &copy; <?php echo date('Y');  ?> / Truck Zone</strong>     
	  </div>
 </div>-->

</body>
</html>


