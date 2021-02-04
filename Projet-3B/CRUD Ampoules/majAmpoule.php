
<!--page de mise à jour d’une ampoule-->
<?php

$user = "root";
$pass = "";

try {
    //host + nom de la base de données + encodage + nom utilisateur phpmyadmin et mot de passe
    $db = new PDO("mysql:host=localhost;dbname=immeuble;charset=utf8", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connexion a pdo mysql";
}catch (PDOException $exception){
    echo "Erreur de connexion a PDO MySQL ". $exception->getMessage();
}

//Recupération et vérifications des éléments du formulaire

if(isset($_POST['changement_de_date']) && !empty($_POST['changement_de_date'])){
    $changement_de_date= htmlspecialchars(strip_tags($_POST['changement_de_date']));
}else{
    echo "Veuillez remplir le champ date";
}

if(isset($_POST['etage']) && !empty($_POST['etage'])){
    $etage = htmlspecialchars(strip_tags($_POST['etage']));
}else{
    echo "Veuillez remplir le champ etage";
}

if(isset($_POST['position_ampoule']) && !empty($_POST['position_ampoule'])){
    $position_ampoule = htmlspecialchars(strip_tags($_POST['position_ampoule']));
}else{
    echo "Veuillez remplir le champ position";
}

if(isset($_POST['prix_ampoule']) && !empty($_POST['prix_ampoule'])){
    $prix_ampoule = htmlspecialchars(strip_tags($_POST['prix_ampoule']));
}else{
    echo "Veuillez remplir le champ prix ampoule";
}

                    
                    $sql = "UPDATE ampoules SET changement_de_date = ?, etage = ?, position_ampoule = ?, prix_ampoule = ? WHERE id_ampoule = ?";

                    //Préparationd de la requête sql
                    $update = $db->prepare($sql);
                   
                    //ON lie les id des colonnes avec les futures valeurs récupérés dans le formulaire
                    $id= $_GET['id'];
                    $update->bindParam(1,$changement_de_date);
                    $update->bindParam(2,$etage);
                    $update->bindParam(3,$position_ampoule);
                    $update->bindParam(4,$prix_ampoule);
                   
                    // Le script s'exécute
                    $resultat = $update->execute(array($changement_de_date, $etage, $position_ampoule, $prix_ampoule, $id));
                   
                    if($resultat){
                        echo "Le changement a été effectué";
                        header("Location:ListeAmpoules.php");
                    }else{
                        echo "La mise à jour n'a pas pu être effectué";
                    }
                   
       

?>