<?php
ob_start();
session_start();
?>

<?php
$user= "root";
$pass="";

try{
    //Connexion à la base de données
    $db=new PDO('mysql:host=localhost;dbname=immeuble', 'root', '');
    $db->exec('SET NAMES "UTF8"');
} catch(PDOException $e){
    echo 'Erreur:'. $e-> getMessage();
    die();
}
$sql='SELECT * FROM `ampoules`ORDER BY `id_ampoule` DESC';
//on prépare la requête
$query=$db->prepare($sql);

//on exécute la requête
$query->execute();

//on stocke le résultat dans un tableau associatif
$result=$query->fetchALL(PDO::FETCH_ASSOC);

?>

<title><?= $title?></title>
 <h1 class="text-center">Gestion de mes ampoules</h1>
            </br>   
            <?php
                if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    // afficher un message
                    echo '<div class="alert alert-light text-white" role="alert">
                          Bonjour '.$user.', vous êtes connecté(e)
                          </div>';
                }
            ?>
<div class="container">
  <div class="row">
    <div class="col text-left"> 
      <button type="button" class="btn btn-outline-success btn-lg" data-toggle="modal" data-target="#ajouterAmpoule">
      Ajouter une ampoule
      </button>                     
    </div>
    <div class="col text-right"> 
      <a href="close.php" class="btn btn-outline-warning btn-lg">Déconnexion</a>
    </div>
  </div>            
</div>
</br>
<table class= "table table-striped">
  <thead class="text-center">
    <tr>
      <th>L'ID</th>
      <th>La date du changement de l'ampoule</th>
      <th>L'étage</th>
      <th>La position de l'ampoule</th>
      <th>Le prix de l'ampoule</th>
      <th>Détails</th>
      <th>Mettre à jour</th>
      <th>Supprimer</th>  
<!-- Modal d'Ajouter une ampoule -->
    </tr>
<div class="modal fade" id="ajouterAmpoule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Ajout">Ajouter une ampoule:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="ajouteAmpoule.php" method="post">
          <div class="form-group">
            <label for="changement_de_date" class="h6 text-center">Date:</label>
            <input type="date" class="form-control" name="changement_de_date" id="changement_de_date">
          </div>
          <div class="form-group">
            <label for="etage" class="h6 text-center">Sélection de l'étage:</label>
            <select class="form-control" name="etage" id="etage">
              <option value="RDC">RDC</option>
              <option value="1">l'étage n°1</option>
              <option value="2">l'étage n°2</option>
              <option value="3">l'étage n°3</option>
              <option value="4">l'étage n°4</option>
              <option value="5">l'étage n°5</option>
              <option value="6">l'étage n°6</option>
              <option value="7">l'étage n°7</option>
              <option value="8">l'étage n°8</option>
              <option value="9">l'étage n°9</option>
              <option value="10">l'étage n°10</option>
              <option value="11">l'étage n°11</option>
            </select>
          </div>
          <div class="form-group">
            <label for="etage" class="h6 text-center">Position de l'ampoule dans cette étage:</label>
            <select class="form-control" name="position_ampoule" id="position_ampoule">
              <option value="au fond">Fond</option>
              <option value="à droite">Droite</option>
              <option value="à gauche">Gauche</option>
            </select>
          </div>
          
          <div class="form-group">
            <label for="prix_ampoule" class="h6 text-center">Prix de l'ampoule:</label>
          </br>
            <input type="number" step="0.01" name="prix_ampoule" id="prix_ampoule" >
          </div>
          </br>
          <button type="submit" class="btn btn-success" >Enregistrer</button>
        </form>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
  </thead>

  <?php
    foreach ($result as $row){
      $date_formater = new DateTime($row['changement_de_date']);
    ?>
    <tr class="text-center ">
    <td><?= $row['id_ampoule'] ?> </td>
    <td><?= $date_formater->format('d/m/Y');?></td>
    <td><?= $row['etage'] ?></td>
    <td><?= $row['position_ampoule']?></td>
    <td><?= $row['prix_ampoule'] ?>€</td>
    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailsAmpoule<?= $row['id_ampoule'] ?>">
          Voir
        </button> 
  
<!-- Modal de "Détails" -->
<div class="modal fade" id="detailsAmpoule<?= $row['id_ampoule'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailstitle">Détails:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p class="h6">L'ID de l'ampoule est le numéro <?= $row['id_ampoule'] ?>. </br>
      </br>
      La date de changement de l'ampoule est le <?= $date_formater->format('d/m/Y'); ?>. </br>
      </br>
      L'ampoule se situe à l'étage <?= $row['etage'] ?>. </br>
      </br>
      La position de l'ampoule n° <?= $row['id_ampoule'] ?> est situé <?= $row['position_ampoule'] ?>.  </br>
      </br> 
      Le prix de l'ampoule est de <?= $row['prix_ampoule'] ?>€. </br>
      </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button> 
      </div>
    </div>
  </div>
</div>

<!-- Modal de "Mettre à Jour" -->
</td> <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#editerAmpoule<?= $row['id_ampoule'] ?>">
          Éditer
        </button> 
<div class="modal fade" id="editerAmpoule<?= $row['id_ampoule'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Majtitle">Mettre à jour:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="majAmpoule.php?id=<?= $row['id_ampoule'] ?>" method="post">
          <div class="form-group">
            <label for="changement_de_date" class="h6 text-center">Date:</label>
            <input type="date" class="form-control" name="changement_de_date" id="changement_de_date" value="<?= $row['changement_de_date'] ?>">
          </div>
          <div class="form-group">
            <label for="etage" class="h6 text-center">Sélection de l'étage:</label>
            <select class="form-control" name="etage" id="etage" >
              <option value="RDC">RDC</option>
              <option value="1">l'étage n°1</option>
              <option value="2">l'étage n°2</option>
              <option value="3">l'étage n°3</option>
              <option value="4">l'étage n°4</option>
              <option value="5">l'étage n°5</option>
              <option value="6">l'étage n°6</option>
              <option value="7">l'étage n°7</option>
              <option value="8">l'étage n°8</option>
              <option value="9">l'étage n°9</option>
              <option value="10">l'étage n°10</option>
              <option value="11">l'étage n°11</option>
            </select>
          </div>
          <div class="form-group">
            <label for="etage" class="h6 text-center">Position de l'ampoule dans cette étage:</label>
            <select class="form-control" name="position_ampoule" id="position_ampoule"  >
              <option value="au fond">Fond</option>
              <option value="à droite">Droite</option>
              <option value="à gauche">Gauche</option>
            </select>
          </div>
          </br>
          <div class="form-group">
            <label for="prix_ampoule" class="h6 text-center">Prix de l'ampoule:</label>
            <input type="number" step="0.01"  name="prix_ampoule" id="prix_ampoule" value="<?= $row['prix_ampoule'] ?>" >
          </div>
          </br>
          <div class="form-group">
            <button type="submit" class="btn btn-success" >Enregistrer</button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" >Fermer</button>
      </div>
    </div>
  </div>
</div>
 </td>

    <td><a href="suprAmpoule.php?id=<?=$row['id_ampoule']?>"class="btn btn-danger" Onclick="return confirm('Voulez-vous vraiment supprimer cette ligne?');">Supprimer</a></td>
    </tr>    
  <?php 
    }    
  ?>    
</table>

<?php
$content= ob_get_clean();
require"template.php";
?>