
<?php

include '../Controller/articleC.php';

include '../View/listeArticle.php';
$error = "";

if(isset($_GET['recherche']))
                       {
                        $search_value=$_GET["recherche"];
                        
                        $article= $articleC->recherche($search_value);
                       }
function recherche($search_value)
            {
                
                $sql="SELECT * FROM article where  nomAR like '%$search_value%' or imageAR like '%$search_value%'  ";
                    
                $db =Config::getConnexion();
        
                try{
                    $result=$db->query($sql);
        
                    return $result;
        
                }
                catch (Exception $e){
                    die('Erreur: '.$e->getMessage());
                }
            }
            ?>