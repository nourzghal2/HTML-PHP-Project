<?php

include '../controller/utilisateursC.php';

$error = "";

// create client
$utilisateurs = null;

// create an instance of the controller
$utilisateursC = new utilisateursC();
if (
    isset($_POST["id"]) &&
    isset($_POST["pseudo"]) &&
    isset($_POST["email"]) 
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST['pseudo']) &&
        !empty($_POST["email"])
    ) {
        $utilisateurs = new utilisateurs(
            $_POST['id'],
            $_POST['pseudo'],
            $_POST['email']
          
        );
        $utilisateursC->updateutilisateurs($utilisateurs, $_POST["id"]);
        header('Location:liste.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
    <link rel="stylesheet" href="client.css">
</head>

<body>
    <a href="liste.php">Back to list</a>
    

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $utilisateurs= $utilisateursC->showutilisateurs($_POST['id']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id">Id Client:
                        </label>
                    </td>
                    <td><input type="text" name="id" id="id" value="<?php echo $utilisateurs['id']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="pseudo">pseudo:
                        </label>
                    </td>
                    <td><input type="text" name="pseudo" id="pseudo" value="<?php echo $utilisateurs['pseudo']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Last Name:
                        </label>
                    </td>
                    <td><input type="text" name="email" id="email" value="<?php echo $utilisateurs['email']; ?>" maxlength="20"></td>
                </tr>
               
                
                <<tr align="center">
                <td>
                    <input type="submit" value="Save">
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