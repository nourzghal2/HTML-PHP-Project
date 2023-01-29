
<?php 

include '../Controller/commandeC.php'; 
$commandeC = new CommandeC();
if(isset($_POST["add_to_commande"])){

$commande= new Commande( null,
$_POST['commande_name'],
$_POST['total'],
new DateTime ($_POST['commande_date']),
$_POST['carttt']);
$commandeC->addCommande($commande);
echo($message[] = 'commande added ');



}
?>