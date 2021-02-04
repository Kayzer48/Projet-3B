<!--page de l'ajout d'une ampoule-->
<?php
ob_start();

$user = "root";
$pass = "";

try {
    //host + nom de la base de données + encodage + nom utilisateur phpmyadmin et mot de passe
    $db = new PDO("mysql:host=localhost;dbname=immeuble;charset=utf8", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connexion a pdo mysql";
} catch (PDOException $exception) {
    echo "Erreur de connexion a PDO MySQL " . $exception->getMessage();
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
    echo "Veuillez remplir le champ étage";
}

if(isset($_POST['position_ampoule']) && !empty($_POST['position_ampoule'])){
    $position_ampoule = htmlspecialchars(strip_tags($_POST['position_ampoule']));
}else{
    echo "Veuillez  remplir le champ position";
}

if(isset($_POST['prix_ampoule']) && !empty($_POST['prix_ampoule'])){
    $prix_ampoule = htmlspecialchars(strip_tags($_POST['prix_ampoule']));
}else{
    echo "Veuillez remplir le champ prix";
}

$sql = "INSERT INTO ampoules (changement_de_date, etage, position_ampoule, prix_ampoule) VALUES (?,?,?,?)";

$request = $db->prepare($sql);

$request->bindParam(1,$changement_de_date);
$request->bindParam(2,$etage);
$request->bindParam(3,$position_ampoule);
$request->bindParam(4,$prix_ampoule);

$resultat = $request->execute(array($changement_de_date,$etage,$position_ampoule,$prix_ampoule));


if($resultat){
    echo "Le produit a bien été ajouté";
    header("Location:ListeAmpoules.php");
}
echo "Le formulaire est mal rempli";


$content = ob_get_clean();
require "template.php";

