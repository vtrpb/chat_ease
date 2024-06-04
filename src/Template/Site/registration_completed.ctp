<?php

  use Cake\Core\Configure;

  $domain     = Configure::read('domain');        

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Truck Zone</title>


    <script>
        var domain = '<?=$domain?>';
        setTimeout(function() {
            window.location.href = domain+"/Users/login";
        }, 2500);
    </script>

    
     <!-- Inserir scripts adicionais aqui -->
    <?= $this->fetch('script') ?>

    <!-- JQuery Version 3.5.1 -->
    <?= $this->Html->script('medwise/jquery.min.js') ?>

    <!-- Bootstrap Version 4.5.3 -->
    <?= $this->Html->script('medwise/bootstrap.bundle.min.js') ?>

    <!-- Countdown Timer -->    
    <?= $this->Html->script('medwise/jquery.countdown.min.js') ?>

    <!-- Appear JS -->
    <?= $this->Html->script('medwise/jquery.appear.min.js') ?>

    <!--Pretty Photo Version 3.1.6-->
    <?= $this->Html->script('medwise/jquery.prettyPhoto.min.js') ?>

    <!-- Count To JS -->
    <?= $this->Html->script('medwise/jquery.countTo.min.js') ?>

    <!-- Slick Slider Version 1.8.1 -->
    <?= $this->Html->script('medwise/slick.min.js') ?>

    <!-- jQuery UI (Date Picker) -->
    <?= $this->Html->script('medwise/jquery-ui.min.js') ?>

    <!-- Custom JS -->
    <?= $this->Html->script('medwise/script.min.js') ?>

    <!--Slider Revolution version 5-->
    <?= $this->Html->script('slider-revolution/revolution/js/jquery.themepunch.tools.min.js') ?>
    <?= $this->Html->script('slider-revolution/revolution/js/jquery.themepunch.revolution.min.js') ?>  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>

    <!-- Favicon -->
    <?= $this->Html->meta('icon', 'favicon.ico', ['type' => 'image/x-icon']) ?>

    <!-- Bootstrap Framework Version 4.5.3 -->
    <?= $this->Html->css('medwise/bootstrap.min.css') ?>

    <?= $this->Html->css('custom.css') ?>

    <!-- Ion Icons Version 5.1.0 -->
    <?= $this->Html->css('medwise/ionicons.css') ?>

    <!-- Medical Icons -->
    <?= $this->Html->css('medwise/medwise-icons.css') ?>

    <!-- Stylesheets -->
    <?= $this->Html->css('medwise/vendors.min.css') ?>
    <?= $this->Html->css('medwise/style.min.css', ['id' => 'style']) ?>
    <?= $this->Html->css('medwise/components.min.css', ['id' => 'components']) ?>

    <!-- Revolution Slider 5.4 -->
    <?= $this->Html->css('slider-revolution/revolution/css/settings.css') ?>
    <?= $this->Html->css('slider-revolution/revolution/css/layers.css') ?>
    <?= $this->Html->css('slider-revolution/revolution/css/navigation.css') ?>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Manrope:wght@300;400;600;800&family=Volkhov:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css" />

    <!-- Inclua no cabeçalho do layout para incluir a biblioteca do fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="coming-soon">  
    
    <div class="coming-soon-box">
        <div class="image" align="center">
            <a href="<?= $domain ?>"><img src=<?= $domain.'/img/logo_small.png' ?> class="img" alt="Truck Zone"></a>
        </div>    
        <div><p><br></p></div>        
        <h6 class="heading h3 font-bold mb-50">Bem-vindo(a) ao Truck Zone!</h6>
         <p class="h5 text-center mb-20">
            Cadastro realizado com sucesso!</p>
        
        <h6 class="mb-20 mt-40">Nos siga</h6>
        <ul class="social social-2x social-round justify-content-center mb-0">
            <li><a class="facebook" href=""><i class="ion-logo-facebook"></i></a></li>
            <li><a class="youtube" href=""><i class="ion-logo-youtube"></i></a></li>
            <li><a class="twitter" href=""><i class="ion-logo-twitter"></i></a></li>
            <li><a class="linkedin" href=""><i class="ion-logo-linkedin"></i></a></li>
        </ul>
    </div>  
</body>

</html>