<?php
include '../config.php';
//include '../Model/article.php';


class ArticleC
{
    
    public function listArticle()
    {
        $sql = "SELECT * FROM article";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

   
    function addArticle($article)
    {
        $sql = "INSERT INTO article
        VALUES (NULL, :nc,:ia,:da )";
        $db = config::getConnexion();
        try {
            print_r($article->getDate()->format('Y-m-d'));
            $query = $db->prepare($sql);
           // var_dump($article->getNomA()).die();
            $query->execute([
                'nc' => $article->getNomA(),
                'ia' => $article->getImageAR(),
                'da' => $article->getDate()->format('Y/m/d')
                
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            
        }
    }


    function deleteArticle($id)
    {
        $sql = "DELETE FROM article WHERE id_article = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    function updateArticle($article, $id_article)
    {
        try {
            $db = config::getConnexion();
            $sql = "UPDATE article SET nomAR = :nc, imageAR = :mc , date = :da  where  id_article= :id";
        
            $query = $db->prepare($sql);

            $query->execute([
                'id' => $article->getArticle(),
                'nc' => $article->getNomA (),
                'mc' => $article->getImageAR (),
                'da' => $article->getDate()->format('Y-m-d')
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
  

    function showArticle($id)
    {
        $sql = "SELECT * from article where id_article = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $article = $query->fetch();
            return $article;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
  

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

 
}


