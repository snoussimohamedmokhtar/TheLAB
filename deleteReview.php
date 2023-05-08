<?php
include '../Controller/ReviewC.php';
$reviewC = new reviewC();
$reviewC->deletereview($_GET["idreview"]);
header('Location:ListReview.php');
