<!DOCTYPE html>
<html>

<head>

    <title><?php if($this->uri->segment('2')=='detail'){  echo $data->title; }else{ echo $controller_name;}?> | <?php echo  $this->appearance->name ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name='robots' content='noindex, nofollow' />
    <meta name="language" content="indonesia"> 

    <!-- for Google -->

  <?php if($this->uri->segment('2')=='detail'){ ?>
    <meta name="description" content="<?php if ($this->uri->segment('1')=='news' or $this->uri->segment('1')=='fasilitas'){ echo strip_tags($data->content); }else{ echo strip_tags($data->description);  }?>" />
    <meta name="keywords" content="rumah dijual sentul bogor,rumah di sentul bogor,jual rumah murah,jual rumah,jual rumah bogor,rumah dijual murah,dijual rumah,jual rumahsentul bogor,rumah dijual di sentul bogor,jual rumah mutiara sentul bogor,jual rumah mega sentul bogor,jual rumah sentul city bogor,rumah dijual sentul city bogor,rumah dijual di bukit sentul bogor,rumah apung sentul bogor,rumah mewah dijual,rumah minimalis dijual,olx rumah dijual,rumah kontrakan dijual,jual rumah bogor murah,jual rumah bogor kota 2017,jual rumah bogor olx,jual rumah bogor utara,jual rumah bogor barat,jual rumah bogor asri cibinong,dijual rumah bogor asri,jual rumah di bogor asri cibinong,jual rumah ambar bogor regency,sewa rumah bogor 2017,sewa rumah bogor selatan,sewa rumah bogor barat,sewa rumah bogor olx,sewa rumah bogor timur,sewa rumah bogor raya,sewa rumah bogor tengah,sewa rumah di bogor asri,jual apartemen bogor icon,apartemen bogor,apartemen bogor valley,apartemen bogor icon,harga apartemen bogor" /> 


    <meta name="author" content="<?php echo base_url() ?>" />
    <meta name="copyright" content="<?php echo base_url() ?>" />
    <meta name="application-name" content="<?php echo base_url() ?>" /> 

    <!-- for Facebook -->
    <meta property="og:title" content="<?php echo $data->title ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="<?php if($this->uri->segment('1')=='fasilitas'){ ?> <?php echo base_url() ?>assets/uploads/fasilitas/<?php echo $data->id?>/<?php echo $data->images ?><?php }elseif($this->uri->segment('1')=='news'){ ?> <?php echo base_url() ?>assets/uploads/news/<?php echo $data->id?>/<?php echo $data->images ?><?php }else{ ?><?php echo base_url() ?>assets/uploads/album-unit/<?php echo $data->id_image ?>/<?php echo $data->image ?><?php }?>" />
    <meta property="og:url" content="<?php if($this->uri->segment('1')=='news'){ echo base_url()."news/detail/".$data->id."/".url_title($data->title); }else{ echo base_url()."unit/detail/".$data->id."/".url_title($data->title);} ?>" />
    <meta property="og:description" content="<?php if ($this->uri->segment('1')=='news' or $this->uri->segment('1')=='fasilitas'){ echo strip_tags($data->content); }else{ echo strip_tags($data->description);  }?>" /> 

    <!-- for Twitter -->
     <meta name="twitter:card" content="summary" />

    <meta name="twitter:title" content="<?php echo $data->title?>" />
    <meta name="twitter:description" content="<?php if ($this->uri->segment('1')=='news' or $this->uri->segment('1')=='fasilitas'){ echo strip_tags($data->content); }else{ echo strip_tags($data->description);  }?>" />
    <meta name="twitter:image" content="<?php if($this->uri->segment('1')=='fasilitas'){ ?> <?php echo base_url() ?>assets/uploads/fasilitas/<?php echo $data->id?>/<?php echo $data->images ?><?php }elseif($this->uri->segment('1')=='news'){ ?> <?php echo base_url() ?>assets/uploads/news/<?php echo $data->id?>/<?php echo $data->images ?><?php }else{ ?><?php echo base_url() ?>assets/uploads/album-unit/<?php echo $data->id_image ?>/<?php echo $data->image ?><?php }?>" /> 

<?php }else{?>


    <meta name="description" content="Cari beli dan jual properti secara online mudah aman sekaligus cepat, hanya di RumahSentul.com" />
    <meta name="keywords" content="rumah dijual sentul bogor,rumah di sentul bogor,jual rumah murah,jual rumah,jual rumah bogor,rumah dijual murah,dijual rumah,jual rumahsentul bogor,rumah dijual di sentul bogor,jual rumah mutiara sentul bogor,jual rumah mega sentul bogor,jual rumah sentul city bogor,rumah dijual sentul city bogor,rumah dijual di bukit sentul bogor,rumah apung sentul bogor,rumah mewah dijual,rumah minimalis dijual,olx rumah dijual,rumah kontrakan dijual,jual rumah bogor murah,jual rumah bogor kota 2017,jual rumah bogor olx,jual rumah bogor utara,jual rumah bogor barat,jual rumah bogor asri cibinong,dijual rumah bogor asri,jual rumah di bogor asri cibinong,jual rumah ambar bogor regency,sewa rumah bogor 2017,sewa rumah bogor selatan,sewa rumah bogor barat,sewa rumah bogor olx,sewa rumah bogor timur,sewa rumah bogor raya,sewa rumah bogor tengah,sewa rumah di bogor asri,jual apartemen bogor icon,apartemen bogor,apartemen bogor valley,apartemen bogor icon,harga apartemen bogor" /> 
   
    <meta name="author" content="<?php echo base_url() ?>" />
    <meta name="copyright" content="<?php echo base_url() ?>" />
    <meta name="application-name" content="<?php echo base_url() ?>" /> 

    <!-- for Facebook -->

    <meta property="og:title" content="rumah rumah sentul" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="<?php echo base_url() ?>assets/uploads/settings/<?php echo $this->appearance->logo ?>" />
    <meta property="og:url" content="<?php echo base_url() ?>" />
    <meta property="og:description" content="Cari beli dan jual properti secara online mudah aman sekaligus cepat, hanya di RumahSentul.com" /> 

    <!-- for Twitter -->
     <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="rumah rumah sentul" />
    <meta name="twitter:description" content="Cari beli dan jual properti secara online mudah aman sekaligus cepat, hanya di RumahSentul.com" />
    <meta name="twitter:image" content="<?php echo base_url() ?>assets/uploads/settings/<?php echo $this->appearance->logo ?>" /> 
<?php }?>

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/theme/img/sentul/fav.png" type="image/x-icon" />
        <link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/theme/img/apple-touch-icon.png">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- plugins CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/plugins/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/plugins/animate/animate.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/plugins/simple-line-icons/css/simple-line-icons.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/plugins/owl.carousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/plugins/owl.carousel/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/plugins/magnific-popup/magnific-popup.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/css/theme.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/css/theme-elements.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/css/theme-blog.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/css/theme-shop.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/theme/css/jquery.fullPage.css" />
        <script src="<?php echo base_url() ?>assets/theme/plugins/modernizr/modernizr.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/css/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/css/custom.css">
		
		
		<!-- Facebook Button BEGIN -->                            
		<div id="fb-root"></div>
		<script>
			(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=216339198484146";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>

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
