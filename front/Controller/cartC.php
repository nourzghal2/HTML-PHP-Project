<?php
 
include '../Model/cart.php';
include 'platC.php';
include 'catC.php';
include 'commandeC.php';
include 'utilisateursC.php';





class CartC
{
    

    function addCart($cart)
    {
        $sql = "INSERT INTO cart
        VALUES (NULL, :np,:pp, :pq,:ip)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'np' => $cart->getNom(),
                'pp' => $cart->getPrixCart(),
                'pq' => $cart->getQuantite(),
                'ip' => $cart->getImageCart()
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        
    }
    public function listCart()
    {
        $sql = "SELECT * FROM cart";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deletcart($id)
    {
        $sql = "DELETE FROM cart WHERE idCart= :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    

    function updateC($cart, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE cart SET 
                    nom = :nom, 
                    prixCart= :prixCart, 
                    quantite = :quantite,
                    image = :image,
                WHERE idCart= :idCart '
            );
            $query->execute([
                'idCart' => $id,
                'nom' => $cart->getNom(),
                'prixCart' => $cart->getPrixCart(),
                'quantite' => $cart->getQuantite(),
                'image' => $cart->getImageCart()
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }



    function showCart($id)
    {
        $sql = "SELECT * from cart where idCart = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $cart = $query->fetch();
            return $cart;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
        }
    
}