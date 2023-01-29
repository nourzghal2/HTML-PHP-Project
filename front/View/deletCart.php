<?php
include '../Controller/cartC.php';
$cartC = new CartC();
$cartC->deletcart($_GET["idCart"]);
header('Location:yourCart.php');
