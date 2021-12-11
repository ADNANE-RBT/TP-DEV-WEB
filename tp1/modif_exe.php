<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>

    <!--Navbar-->
    <nav>
		<input id="nav-toggle" type="checkbox">
		<div class="logo">N-K-M-A<strong>CODE</strong></div>
		<ul class="items">
			<li><a href="#table">Home</a></li>
			<li><a href="#table">About</a></li>
			<li><a href="#table">Contact</a></li>
		</ul>
		<label for="nav-toggle" class="icon-liste">
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
		</label>
	 </nav>

    <!--Script php : dynamique-->

<?php

session_start();

//connecter avec la base de données

$conn = mysqli_connect('localhost', 'root', '' , 'exelib') or die ('Unable to connect');
  
if (isset($_GET['id'])) {

//recupéré les informarions précedentes d'exercice dans des inputs pour modifier ce que vous voulez

//chercher par id

$requete = "SELECT * FROM exercice WHERE id='".$_GET["id"]."'";

//applique la requete sur mon base de données

$result=mysqli_query($conn,$requete);

//recupéré la resultats sous forme d'un tableau associative

$exercice=mysqli_fetch_array($result,MYSQLI_ASSOC);

//afficher une nouvelle formulaire de modufication

echo '<div class="box">';
echo '<div class="form_container">';
echo '<div class="head"><h2>Modifier l\'exercice avec id='.$_GET["id"].'</h2></div>';
echo '<form action="script.php" method="POST">';
echo '<input type="hidden" value="'.$exercice["id"].'" name="id" required>';
echo '<div class="form-item"><label for="titre">Titre de l\'exercice</label>';
echo '<input type="text" value="'.$exercice["titre"].'" name="titre" id="titre" required></div>';
echo '<div class="form-item"><label for="auteur">Auteur de l\'exercice</label>';
echo '<input type="text" value="'.$exercice["auteur"].'" name="auteur" id="auteur" required></div>';
echo '<div class="form-item"><label for="date">Date de creation</label>';
echo '<input type="date" value="'.$exercice["date_creation"].'" name="date" id="date" required></div>';
echo '<div class="btn"><input type="submit" name="modifier" id="submit" value="Enregistrer"></div>';
echo '</form>';
echo '</div>';
echo '</div>';

//faire les modification avec la methode get

}
?>

   <!--Footer-->

    
   <footer>
    <div class="footer-content">
       <h3>N-K-M-A<strong>CODE</strong></h3>
       <p>Hello, I am shantanu jana a web developer. In this blog, I share tutorials related to web design and development.
       Here you will find complete step-by-step tutorials and source code..</p>
    </div>
    <div class="footer-bottom">
       <p>copyright &copy;2021 <a href="#">NKMACODE</a>  </p>
       <div class="footer-menu">
         <ul class="f-menu">
           <li><a href="#table">Home</a></li>
           <li><a href="#table">About</a></li>
           <li><a href="#table">Contact</a></li>
         </ul>
       </div>
    </div>
  </footer>
</body>