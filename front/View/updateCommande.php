<?php

include '../Controller/commandeC.php';

$error = "";

// create client
$commande = null;

// create an instance of the controller
$commandeC = new CommandeC();
if (
    isset($_POST["idC"]) &&
    isset($_POST["nomC"]) &&
    isset($_POST["prixT"]) &&
    isset($_POST["dateC"]) &&
    isset($_POST["cart"]) 
) {
    if (
        !empty($_POST["idC"]) &&
        !empty($_POST["nomC"]) &&
        !empty($_POST["prixT"]) &&
        !empty($_POST["dateC"]) &&
        !empty($_POST["cart"])
    ) {
        $commande= new Commande(
            $_POST['idC'],
            $_POST["nomC"],
            $_POST["prixT"],
            new DateTime($_POST['dateC']),
            $_POST["cart"]
        );
        $commandeC->updateCommande($commande, $_POST["idC"]);
        header('Location:back.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="back.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idC'])) {
        $commande= $commandeC->showCommande($_POST['idC']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idCommande">Id Commande:
                        </label>
                    </td>
                    <td><input type="text" name="idC" id="idC" value="<?php echo $commande['idC']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nomC">Nom du Commande:
                        </label>
                    </td>
                    <td><input type="text" name="nomC" id="nomC" value="<?php echo $commande['nomC']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prixT">prix Total:
                        </label>
                    </td>
                    <td><input type="number" name="prixT" id="prixT" value="<?php echo $commande['prixT']; ?>" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="dateC">Date of Birth:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="dateC" id="dateC" value="<?php echo $commande['dateC']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="cart">cart:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="cart" value="<?php echo $commande['cart']; ?>" id="cart">
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
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