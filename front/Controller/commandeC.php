<?php

include '../Model/commande.php';

class CommandeC
{
    function affichercommande($idPlat){
        try{
            $pdo = config::getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM commande where panier = :id'
            );
            $query->execute([
                'id'  =>  $idPlat
             ]);
            return $query->fetchAll();
        }catch(PDOException $e){
            $e->getMessage();
        }

    }
    public function listCommandes()
    {
        $sql = "SELECT * FROM commande";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteCommande($id)
    {
        $sql = "DELETE FROM commande WHERE idC = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addCommande($commande)
    {
        $sql = "INSERT INTO commande 
        VALUES (NULL, :fn,:pt,:dc ,:ca,:id)";
        $db = config::getConnexion();
        try {
            print_r($commande->getDateC()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'fn' => $commande->getNomC(),
                'pt' => $commande->getPrixT(),
                'dc' => $commande->getDateC()->format('Y/m/d'),
                'ca' => $commande->getCart(),
                'id' => $commande->getId()
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateCommande($commande, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commande SET 
                    nomC = :nomC, 
                    prixT = :prixT, 
                    dateC= :dateC,
                    cart= :cart,
                    id= :id
                WHERE idC= :idC '
            );
            $query->execute([
                'idC' => $id,
                'nomC' => $commande->getNomC(),
                'prixT' => $commande->getPrixT(),
                'dateC' => $commande->getDateC()->format('Y/m/d'),
                'cart' => $commande->getCart(),
                'id' => $commande->getId(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showCommande($id)
    {
        $sql = "SELECT * from commande where idC = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $commande = $query->fetch();
            return $commande;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function triercommande()
 {
     $sql = "SELECT * from commande ORDER BY dateC DESC";
     $db = config::getConnexion();
     try {
         $req = $db->query($sql);
         return $req;
     } 
     catch (Exception $e)
      {
         die('Erreur: ' . $e->getMessage());
     }
 
 
 
 }
 function triercommande1()
 {
     $sql = "SELECT * from commande ORDER BY dateC ASC";
     $db = config::getConnexion();
     try {
         $req = $db->query($sql);
         return $req;
     } 
     catch (Exception $e)
      {
         die('Erreur: ' . $e->getMessage());
     }
 
 
 
 }
 function showCom($libelle)
 {
     $sql = "SELECT * FROM commande WHERE nomC LIKE '%" . $libelle . "%' OR
     cart LIKE '%" . $libelle . "%' OR idC LIKE '%" . $libelle . "%' OR dateC LIKE '%" . $libelle . "%' ";
     $db = config::getConnexion();
     try {
         $query = $db->prepare($sql);
         $query->execute();

         $com = $query->fetchAll();
         return $com;
     } catch (Exception $e) {
         die('Error: ' . $e->getMessage());
     }
 }
 public function list0($search_value)
    {
        $sql = "SELECT * FROM commande where nomC like '$search_value'";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
 
}
