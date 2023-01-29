<?php

include '../Controller/commentaireC.php';
include '../Model/commentaire.php';

$error = "";

// create client
$commentaire = null;



// create an instance of the controller
$commentaireC = new CommentaireC();
if (
    isset($_POST["id_com"]) &&
    isset($_POST["com"]) &&
  
    isset($_POST["date"]) 
    
) {
    if (
        !empty($_POST["id_com"]) &&
        !empty($_POST["com"]) &&
       
       !empty($_POST["date"])
        
    ) {
        $commentaire= new Commentaire(
            $_POST["id_com"],
            $_POST["com"],
            $_POST["id"],
            
           new DateTime($_POST["date"])
           
        );
        $commentaireC->updateCommentaire($commentaire,$_POST['id_com']);
        header('Location:../Controller/display.php?id='.$_POST['id']);
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITING COMMENT...</title>
</head>

<body>
<button><a href="ListeCommentaire.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_GET['id_com'])) {
        $commentaire= $commentaireC->showCommentaire($_GET['id_com']);

    ?>


        <form action="updateCommentaire.php" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id_com">Id commentaire:
                        </label>
                    </td>
                    <td><?php echo $commentaire['id_com']; ?>
                    <input type="hidden" name="id_com" id="id_com" value="<?php echo $commentaire['id_com']; ?>" >
                    <input type="hidden" name="id" id="" value="<?php echo $_GET['id']; ?>" >
                </td>
                </tr>
                <tr>
                    <td>
                        <label for="com">commentaire:
                        </label>
                    </td>
                    <td><input type="text" name="com" id="com" value="<?php echo $commentaire['com']; ?>" ></td>
                </tr>
                
                
                <tr>
                    <td>
                        <label for="date">Date:
                        </label>
                    </td>
                    <td><input type="date" name="date" id="date" value="<?php echo $commentaire['date']; ?>"></td>
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