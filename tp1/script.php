<?php
session_start();

//initialiser les variables

$titre ="";
$auteur="";
$date="";

//connecter avec la base de données

$conn = mysqli_connect('localhost', 'root', '' , 'exelib') or die ('Unable to connect');
  
if(isset($_POST['add'])){

//recevoir les valeurs des inputs

      $titre  = mysqli_real_escape_string($conn,$_POST['titre']);
      $auteur = mysqli_real_escape_string($conn,$_POST['auteur']);
      $date   = mysqli_real_escape_string($conn,$_POST['date']);

// faire une requete d'ajout

      $query = "INSERT INTO exercice (titre, auteur, date_creation) VALUES('$titre', '$auteur', '$date')";
      mysqli_query($conn, $query);
  }
  


  //partie de modification

  if(isset($_POST['modifier'])){

  // faire une mise a jour des données 

    $modrequete = "UPDATE exercice SET titre='".$_POST['titre']."'"
    . ", auteur='".$_POST['auteur']."'"
    . ", date_creation='".$_POST['date']."'"
    . "WHERE id='".$_POST['id']."'";

  //appliquer la requete

    mysqli_query($conn,$modrequete);

}

//retourner a ma page principal

  header('location: index.php');


?>