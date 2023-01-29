<?php

include '../Controller/utilisateursC.php';

$error = "";

// create client
$utilisateurs = null;

// create an instance of the controller
$utilisateursC = new utilisateursC();
if (
    isset($_POST["pseudo"]) &&
    isset($_POST["email"]) 
) {
    if (
        !empty($_POST['pseudo']) &&
        !empty($_POST["email"]) 
    ) {
        $utilisateurs= new utilisateurs(
            null,
            $_POST['pseudo'],
            $_POST['email']
            
        );
        $utilisateursC->addutilisateurs($utilisateurs);
        header('Location:Listutilisateurs.php');
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
    <script src="C:\xampp\htdocs\projet-web - Copie\View"></script>
</head>

<body>
    <a href="Listutilisateurs.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table border="1" align="center">

            <tr>
                <td>
                    <label for="pseudo">pseudo:
                    </label>
                </td>
                <td><input type="text" name="pseudo" id="pseudo" maxlength="20" required placeholder="enter your name" ></td>
            </tr>
            <tr>
                <td>
                    <label for="email">Last Name:
                    </label>
                </td>
                <td><input type="text" name="email" id="email" maxlength="20" required placeholder="enter your email"></td>
            </tr>
            
            
            <tr align="center">
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>