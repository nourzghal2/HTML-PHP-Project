<?php


include '../Controller/livreurC.php';
include '../Controller/livraisonC.php';
include '../Controller/cartC.php';
$commandeC = new CommandeC();

$livreurC=new livreurC();
$livraisonC=new livraisonC();
$livreur=$livreurC->AffecterLivreur();



  

  
  
  
   
session_start();
    $_SESSION['idC'] = $_POST["idC"];
 

    

$livraison = new livraison(  $livreur['id_livreur'] , $_POST['dateL'] , $_POST['adresse'] ,  $_SESSION['idC'] );

$livraisonC->addlivraison($livraison);
?>

<form action="http://localhost/integration/front/View/reculivraison.php" method="POST" id="form">
    <div class="row g-3">
     
       
            <div class="col-md-6">
            <input type="hidden" class="form-control" name="dateL" id="dateL" placeholder="dateL" value=<?php echo $_POST['dateL'] ?> >
            </div>

            <div class="col-md-6">
            <input type="hidden" class="form-control" name="adresse" id="adresse" placeholder="adresse" value=<?php echo $_POST['adresse'] ?> >
            </div>

           

            <div class="col-md-6">
            <input type="hidden" class="form-control" name="nom" id="nom" placeholder="nom" value=<?php echo  $livreur['nom'] ?> >
            </div>

            <div class="col-md-6">
            <input type="hidden" class="form-control" name="numero" id="numero" placeholder="numero" value=<?php echo  $livreur['numero'] ?> >
            </div>

            
        <div class="col-12">
            <button class="btn btn-primary w-100 py-3" type="submit">Cliquez pour afficher votre Coupon</button>
        </div>
    </div>
</form>
