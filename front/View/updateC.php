<?php

include '../Controller/cartC.php';

$error = "";

// create client
$cart = null;

// create an instance of the controller
$cartC = new cartC();
if (
    isset($_POST["idCart"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["prixCart"]) &&
    isset($_POST["quantite"]) &&
    isset($_POST["image"]) 
    
) {
    if (
        !empty($_POST["idCart"]) &&
        !empty($_POST['nom']) &&
        !empty($_POST["prixCart"]) &&
        !empty($_POST["quantite"]) &&
        !empty($_POST["image"]) 
       
    ) {
        $cart = new Cart(
            $_POST['idCart'],
            $_POST['nom'],
            $_POST['prixCart'],
            $_POST['quantite'],
            $_POST['image']
           
        );
        $cartC->updateC($cart,$_POST["idCart"]);
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
    if (isset($_POST['idCart'])) {
        $cart= $cartC->showCart($_POST['idCart']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idCart">Id Cart:
                        </label>
                    </td>
                    <td><input type="text" name="idCart" id="idCart" value="<?php echo $cart['idCart']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nom">nom du plat:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $cart['nom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prixCart">prix:
                        </label>
                    </td>
                    <td><input type="number" name="prixCart" id="prixCart" value="<?php echo $cart['prixCart']; ?>" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="qunatite">quantite:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="quantite" value="<?php echo $cart['quantite']; ?>" id="quantite">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="image">location des img:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="image" value="<?php echo $cart['image']; ?>" id="image">
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