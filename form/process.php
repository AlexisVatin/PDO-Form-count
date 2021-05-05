<?php
$host = 'localhost';
$dbname = 'testcount';
$username = 'root';
$password = '';
if(isset($_POST['insert'])){
  try {
  // se connecter à mysql
  $pdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit();
  }
  // récupérer les valeurs 
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  // Requête mysql pour insérer des données
  $sql = "INSERT INTO `user`(`prenom`, `nom`) VALUES (:firstname,:lastname)";
  $res = $pdo->prepare($sql);
  $exec = $res->execute(array(":firstname"=>$firstname,":lastname"=>$lastname));
  // vérifier si la requête d'insertion a réussi
  if($exec){
    echo 'Données insérées';
  }else{
    echo "Échec de l'opération d'insertion";
  }
}
?>