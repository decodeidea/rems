<!DOCTYPE html>
<html>

<head>

    <title><?php if($this->uri->segment('2')=='detail'){  echo $data->title; }else{ echo $controller_name;}?> | <?php echo  $this->appearance->name ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name='robots' content='noindex, nofollow' />
    <meta name="language" content="indonesia"> 

   

    </head>
    <body data-spy="scroll" data-target="#navSecondary" data-offset="170">

        <div class="body">
            <header id="header" class="header-narrow" >
                <div class="header-body">
                
                    <div class="header-container container">
                        <div class="header-row">
                            <div class="header-column">
                                <div class="header-logo">
                                    <a href="<?php echo base_url(); ?>">
                                        <img alt="Porto" width="80px" src="<?php echo base_url() ?>assets/uploads/settings/<?php echo $this->appearance->logo ?>">
                                    </a>
                                </div>
                            </div>
                            <div class="header-column text-right menu-top">
                                <img width="35" id="btn-menu" title="Menu" src="<?php echo base_url() ?>assets/theme/img/sentul/menu.png">
                                <div id="menu-box" class="col-md-4 col-xs-12 col-sm-12 menu-box">
                                <img id="arrow-menu" src="<?php echo base_url() ?>assets/theme/img/sentul/arrow-menu.png" width="25">
                                <div class="col-md-12 col-sm-12 col-xs-12 menu-content text-left">
                                    <ul class="menu-navigation">
                                        <li><span class="border-navi"></span><a href="<?php echo base_url() ?>category">Dijual</a>
                                        <ul class="child-navigation">
                                            <li><a href="<?php echo base_url() ?>category?status=2&category=1">Rumah</a></li>
                                            <li><a href="<?php echo base_url() ?>category?status=2&category=2">Apartement</a></li>
                                            <li><a href="<?php echo base_url() ?>category?status=2&category=3">Ruko</a></li>
                                        </ul>
                                        </li>
                                        <li><span class="border-navi"></span> <a href="<?php echo base_url() ?>category">Disewa </a>
                                        <ul class="child-navigation">
                                            <li><a href="<?php echo base_url() ?>category?status=1&category=1">Rumah</a></li>
                                            <li><a href="<?php echo base_url() ?>category?status=1&category=2">Apartement</a></li>
                                            <li><a href="<?php echo base_url() ?>category?status=1&category=3">Ruko</a></li>
                                        </ul></li>
                                        <li><span class="border-navi"></span> <a href="<?php echo base_url() ?>fasilitas">Fasilitas</a></li>
                                        <li><span class="border-navi"></span> <a href="<?php echo base_url() ?>price-list">Price List</a></li>
                                        <li><span class="border-navi"></span> <a href="<?php echo base_url() ?>news">Berita</a></li>
                                        <li><span class="border-navi"></span> <a href="<?php echo base_url() ?>contact">Kontak Kami</a></li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div role="main" class="main">
                
