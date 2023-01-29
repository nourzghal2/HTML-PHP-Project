<title>DELETING ARTICLE...</title>
<?php
include '../Controller/articleC.php';

$articleC = new ArticleC();
$articleC->deleteArticle($_GET["id"]);

header('Location:listeArticle.php');
