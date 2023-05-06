<?php

include 'c:/xampp/htdocs/freshshop-master/commandeC.php';

$error = "";

// create commande
$commande = null;

// create an instance of the controller
$commandeC = new commandeC();
if (
    isset($_POST["dateEnvoi"]) &&
    isset($_POST["qnt"]) &&
    isset($_POST["prixCmd"]) &&
    isset($_POST["idclient"])
) {
    if (
        !empty($_POST["dateEnvoi"]) &&
        !empty($_POST["qnt"]) &&
        !empty($_POST["prixCmd"]) &&
        !empty($_POST["idclient"])
    ) {
        $commande = new commande(
            null,
            new DateTime($_POST['dateEnvoi']),
            $_POST['qnt'],
            $_POST['prixCmd'],
            $_POST['idclient']
        );
        $commandeC->addcommande($commande);
        header('Location:addcommande.php');
    } else
        $error = "Missing information";
}


?>
<!DOCTYPE html>
<html lang="fr">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>ThewayShop - Ecommerce Bootstrap 4 HTML Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="C:/xampp/htdocs/freshshop-master/qrcode.min.js"></script>

</head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                            <option>¥ JPY</option>
                            <option>$ USD</option>
                            <option>€ EUR</option>
                        </select>
                    </div>
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#"> +11 900 800 100</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="#"><i class="fa fa-user s_color"></i> My Account</a></li>
                            <li><a href="#"><i class="fas fa-location-arrow"></i> Our location</a></li>
                            <li><a href="#"><i class="fas fa-headset"></i> Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="login-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="Sign In">
                            <option>Register Here</option>
                            <option>Sign In</option>
                        </select>
                    </div>
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT80
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT30
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu"
                        aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>
                        <li class="dropdown active">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
                                <li><a href="shop.html">Sidebar Shop</a></li>
                                <li><a href="shop-detail.html">Shop Detail</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="addcommande.php">Commande</a></li>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="addlivraison.php">Livraison</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.html">Contact Us</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu"><a href="#">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="badge">3</span>
                                <p>My Cart</p>
                            </a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-02.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$60.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-03.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>1x - <span class="price">$40.00</span></p>
                        </li>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <center><form action="" method="POST" id="FormCmd">
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        
    
        <div class="cart-box-main">
        <div class="container">
        <label>Date Envoi *</label>
        <input type="date" name="dateEnvoi" placeholder="dateEnvoi" id="denv"><br>
            <span id="erdenv"></span>
        <br>

        <label>Quantité *</label>
        <input type="number" name="qnt" placeholder="qnt" id="qnt"><br>
            <span id="erQnt"></span>
        <br>

        <label>prix *</label>
        <input type="number" name="prixCmd" placeholder="prixCmd" id="prix"><br>
            <span id="erprix"></span>
        <br>

        <label>Votre id *</label>
        <input type="text" name="idclient" placeholder="idclient" id="id"><br>
            <span id="erid"></span>
        <br>
            <hr>
        <button type="submit"> Commander </button>
                
                
            <!--<div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-prixCmd">
                        <div class="title-left">
                            <h3>Votre Commande</h3>
                        </div>
                        <form class="needs-validation" novalidate>
                            <div class="row">
                        
                            </div>
                            <div class="mb-3">
                                <label for="username">Date Envoi *</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="dateEnvoi" placeholder="" required>
                                    <div class="invalid-feedback" style="width: 100%;"> Your username is required.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="qnt">Quantité *</label>
                                <input type="number" class="form-control" id="qnt" placeholder="1">
                                <div class="invalid-feedback"> Please enter a valid email prixCmd for shipping updates.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="prixCmd">Entrer le prix *</label>
                                <input type="text" class="form-control" id="prixCmd" placeholder="" required>
                                <div class="invalid-feedback"> Please enter your shipping prixCmd. </div>
                            </div>
                            <div class="mb-3">
                                <label for="idclient">Votre id *</label>
                                <input type="text" class="form-control" id="idclient" placeholder="">
                            </div>
                            <hr class="mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="same-prixCmd">
                                <label class="custom-control-label" for="same-prixCmd">Shipping prixCmd is the same as
                                    my billing prixCmd</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="save-info">
                                <label class="custom-control-label" for="save-info">Save this information for next
                                    time</label>
                            </div>
                            <hr class="mb-4">
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="payment-icon">
                                        <ul>
                                            <li><img class="img-fluid" src="images/payment-icon/1.png" alt=""></li>
                                            <li><img class="img-fluid" src="images/payment-icon/2.png" alt=""></li>
                                            <li><img class="img-fluid" src="images/payment-icon/3.png" alt=""></li>
                                            <li><img class="img-fluid" src="images/payment-icon/5.png" alt=""></li>
                                            <li><img class="img-fluid" src="images/payment-icon/7.png" alt=""></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-1">
                        </form>
                    </div>
                </div>
                
                        
                        
                        
                        <div class="col-12 d-flex shopping-box"> <a href="addcommande.php"
                                class="ml-auto btn hvr-hover">Place
                                Order</a> </div>
                    </div>
                </div>
            </div>-->

        </div>
    </div>
    </form></center>
    <form method="post" action="export.php">
        <input type="submit" name="export" value="Exporter en Excel">
    </form>
    <br>
    <br>

    <div class="corps">
    <div class="formulaire" name="formulaire">
      <div class="titre">Inscription</div>
      <form action="inscription_post.php" method="POST" name="form1">
        <div class="input-nom-prenom">
          <div class="titre-input1">
            <p class="titre">num Commande</p>
            <input type="text" name="Prenom" class="form-control" oninput="change(this)" required>
          </div>
          <div class="titre-input2">
            <!--<p class="titre">Nom</p>
            <input type="text" name="Nom" oninput="change(this)" class="form-control" required>
          </div>
        </div>
        <div class="titre-input">
          <p class="titre">Matricule</p>
          <input type="text" name="Matricule" class="form-control" oninput="change(this)" pattern="^[0-9]{6}" required>
        </div>

        <div class="input-nom-prenom">
          <div class="titre-input1">
            <p class="titre">Numero </p>
            <input type="tel" pattern="^[0-9]{8}" class="form-control" oninput="change(this)" name="Numero" required>
          </div>
          <div class="titre-input2">
            <p class="titre">Email</p>
            <input type="email" name="email" class="form-control" oninput="change(this)" placeholder="Ex:you@gmail.com"
              pattern="(^[a-z0-9]+)@([a-z0-9])+(\.)([a-z]{2,4})" required>

          </div>
        </div>

        <div class="titre-input">
          <p class="titre">Date de naissance</p>
          <input type="date" class="form-control" oninput="change(this)" name="dateNaissance">
        </div>
        <div class="titre-input">
          <p class="titre">Password</p>
          <input type="password" name="Password" oninput="change(this)" class="form-control" required>
        </div>
        <p class="titre">Genre</p>
        <div class="genre"><label for="Genre" class="titre">Masculin</label>
          <input type="radio" value="masculin" name="Genre" oninput="change(this)" class="form-control" required>
          <label for="Genre" class="titre">Feminin</label>
          <input type="radio" value="feminin" name="Genre" class="form-control" oninput="change(this)" required>
          <label for="Genre" class="titre">Personalisée</label>
          <input type="radio" value="Personalise" name="Genre" class="form-control" oninput="change(this)" required>
        </div>-->




    </div>
    </form>
    <!-- on commence a partir d'ici -->
    <div class="code_qr">
      <img class="qrious">

      <div class="information">
        <!--<p style="color:blue"> Valeur:</p>
        <p> Ici la valeur du code qr</p>-->
        </div>
    </div>
  </div>

  </div>
  <script src="qrious.js"></script>
  <script src="script.js"></script>
    
    
        <!-- End Cart -->

        <!-- Start Instagram Feed  -->
     <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->


    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Business Time</h3>
                            <ul class="list-time">
                                <li>Monday - Friday: 08.00am to 05.00pm</li>
                                <li>Saturday: 10.00am to 08.00pm</li>
                                <li>Sunday: <span>Closed</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Newsletter</h3>
                            <form class="newsletter-box">
                                <div class="form-group">
                                    <input class="" type="email" name="Email" placeholder="Email prixCmd*" />
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <button class="btn hvr-hover" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Social Media</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>About Freshshop</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Our Sitemap</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Delivery Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>prixCmd: Michael I. Days 3756 <br>Preston
                                        Street Wichita,<br> KS 67213 </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+1-888 705
                                            770</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a
                                            href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <iframe class="position-relative rounded w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3193.650616427098!2d10.189367415255984!3d36.89928778068462!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12e2cb7454c6ed51%3A0x683b3ab5565cd357!2sESPRIT!5e0!3m2!1sen!2stn!4v1656489344182!5m2!1sen!2stn"
                            frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0" style="filter: grayscale(100%) invert(92%) contrast(83%); border: 0;"></iframe>
                        </div>
                    </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
            <a href="https://html.design/">html design</a>
        </p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
    <script>
        let FormCmd = document.getElementById('FormCmd');
        FormCmd.addEventListener('submit', function(e){
            let denv = document.getElementById('denv');
            let qnt = document.getElementById('qnt');
            let prix = document.getElementById('prix');
            let id = document.getElementById('id');

            if(denv.value.trim() == "")
            {
                let erdenv = document.getElementById('erdenv');
                erdenv.innerHTML = "date envoi est vide";
                erdenv.style.color = 'red';
                e.preventDefault();
            }
            if(qnt.value.trim() == "" || qnt.value.length > 4)
            {
                let erQnt = document.getElementById('erQnt');
                erQnt.innerHTML = "est vide ou depasse 4 chiffres";
                erQnt.style.color = 'red';
                e.preventDefault();
            }
            if(prix.value.trim() == "")
            {
                let erprix = document.getElementById('erprix');
                erprix.innerHTML = "prix est vide";
                erprix.style.color = 'red';
                e.preventDefault();
            }
            if(id.value.trim() == "")
            {
                let erid = document.getElementById('erid');
                erid.innerHTML = "votre id est vide";
                erid.style.color = 'red';
                e.preventDefault();
            }
            
        });
    </script>
</body>

</html>