<?php echo $page ?>
                
            </div>

            <footer id="footer" class="color color-secondary short">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 text-left">
                        <div class="title-footer">
                        <b><h4 class="mb-none mt-xs heading-dark">Find Us</h4></b>
                        </div>
                            <ul class="social-icons mb-md">
                                <li class="social-icons-instagram"><a href="http://www.instagram.com/" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                                <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li class="social-icons-googleplus"><a href="http://www.google.com/" target="_blank" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                                <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                            <div class="box-subscribe">
                            <input class="form-control subscribe" value="" placeholder="Subscribe" name="search" type="text">
                            <button class="btn-subscribe">Submit</button>
                            <div class="clearfix"></div>
                            </div>
                            <div class="footer-copyright">©Copyright and design by <a href="http://decodeidea.com" target="_blank">Decode</a></div>
                        </div>
                        <div class="col-md-2"></div>

                        <div class="col-md-2 text-left">
                        <div class="title-footer">
                        <b><h4 class="mb-none mt-xs heading-dark">Labels</h4></b>
                        </div>
                        <ul class="list-footer">
                            <li><a href="<?php echo base_url() ?>design-interior">Design Interior</a></li>
                            <li><a href="<?php echo base_url() ?>news">News</a></li>
                            <li><a href="<?php echo base_url() ?>category">Promo</a></li>
                            <li><a href="<?php echo base_url() ?>price-list">Download Price List</a></li>
                        </ul>

                        </div>

                        <div class="col-md-2 text-left">
                        <div class="title-footer">
                        <b><h4 class="mb-none mt-xs heading-dark">Property Dijual</h4></b>
                        </div>
                         <ul class="list-footer">
                            <li><a href="<?php echo base_url() ?>category">Rumah Dijual</a></li>
                            <li><a href="<?php echo base_url() ?>category">Apartement Dijual</a></li>
                            <li><a href="<?php echo base_url() ?>category">Ruko Dijual</a></li>
                            <li><a href="<?php echo base_url() ?>category">Cluster Dijual</a></li>
                        </ul>
                        </div>

                        <div class="col-md-2 text-left">
                        <div class="title-footer">
                        <b><h4 class="mb-none mt-xs heading-dark">Property Disewa</h4></b></div>
                        <ul class="list-footer">
                            <li><a href="<?php echo base_url() ?>category">Sewa Rumah</a></li>
                            <li><a href="<?php echo base_url() ?>category">Sewa Apartement</a></li>
                            <li><a href="<?php echo base_url() ?>category">Sewa Ruko</a></li>
                            <li><a href="<?php echo base_url() ?>category">Sewa Cluster</a></li>
                        </ul>
                        </div>

                        </div>
                    </div>
                </div>
                <!--<div class="footer-copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 center">
                                <p><i class="fa fa-map-marker"></i> 123 Street Name, Porto <span class="separator">|</span> <i class="fa fa-phone"></i> (123) 456-789 <span class="separator">|</span> <i class="fa fa-envelope"></i> <a href="mailto:mail@example.com">mail@example.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>-->
            </footer>
            
        </div>

        <!-- plugins -->
        <script src="<?php echo base_url() ?>assets/theme/plugins/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/theme/plugins/jquery.appear/jquery.appear.min.js"></script>
        <script src="<?php echo base_url() ?>assets/theme/plugins/jquery.easing/jquery.easing.min.js"></script>
        <script src="<?php echo base_url() ?>assets/theme/plugins/jquery-cookie/jquery-cookie.min.js"></script>
        <script src="<?php echo base_url() ?>assets/theme/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/theme/plugins/common/common.min.js"></script>
        <script src="<?php echo base_url() ?>assets/theme/plugins/jquery.validation/jquery.validation.min.js"></script>
        <script src="<?php echo base_url() ?>assets/theme/plugins/jquery.gmap/jquery.gmap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/theme/plugins/jquery.lazyload/jquery.lazyload.min.js"></script>
        <script src="<?php echo base_url() ?>assets/theme/plugins/isotope/jquery.isotope.min.js"></script>
        <script src="<?php echo base_url() ?>assets/theme/plugins/owl.carousel/owl.carousel.min.js"></script>
        <script src="<?php echo base_url() ?>assets/theme/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="<?php echo base_url() ?>assets/theme/plugins/vide/vide.min.js"></script>
        
        <!-- Theme Base, Components and Settings -->
        
        <script type="text/javascript" src="<?php echo base_url() ?>assets/theme/js/scrolloverflow.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/theme/js/jquery.fullPage.js"></script>
        
        <script src="<?php echo base_url() ?>assets/theme/js/theme.js"></script>
        
        <!-- Theme Initialization Files -->
        <script src="<?php echo base_url() ?>assets/theme/js/theme.init.js"></script>

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script src="<?php echo base_url() ?>assets/theme/js/custom.js"></script>
</body>
</html>
