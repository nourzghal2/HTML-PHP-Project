<?php
include '../Controller/utilisateursC.php';
$utilisateursC = new utilisateursC();
$utilisateursC->deleteutilisateurs($_GET["id"]);
header('Location:liste.php');
