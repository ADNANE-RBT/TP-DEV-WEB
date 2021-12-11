<?php

//prendre le id avec methode GET :

if (isset($_GET['id'])) {
    
    session_start();

    //connecter avec la base de données

    $conn = mysqli_connect('localhost', 'root', '' , 'exelib') or die ('Unable to connect');

    //recevoir id du enregistrement choisi 

    $id=$_GET['id'];

    //requete de suppression 

    $requete = "DELETE FROM exercice WHERE id='".$id."'";
    
    //appliquer la requete

    $resultat = mysqli_query($conn,$requete);

    //recevoir un message d'erreur si la suppression sa marche pas
    
    if(!$resultat){echo mysqli_error($conn);}

    //returner a la page index

    header('location: index.php');

}
?>