<?php

include '../Model/livraison.php';

class livraisonC
{
 
    public function listlivraison()
    {
        $sql = "SELECT * FROM livraison";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addlivraison($livraison)
    {
        
        $id_livreur=$livraison->getid_livreur();
        $dateL=$livraison->getdateL();
        $adresse=$livraison->getadresse();
        $idC=$livraison->getid_commande();
     

   
		$sql="INSERT INTO `livraison` (`id_livreur`, `dateL`, `adresse`, `idC` ) VALUES (:id_livreur,:dateL,:adresse,:idC)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        
        $req->bindValue(':id_livreur',$id_livreur);
		$req->bindValue(':dateL',$dateL);
        $req->bindValue(':adresse',$adresse);
		$req->bindValue(':idC',$idC);
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function recupererlivraison($id_livraison){
		$sql="SELECT * from livraison where id_livraison='$id_livraison'";
		$db = config::getConnexion();
		try{
			$query=$db->prepare($sql);
			$query->execute();

			$livraison=$db->query($sql);
			$modif=$livraison->fetch(PDO::FETCH_ASSOC);
		return $modif;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
	}

    function updatelivraison($livraison , $id_livraison){
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'UPDATE livraison SET 
				
			        id_livreur = :id_livreur,
                    dateL = :dateL,
                    adresse = :adresse,
                    idC = :idC
				WHERE  id_livraison = :id_livraison'
			); echo ('taadina el prepare');
			
			$query->execute([
				'id_livreur' => $livraison ->getid_livreur(),
				'dateL' => $livraison ->getdateL(),
                'adresse' => $livraison ->getadresse(),
				'idC' => $livraison ->getid_commande(),
                'id_livraison' =>  $id_livraison,
				
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}


    function supprimerlivraison($id_livraison){
		$sql="DELETE FROM livraison where id_livraison= :id_livraison";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_livraison',$id_livraison);
		print('Effacement de ' .$id_livraison.'');
		try{
            $req->execute();

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	

}
