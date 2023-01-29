<?php

include '../Controller/commandeC.php';

$error = "";

// create client
$commande = null;

// create an instance of the controller
$commandeC = new CommandeC();
if (
    isset($_POST["nomC"]) &&
    isset($_POST["prixT"]) &&
    isset($_POST["dateC"]) &&
    isset($_POST["cart"]) &&
    isset($_POST["id"])
) {
    if (
        !empty($_POST["nomC"]) &&
        !empty($_POST["prixT"]) &&
        !empty($_POST["dateC"]) &&
        !empty($_POST["cart"]) &&
        !empty($_POST["id"])
    ) {
        $commande = new Commande(
            null,
            $_POST["nomC"],
            $_POST["prixT"],
            new DateTime($_POST['dateC']),
            $_POST["cart"],
            $_POST["id"]
            
        );
        $commandeC->addCommande($commande);
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
    <a href="back.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" name="form" >
        <table  border="1" align="center">

            <tr>
                <td>
                    <label for="nomC">Nom du commande:
                    </label>
                </td>
                <td><input type="text" name="nomC" id="nomC" maxlength="20"  ></td>
                <td>
                    <p  style="color: red" id="nomEr"  ></p>
                </td>
            
            </tr>
            <tr>
                <td>
                    <label for="prixT">L:
                    </label>
                </td>
                <td><input type="text" name="prixT" id="prixT" ></td>
                <td >
            
            <p style="color: red" id="prixEr"  ></p>
          
          </td>
            
            </tr>
            <tr>
                <td>
                    <label for="dateC">Date de commande:
                    </label>
                </td>
                <td>
                    <input type="date" name="dateC" id="dateC">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="cart">Cart:
                    </label>
                </td>
                <td>
                    <input type="text" name="cart" id="cart">
                </td>
                <td>
                    <input type="text" name="id" id="id">
                </td>
                <td >
            
            <p style="color: red" id="cartEr"  ></p>
          
          </td>
               
            
            </tr>
            
            <tr align="center">
                <td>
                    <input type="submit" value="save" >
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
    
    <p style="color: red" id="erreur"  ></p>
   
    <script src="js.js"></script>
  
</body>

</html>