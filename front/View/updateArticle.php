<?php

include '../Controller/articleC.php';
include '../Model/article.php';
$error = "";

// create client
$article = null;

// create an instance of the controller
$articleC = new ArticleC();
if (
    isset($_POST["id_article"]) &&
    isset($_POST["nomAR"]) &&
    isset($_POST["imageAR"]) &&
    isset($_POST["date"]) 
    
) {
    if (
        !empty($_POST["id_article"]) &&
        !empty($_POST["nomAR"]) &&
        !empty($_POST["imageAR"]) &&
       !empty($_POST["date"])
        
    ) {
        $article = new Article(
            $_POST["id_article"],
            $_POST["nomAR"],
            $_POST["imageAR"],
           new DateTime($_POST["date"])
           
        );
        $articleC->updateArticle($article,$_POST['id_article']);
        header('Location:listeArticle.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITING ARTICLE...</title>
</head>

<body>
<button><a href="ListeArticle.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_GET['id_article'])) {
        $article = $articleC->showArticle($_GET['id_article']);

    ?>


        <form action="updateArticle.php" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id_article">Id article :
                        </label>
                    </td>
                    <td><?php echo $article['id_article']; ?>
                    <input type="hidden" name="id_article" id="id_article" value="<?php echo $article['id_article']; ?>" >
                </td>
                </tr>
                <tr>
                    <td>
                        <label for="nomAR">nom :
                        </label>
                    </td>
                    <td><input type="text" name="nomAR" id="nomAR" value="<?php echo $article['nomAR']; ?>" ></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="imageAR">IMG:
                        </label>
                    </td>
                    <td><input type="text" name="imageAR" id="imageAR" value="<?php echo $article['imageAR']; ?>" ></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="date">Date:
                        </label>
                    </td>
                    <td><input type="date" name="date" id="date" value="<?php echo $article['date']; ?>"></td>
                </tr>
               
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update" >
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>