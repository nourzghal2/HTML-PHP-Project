<?php
	include '../config.php';
	include '../Model/plat.php';
	class PlatC {
		function afficherPlat(){
			$sql="SELECT * FROM plat";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerPlat($id_plat){
			$sql="DELETE FROM plat WHERE id_plat=:id_plat";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_plat', $id_plat);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
        function ajouterPlat($plat){

            $sql = "INSERT INTO plat (Nomplat, descP, prix, img)
                      VALUES (:Nomplat, :descP, :prix, :img)";
         $db = config::getConnexion();
         try{
             $query = $db->prepare($sql);
             $query->execute([
                 'Nomplat'=> $plat->getNomplat(),
                 'descP'=> $plat->getdescP(),
				 'prix'=> $plat->getprix(),
                 'img'=> $plat->getimg()
             ]);
             header("Location: ../Views/dashboard.php");
     } catch (PDOExeption $e){
         $e->getMessage();
     }
     
         }
		function recupererPlat($id_plat){
			$sql="SELECT * from plat where id_plat=$id_plat";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$plat=$query->fetch();
				return $plat;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierPlat($plat, $id_plat){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					"UPDATE plat SET 
						Nomplat = :Nomplat, 
						descP = :descP, 
						prix = :prix,
						img = :img
					WHERE id_plat = :id_plat"
				);

				$query->execute([
                    'Nomplat' => $plat->getNomplat(),
					'descP' => $plat->getdescP(),
					'prix' => $plat->getprix(),
					'img' => $plat->getimg(),
					'id_plat' => $id_plat
				]);
				header("Location: ../Views/dashboard.php");
				echo $query->rowCount() . " records UPDATED successfully <br>";

			} catch (PDOException $e) {
				die($e->getMessage());
			}
		}

		function afficherPlaat(){
			$sql="SELECT * FROM plat order by id_plat desc ";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:' . $e->getMessage());
			}
		}

		function afficherPlaaat(){
			$sql="SELECT * FROM plat order by prix desc ";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:' . $e->getMessage());
			}
		}
		function rechercheplat(){
			$sql="SELECT * FROM plat  ";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:' . $e->getMessage());
			}
			if (($Mot == "")||($Mot == "%")) {
				// Si aucun mot clé n'a été saisi,
				// le script demande à l'utilisateur
				// de bien vouloir préciser un mot clé
				
					echo "
					Veuillez entrer un mot clé s'il vous plaît!
					<p>";
				
				}
				
				else {
				// On selectionne les enregistrements contenant le mot clé
				// dans les keywords ou le titre
					$query = "SELECT distinct count(lien) FROM search
					WHERE keyword LIKE \"%$Mot%\"
					OR titre LIKE \"%$Mot%\"
					";
				
					$result = mysql_query($query);
				
					$row = mysql_fetch_row($result);
				
					$Nombre = $row[0];
				
				// Si aucun enregistrement n'est retourné,
				// on affiche un message adéquat
				if ($Nombre == "0") {
					echo "
					<h2>Aucun résultat ne correspond à votre recherche</h2>
				
					<p>
				
					";
					if ($Nombre == "1") {
						echo "
						<a name=\"#resultat\"><h2>Résultat: Un article trouvé</h2></a>
					
						<p>";
					
						}
						// Dans le cas contraire le message est au pluriel...
						else {
						echo "
						<a name=\"#resultat\"><h2>Résultat: $Nombre articles trouvés</h2></a>
					
						<p>";
					
						}
						while($row = mysql_fetch_row($result))
						{
							echo "
							<p>\n
							<b>$row[2]</b>\n
							<br><a href=\"../$row[0]\">Visualiser l'article</a>\n
							<p>\n
							";
					
						}
					}
					
					}
					
					// on ferme la base
					
					
					
				
				}

				function pagination(){
				$platParPage =10;
$sql = "SELECT id_plat FROM plat";
$db = config::getConnexion();
try {
    $query = $db->prepare($sql);
    $query->execute();

    $com = $query->rowCount();;
    
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
$pagesTotales=ceil($com/$platParPage);
if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page']<= $pagesTotales){
  $_GET['page']=intval($_GET['page']);
  $pageCourante=$_GET['page'];
  }else{
      $pageCourante=1;
  }
  $depart=($pageCourante-1)*$platParPage;
  

		}
	
		function recherche($search_value)
		{
			$sql="SELECT * FROM plat where Nomplat like '$search_value' OR prix like '$search_value' ";
		
			//global $db;
			$db =Config::getConnexion();
		
			try{
				$result=$db->query($sql);
		
				return $result;
		
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		public function list0($search_value)
    {
        $sql = "SELECT * FROM plat where Nomplat like '$search_value'";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

	}