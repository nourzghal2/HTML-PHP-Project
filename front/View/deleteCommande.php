<?php
include '../Controller/commandeC.php';
$commandeC = new CommandeC();
$commandeC->deleteCommande($_GET["idC"]);
header('Location:back.php');
