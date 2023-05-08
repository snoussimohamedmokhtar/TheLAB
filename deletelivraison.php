<?php
include '../Controller/livraisonC.php';
$livraisonC = new livraisonC();
$livraisonC->deletelivraison($_GET["idLivreur"]);
header('Location:Listlivraison.php');
