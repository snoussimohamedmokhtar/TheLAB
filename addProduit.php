<?php

include '../Controller/ProduitC.php';

$error = "";

// create produit
$produit = null;

// create an instance of the controller
$produitC = new produitC();
if (
    isset($_POST["type"]) &&
    isset($_POST["marque"]) &&
    isset($_POST["prix"]) &&
    isset($_POST["quantite"])&&
    isset($_POST["pd_img"])
) {
    if (
        !empty($_POST['type']) &&
        !empty($_POST["marque"]) &&
        !empty($_POST["prix"]) &&
        !empty($_POST["quantite"])&&
        !empty($_POST["pd_img"])
    ) {
        $produit = new produit(
            null,
            $_POST['type'],
            $_POST['marque'],
            $_POST['prix'],
            $_POST['quantite'],
            $_POST['pd_img']
        );
        $produitC->addproduit($produit);
        header('Location:ListProduit.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>


<body>
     <!-- Sidebar Start -->
     <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">Agrico</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="../index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    
                    

                   <!-- Gestion des Formations -->
                   <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>G-Formations</a>
                    <div class="dropdown-menu bg-transparent border-0">
                    <a href="ListFormateur.php" class="dropdown-item">Formateur</a>
                    <a href="ListFormation.php" class="dropdown-item">Formations</a>
                    <a href="maps.php" class="dropdown-item">Maps</a>
                    </div>
                     <!-- Gestion des produits -->
                    <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>G-Produit</a>
                    <div class="dropdown-menu bg-transparent border-0">
                    <a href="ListProduit.php"  class="dropdown-item">Produit</a>
                    <a href="ListReview.php"  class="dropdown-item">Review</a>
                    </div>
                     <!-- Gestion des commandes -->
                    <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>G-Commandes</a>
                    <div class="dropdown-menu bg-transparent border-0">
                    <a href="Listcommande.php" class="dropdown-item">Livraison</a>
                    <a href="Listlivraison.php" class="dropdown-item">Commande</a>
               
                    </div>
                     <!-- Gestion des assistances -->
                    <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>G-Assistance</a>
                    <div class="dropdown-menu bg-transparent border-0">
                    <a href="ListAssistant.php" class="dropdown-item">Assistant</a>
                    <a href="ListProbleme.php" class="dropdown-item">Probleme</a>
                    </div>
                     <!-- Gestion des clients -->
                    <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>G-Clients</a>
                    <div class="dropdown-menu bg-transparent border-0">
                    <a href="ListAdmin.php" class="dropdown-item">Admin</a>
                    <a href="ListClient.php" class="dropdown-item">Client</a>
                    </div>
                   
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="../img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="../img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            

    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <div class="container-fluid pt-4 px-4" >
                <div class="row g-4">
                <a href="Listproduit.php">back to List</a>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Add produit </h6>
                            
    <form action="" method="POST">
        
                    <div class="mb-3">
                    <label class="form-label" for="type">type:</label>
                    <input class="form-control" type="text" name="type" id="type" maxlength="20">
                    </div>
         
                    <div class="mb-3">
                    <label class="form-label"for="marque">marque:</label>
                    <input class="form-control"type="text" name="marque" id="marque" maxlength="20">
                    </div>


                    <div class="mb-3">
                    <label class="form-label"for="prix">prix:</label>
                    <input class="form-control"type="text" name="prix" id="prix" maxlength="20">
                    </div>

                   

                    <div class="mb-3">
                    <label class="form-label"for="quantite">quantite:</label>
                    <input class="form-control"type="text" name="quantite" id="quantite" maxlength="20">
                    </div>

                    <div class="mb-3">
                    <label class="form-label" for="pd_img">pd_img:</label>
                    <input  class="form-control form-control-sm bg-dark"  type="file" name="pd_img" id="pd-img" placeholder="Enter pd_img ">
                    </div>

                    <input class="btn btn-primary" type="submit" value="Save" >
                
                    <input class="btn btn-primary" type="reset" value="Reset" >
               
        
    </form>
    

     <!-- Footer Start -->
     <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">AGRICO</a>,Enjoy Nature. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="../index.php">The Lab</a>
                            <br>Back To: <a href="../index.php" target="_blank">Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->

</body>

</html>
 <!-- JavaScript Libraries -->
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>