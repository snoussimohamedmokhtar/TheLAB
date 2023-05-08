<?php
include '../Controller/commandeC.php';
$commandeC = new commandeC();
$commandeC->deletecommande($_GET["numCmd"]);
header('Location:Listcommande.php');
