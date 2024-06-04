<?php 
    use Cake\Core\Configure;

    $domain = Configure::read('domain');  
?>

 <footer class="footer-2">           <!-- Footer Style 2 -->
        <div class="footer-pri">            <!-- Primary Footer -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="widget widget-about">           <!-- Widget -->
                            <a href="index-hospital-classic.html">
                                <img src=<?=$domain."/img/logo_extra_small.png"?> class="logo-footer" alt="">
                            </a>
                            <p class="mt-20 footer-text"></p>
                            <hr class="mt-30 mb-30" />
                            <h5 class="heading font-bold">Contato</h5>
                            <ul class="contact footer-text">
                                <li>
                                    <i class="ion-location-outline"></i>
                                    <div>
                                        <strong>Truck Zone</strong>
                                        <br>
                                        Avenida Governador Argemiro de Figueiredo, 210
                                    </div>
                                </li>
                                <li><i class="ion-call-outline"></i> +5583988114138</li>
                                <li><i class="ion-mail-outline"></i> contato@truckzone.com.br</li>
                            </ul>
                            <hr class="mt-30 mb-30" />
                            <h5 class="heading font-bold mb-20">Redes Sociais</h5>
                            <ul class="social social-round social-2x">
                                <li><a class="instagram" href="https://instagram.com/truckzone" target="_blank"><i class="ion-logo-instagram"></i></a></li>
                                <li><a class="facebook"  href="https://www.facebook.com/truckzone" target="_blank"><i class="ion-logo-facebook"></i></a></li>
                                <li><a class="linkedin" href="https://www.linkedin.com/company/seu-caminhao" target="_blank"><i class="ion-logo-linkedin"></i></a></li>
                                <!--<li><a class="twitter" href=""><i class="ion-logo-twitter"></i></a></li>
                                <li><a class="google" href=""><i class="ion-logo-google"></i></a></li>
                                <li><a class="youtube" href=""><i class="ion-logo-youtube"></i></a></li>-->
                                <li><a class="whatsapp" href="https://api.whatsapp.com/send?phone=5583988114138" target="_blank"><i class="ion-logo-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!--<hr class="mt-30 mb-30 d-lg-none" />
                        <div class="widget widget-links">       
                            <h5 class="heading font-bold">Links Úteis</h5>
                            <ul>                                
                                <li><a href="https://veiculos.fipe.org.br/">Tabela FIPE</a></li>                                
                            </ul>
                        </div>-->
                        <!--<hr class="mt-30 mb-30" />-->
                        <!--<div class="widget widget-twitter">         
                            <h5 class="heading font-bold">Últimos Tweets</h5>
                            <div class="tweets">
                                <ul class="carousel-items">
                                    <li class="tweet-item">
                                        <p>How to tell if the hand sanitizer you’re buying is safe and actually works? <a href="">#askDoctor</a></p>
                                    </li>
                                    <li class="tweet-item">
                                        <p>Screen time doesn’t hurt kids’ social skills, says harvard university <a href="">#healthcare #dailyTips</a></p>
                                    </li>
                                    <li class="tweet-item">
                                        <p>Can clothes and shoes track infection into your house? What to Know <a href="">Read blog here</a></p>
                                    </li>
                                </ul>
                            </div>
                            <a href="" class="btn btn-outline-light curved btn-sm mt-10">Siga-nos</a>
                        </div>-->
                    </div>
                    <div class="col-lg-4">
                        <!--<hr class="mt-30 mb-30 d-lg-none" />
                        <div class="widget widget-timings"> 
                            <h5 class="heading font-bold">Horário de Funcionamento</h5>
                            <table class="table table-bordered footer-text">
                                <tr>
                                    <td>Seg - Sex</td>
                                    <td>9:00h às 18:00</td>
                                </tr>
                                <tr>
                                    <td>Sábados</td>
                                    <td>10:00h às 13:00h</td>
                                </tr>
                                <tr>
                                    <td>Domingo</td>
                                    <td>Fechado</td>
                                </tr>
                            </table>
                        </div>-->
                        <!--<hr class="mt-30 mb-30" /> -->
                        <!--<div class="widget widget-subscribe">   
                            <h5 class="heading font-bold">Subscreva nossa Newsletter</h5>
                            <p class="footer-text">Subscreva nossa newsletter para dicas diárias</p>
                            <form class="search">  
                                <div class="input-group">
                                    <input type="text" class="form-control curved style-1" placeholder="endereço de email...">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary curved" type="button">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr class="mt-30 mb-30" />
                        <div class="widget widget-pay">        
                            <h5 class="heading font-bold">Pagamentos Aceitos</h5>
                            <ul class="payment-list">
                                <li class="item">
                                    <img src=<?=$domain."/images/payment-type-1.png"?>>
                                </li>
                                <li class="item">
                                    <img src=<?=$domain."/images/payment-type-2.png"?>>
                                </li>
                                <li class="item">
                                    <img src=<?=$domain."/images/payment-type-3.png"?>>
                                </li>
                                <li class="item">
                                    <img src=<?=$domain."/images/payment-type-4.png"?>>
                                </li>
                                <li class="item">
                                    <img src=<?=$domain."/images/payment-type-5.png"?>>
                                </li>
                            </ul> 
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-sec">            <!-- Secondary Footer -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mt-10 mb-10">
                        <ul class="misc-links">
                            <li>
                                <a href="">Política de Privacidade</a>
                            </li>
                            <li>
                                <a href="">Termos e Condições</a>
                            </li>
                            <li>
                                <a href="">Direitos de Uso</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 mt-10 mb-10 text-right">
                        <p class="mb-0 footer-text text-lg-right text-center">&copy; <?= date('Y')?> - Todos os direitos reservados.
                            <a href="http://truckzone.com.br/" target="_blank" class="font-semi-bold">Truck Zone</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div id="back"><i class="ion-chevron-up-sharp"></i></div>