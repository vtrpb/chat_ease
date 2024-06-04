<?php 
    use Cake\Core\Configure;

    $domain = Configure::read('domain');  
?>

 <!-- Footer -->

  <footer class="container-fluid bg-footer">
    <br><br>
    <div class="container">
      <div class="row">
        <!-- Primeira coluna -->
        <div class="col-md-4">
          <h5><strong>Institucional</strong></h5>
          <ul class="list-unstyled">
            <li><a href="#">Home</a></li>
            <li><a href="#">Compre Caminhão</a></li>
            <li><a href="#">Compre Ônibus</a></li>
            <li><a href="#">Anuncie conosco</a></li>
            <li><a href="#">Ajuda</a></li>
          </ul>
        </div>

        <!-- Segunda coluna -->
        <div class="col-md-4">
          <h5><strong>Nossas redes sociais</strong></h5>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="#"><i class="fab fa-instagram fa-2x"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook fa-2x"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-youtube fa-2x"></i></a></li>
          </ul>
        </div>

        <!-- Terceira coluna -->
        <div class="col-md-4">
          <h5><strong>Contato</strong></h5>
          <p>Suporte: <strong>(83) 99199-7861</strong><br>suporte@truckzone.com.br</p>
          <p>Comercial: <strong>(61) 98253-0789</strong><br>comercial@truckzone.com.br</p>
        </div>
      </div>
    </div>
  </footer>

    <div id="back"><i class="ion-chevron-up-sharp"></i></div>