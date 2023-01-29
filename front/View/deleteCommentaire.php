<title>DELETING COMMENT...</title>
<?php
include '../Controller/commentaireC.php';


$idarticle =$_GET['id'];

$commentaireC = new CommentaireC();
$commentaireC->deleteCommentaire($_GET["id_com"]);

header('Location:../Controller/display.php?id='.$idarticle);
