<?php
session_start();

include '../Controller/cartC.php"';

 if(!isset($_SESSION['user'])){
    header('Location:../pages/inscrit.php');
    die();
}
$utilisateursC = new utilisateursC();
    $data= $utilisateursC->GetUSER($_SESSION['user']);
 
$cart = null;
$cartC = new CartC();
$cartC1 = new CartC();
$list = $cartC-> listCart();
/* var_dump($panierC->affichercommande(4)); */
$commandeC = new CommandeC();
$list1 = $commandeC->  listCommandes();

if(isset($_GET["add_to_commande"])){

$commande= new Commande( null,
$_GET['commande_name'],
$_GET['commandePrix'],
new DateTime ($_GET['commande_date']),
$_GET['cartId'],
$data['id']);
$commandeC->addCommande($commande);




}
if(isset($_GET["update_cart"])){
    $cart = new Cart(
        $_GET['cart_id'],
        $_GET['nommm'],
        $_GET['prixC'],
        $_GET['cart_Quantite'],
        $_GET['imageC']
       
    );
    $cartC1->updateC($cart,$_POST["cart_id"]);




}










?>
<html>

<head>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Favicon -->
     <link href="img/favicon.ico" rel="icon">


 <!-- Favicon -->
 <link href="img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="../lib/animate/animate.min.css" rel="stylesheet">
<link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />



<!-- Template Stylesheet -->
<link href="../css/style.css" rel="stylesheet">
<link href="../css/style1.css" rel="stylesheet">

<!-- box icons -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



</head>

<body>
<h1 class="p-5">Bonjour <?php echo $data['id']; ?> !</h1>
                        <hr />

<br><br><br><br><br><br><br><br>
<section>
<div class="container" >
                    <div class="shopping_cart">
                        <table  border="1" align="center" width="70%">
                        <thead>
                            <h4>
                        <th>Image</th>
                        <th>Nom du Plat</th>
                        <th>Prix</th>
                        <th>Quantite</th>
                        <th>Prix Todate</th>
                        <th>Action</th></h4>
                    </thead>
                    <tbody><?php
                    $grand_total = 0;
                    $j =0;
                foreach ($list as $cart)  {
                      $j +=1 ;
                    
                    ?>
                    <tr>
                    <td><img class="flex-shrink-0 img-fluid rounded" src="../img/<?= $cart['image']; ?>" style="width: 40px;"></td>
                        <td>
                        
                            <span class="text-primary"><?= $cart['nom']; ?></td>
                            <td> 
                                 <span class="text-primary"><?= $cart['prixCart']; ?></span></td>
                                 
                      
                                 <td>
                                 <form action="" method="POST">
                                    <input type="hidden" name="cart_id" value="<?php  echo $cart['idCart']; ?>">
                                    <input type="hidden" name="imageC" value="<?php echo $cart['image']; ?>">
                                    <input type="hidden" name="prixC " value="<?php echo $cart['prixCart']; ?>"> 
                                    <input type="hidden" name="nommm" value="<?php echo $cart['nom']; ?>">
                                    <input class="int-num"type="number"min="1" name="cart_Quantite" value="<?php echo $cart['quantite']; ?>">
                                    <input type="submit" name="update_cart" value="update" class="btnn">
                                 </form>
                                </td>
                                 <td>$<?php echo $subTotal = $cart['prixCart'] * $cart['quantite']; ?></td>
                                 <td><a href="deletCart.php?idCart=<?php echo $cart['idCart']; ?>"   onclick=" return confirm('remove item from cart?')" class="btnn">Remove</a> 
                            
                                    <form action="" method="GET">
                                    <input type="submit" id="add_to_commande" name="add_to_commande" class="btnn" value="Check out">
                                   
                                    <input type="hidden" name="commande_name" value="commande_<?php echo $j ?> ">
                                    <input type="hidden" name="commandePrix" value="<?= $subTotal ?>">
                                    <input type="hidden" name="commande_date" value="<?php date('Y/m/d'); ?>">
                                    <input type="hidden" name="cartId" value="<?= $cart['idCart']; ?>">

                                   
                                    
                                    </td>
                                    </form>
                                   
                              
                                  

                                    
                                    
                               
                    </tr>
                    <?php
                      $grand_total += $subTotal ;
                      $id = $cart['idCart'];

                     }
                      ?>
                      <tr>
                        <td colspan="4" style=" font-size: 1.5rem ;">grand Total:</td>
                        <td>$<?php echo $grand_total ?></td>
                        
                    </tr>
                    </tbody>
                        </table>
                        <table  border="1" align="center" width="70%">
                        <thead>
                            <h4>
                        <th>Nom de Commande</th>
                        <th>Prix Commande</th>
                        <th>Date</th>
                        <th>Cart</th>
                        <th>id Client</th>
                        <th></th>
                        <th></th></h4>
                    </thead>
                        <tbody>

                        <?php
                foreach ($list1 as $commande)  {
                      
                    
                    ?>
                    <tr>
                    
                        <td>
                        
                            <span class="text-primary"><?= $commande['nomC']; ?></td>
                            <td> 
                                 <span class="text-primary"><?= $commande['prixT']; ?></span></td>
                                 <td> 
                                 <span class="text-primary"><?= $commande['dateC']; ?></span></td>
                                 <td> 
                                 <span class="text-primary"><?= $commande['cart']; ?></span></td>
                                 <td> 
                                 <span class="text-primary"><?=$commande['id'];?></span></td>
                                 
                      
                                 <td>
                        
                                    <a href="booking.php?id_C=<?php echo $commande['idC'];?> " class="btnn" >book</a>
                                    
                                   
                             
                                </td>
                          
                    </tr>
                    <?php
                     

                     }
                      ?>
                      



                        </tbody>    
                     
                    </table>



                    </div>
                 </div>
                 </section>
</body>

</html>