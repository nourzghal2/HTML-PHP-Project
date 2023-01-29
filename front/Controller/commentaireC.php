<?php

include 'articleC.php';
//include '../Model/commentaire.php';


class CommentaireC
{
    
    public function listCommentaire($id)
    {
        $sql = "SELECT * FROM commentaire where idar = $id ";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listCommentaireall()
    {
        $sql = "SELECT * FROM commentaire";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    

    function addCommentaire($commentaire)
    {
        //var_dump($commentaire).die();
        $sql = "INSERT INTO commentaire
        VALUES (NULL, :m,:d,:a,:i)";
        $db = config::getConnexion();
        try {
            print_r($commentaire->getDate()->format('Y-m-d'));
            $query = $db->prepare($sql);
           // var_dump( $commentaire->getCommentaire()).die();
           // var_dump($commentaire->getDate()->format('Y/m/d')).die();

            $query->execute([
                'm' => $commentaire->getCommentaire(),
                'd' => $commentaire->getDate()->format('Y-m-d'),
                'a' => $commentaire->getId_article(),
                'i' => $commentaire->getId(),
                
                
                
            ]);
          
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            
        }
    }


    function deleteCommentaire($id)
    {
        $sql = "DELETE FROM commentaire WHERE id_com = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    

    function updateCommentaire($commentaire, $id_com)
    {
        try {
            $db = config::getConnexion();
            $sql = "UPDATE commentaire SET com = :nc, date = :da , id1 =id1 where  id_com= :id";
        
            $query = $db->prepare($sql);

            $query->execute([
                'id' => $commentaire->getid_Commentaire(),
                'nc' => $commentaire->getcommentaire(),
               
                'da' => $commentaire->getDate()->format('Y-m-d'),
                'i' => $commentaire->getId(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
  

    function showCommentaire($id)
    {
        $sql = "SELECT * from commentaire where id_com = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $commentaire = $query->fetch();
            return $commentaire;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
/* *
public function showCommentaires($id_article)
{
    try { 
        $pdo= getConnexin();
        $query = $pdo->prepare(
            'SELECT * FROM commentaire where idar =:id'
        );
        $query->execute([
            'id'-> $id_article
        ]);
        return  $query->fetchAll();

    } catch (PDOException $e )
    {
        $e->getMessage();
    }
}
*/
 
}


