<?php
include '../Controller/clientC.php';
$clientC = new clientC();
$clientC->deleteclient($_GET["idclient"]);
header('Location:ListClient.php');
