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
        header('Location:../pages/back.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
     <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
 
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="bg-gray-200">
<main class="main-content  mt-0">
<div class="page-header align-items-start min-vh-100">
<div class="container my-auto">
<div class="row">
<div class="col-lg-4 col-md-8 col-12 mx-auto">
 <div class="card z-index-0 fadeIn3 fadeInBottom"> 
 <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2"> 
<div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 > <a href="../pages/back.php" class="text-white font-weight-bolder text-center mt-2 mb-0">Back to list </a></h4>
                  
                  
                </div>
            
                </div> 
    <!-- <a href="back.php">Back to list </a>
    <hr> -->

    <div id="error">
        <?php echo $error; ?>
    </div>
    <div class="card-body">
    <form action="" method="POST" name="form" >
        <table   align="center">

            <tr>
                <td>
                    <label for="nomC">Nom du commande:
                    </label>
                </td>
                <td class="input-group input-group-outline my-3"><input type="text" name="nomC" id="nomC" maxlength="20" class="form-control"  ></td>
                <td>
                    <p  style="color: red" id="nomEr"  ></p>
                </td>
            
            </tr>
            <tr>
                <td >
                    <label for="prixT">L:
                    </label>
                </td>
                <td class="input-group input-group-outline my-3"><input type="text" name="prixT" id="prixT" class="form-control" ></td>
                <td >
            
            <p style="color: red" id="prixEr"  ></p>
          
          </td>
            
            </tr>
            <tr>
                <td >
                    <label for="dateC">Date de commande:
                    </label>
                </td>
                <td class="input-group input-group-outline my-3">
                    <input type="date" name="dateC" id="dateC" class="form-control">
                </td>
            </tr>
            <tr>
                <td >
                    <label for="cart">Cart:
                    </label>
                </td>
                <td class="input-group input-group-outline my-3">
                    <input type="text" name="cart" id="cart" class="form-control">
                </td>
                <td >
            
            <p style="color: red" id="cartEr"  ></p>
          
          </td>
               
            
            </tr>
            <tr>
                <td >
                    <label for="id">Client:
                    </label>
                </td>
                <td class="input-group input-group-outline my-3">
                    <input type="text" name="id" id="id" class="form-control">
                </td>
                <td >
            
          
          
          </td>
               
            
            </tr>
            
            <tr align="center">
                <td >
                    <input type="submit" value="save" class="btn bg-gradient-primary w-100 my-4 mb-2" >
                </td>
                <td>
                    <input type="reset" value="Reset" class="btn bg-gradient-primary w-100 my-4 mb-2" >
                </td>
            </tr>
        </table>
       <!--  <p style="color: red" id="erreur"  ></p> -->
    </form>
    
  </div> 
   </div> 
    </div>
    <p style="color: red" id="erreur"  ></p>
   </div>
    </div>
    </div>
    
    </main>
    <script src="js.js"></script>
  
</body>

</html>