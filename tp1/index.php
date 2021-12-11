<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="style.css">
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

    <!--Formulaire-->

        <div class="box" id="form">
          <div class="form_container">
            <form action="script.php" method="POST">
              <div class="head"><h2>Ajouter un exercice</h2></div>
              <div class="form-item">
                 <label for="titre">Titre de l'exercice</label>
                 <input type="text" id="titre" name="titre" required>
              </div>
              <div class="form-item">
                 <label for="auteur">Auteur de l'exercice</label>
                 <input type="text" id="auteur" name="auteur" required>  
              <div class="form-item">  
                <label for="date">Date de creation</label>
                <input type="date" id="date" name="date" required></div>
              </div>
              <div class="btn">
                <input type="submit" id="submit" value="Envoyer" name="add">
              </div>
           </form>
          </div>
        </div>
    
    <!--tableau-->

    <table width="100%" class="table" id="table">
      <thead>
      <tr>
          <th>id</th>
          <th>titre</th>
          <th>auteur</th>
          <th>date</th>
          <th colspan="2">actions</th>
      </tr>
      </thead>
      <?php
      //afficher le contenue du table :

     session_start();

     //connecter a ma base de données

     $conn = mysqli_connect('localhost', 'root', '' , 'exelib') or die ('Unable to connect');

     //une requete pour afficher tout le contenue de mon table sous forme d'un tableau

        $requete = "SELECT * FROM exercice";
		    $resultat = $conn -> query($requete);
		    while ($ligne = $resultat -> fetch_assoc()) 
        {
           echo '<tr>';
           echo '<td data-label="id">'.$ligne['id'].'</td>';
		       echo '<td data-label="titre">'.$ligne['titre'].'</td>';
           echo '<td data-label="auteur">'.$ligne['auteur'].'</td>';
           echo '<td data-label="date">'.$ligne['date_creation'].'</td>';
           echo '<td data-label="Supprimer" class="supp"><a href="supp_exe.php?id='.$ligne['id'].'">Supprimer</a></td>';
           echo '<td data-label="Modifier" class="mod"><a href="modif_exe.php?id='.$ligne['id'].'">Modifier</a></td>';
           echo '</tr>';
        }
    ?>
    </table>
    
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
         <a href="#form">home</a>
       </div>
    </div>
  </footer>
    
 </body>
</html>