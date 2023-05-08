<?php
include '../Controller/adminC.php';
$adminC = new adminC();
$adminC->deleteadmin($_GET["idadmin"]);
header('Location:Listadmin.php');
