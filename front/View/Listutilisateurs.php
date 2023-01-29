<?php
include '../controller/utilisateursC.php';
$utilisateursC = new utilisateursC();
$list = $utilisateursC->listutilisateurs();
?>
<html>

<head>
    
    <link rel="stylesheet" href="client.css">
</head>

<body>
<?php
$platParPage =3;
$sql = "SELECT id FROM utilisateurs";
$db = config::getConnexion();
try {
    $query = $db->prepare($sql);
    $query->execute();

    $plat = $query->rowCount();;
    
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
$pagesTotales=ceil($plat/$platParPage);
if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page']<= $pagesTotales){
  $_GET['page']=intval($_GET['page']);
  $pageCourante=$_GET['page'];
  }else{
      $pageCourante=1;
  }
  $depart=($pageCourante-1)*$platParPage;




?>
    <center>
        <h1>List of utilisateurss</h1>
       
    </center>
    <table border="1" align="center" width="70%">
    <?php
                  $db = config::getConnexion();
                   $list=$db->query('SELECT * FROM utilisateurs ORDER BY id DESC LIMIT '.$depart.','.$platParPage);
                   ?>
        <tr>
           <!--  <th>Id utilisateurs</th> --> 
            <th>pseudo</th>
            <th>email</th>
           
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $utilisateurs) {
        ?>
            <tr>
             <!--    <td><?= $utilisateurs['id']; ?></td>--> 
                <td><?= $utilisateurs['pseudo']; ?></td>
                <td><?= $utilisateurs['email']; ?></td>
               
                <td align="center">
                    <form method="POST" action="updateutilisateurs.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $utilisateurs['id']; ?> name="id">
                    </form>
                </td>
                <td>
                    <a href="deleteutilisateurs.php?id=<?php echo $utilisateurs['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
        <?php 
        for($i=1;$i<=$pagesTotales;$i++){
            if($i == $pageCourante){
               
            echo $i.' ';
             
            }else{
            echo '<a href="Listutilisateurs.php?page='.$i.'" class="pagee">'.$i.'</a> ';
        }
    }

?>
    </table>
</body>

</html>