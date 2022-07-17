<?php
session_start();
require ("auth.php");
if(Auth::isLogged()){
}
else {
  header('Location:connexion.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Creer une news - ESM</title>
<link href="css/style_admin.css" rel="stylesheet" type="text/css">
<meta http-equiv="refresh" content="4;url=index.php" />
<meta name="robots" content="noindex,nofollow"/>
<?php include("../header.php");?>

<div class="main_img"><img src="../img-fond.php"></div>

<span class="titre_lateral"><h2><a href="logout.php">D&eacute;connexion</a><hr class="foot2"></h2></span>
              
<div class="content">
<div class="titre_content" style="background-color:rgba(255,255,255,0.8);color:green;">NEWS CREEE AVEC SUCCES !</div>

<div class="text_content">

    <div>

               <pre><?php  print_r($_FILES); ?></pre>

<?php
               require"bdd.php";
              $con = mysql_connect(DB_HOST,DB_LOGIN,DB_PASS,DB_BDD);
        
              if ($_FILES['file']['error']) {     
              switch ($_FILES['file']['error']){     
                   case 1: // UPLOAD_ERR_INI_SIZE     
                   echo"Le fichier dépasse la limite autorisée par le serveur (fichier php.ini) !";     
                   break;     
                   case 2: // UPLOAD_ERR_FORM_SIZE     
                   echo "Le fichier dépasse la limite autorisée dans le formulaire HTML !"; 
                   break;     
                   case 3: // UPLOAD_ERR_PARTIAL     
                   echo "L'envoi du fichier a été interrompu pendant le transfert !";     
                   break;     
                   case 4: // UPLOAD_ERR_NO_FILE     
                   echo "Le fichier que vous avez envoyé a une taille nulle !"; 
                   break;     
          }     
}     
else {     
 // $_FILES['file']['error'] vaut 0 soit UPLOAD_ERR_OK     
 // ce qui signifie qu'il n'y a eu aucune erreur     
}

// Example of accessing data for a newly uploaded file
$fileName = $_FILES["file"]["name"]; 
$fileTmpLoc = $_FILES["file"]["tmp_name"];
// Path and file name
$pathAndName = "uploads/".$fileName;
// Run the move_uploaded_file() function here
$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
// Evaluate the value returned from the function if needed
if ($moveResult == true) {
    echo "Fichier déplacé avec succés de " . $fileTmpLoc . " à " . $pathAndName;
} else {
     echo "ERREUR: Le fichier n'a pas été déplacé correctement";
}
?>

              <?php
       

                extract($_POST);

                $name= mysqli_real_escape_string($name);

                $sql="INSERT INTO posts (name,type,content,version,online,file,description) VALUES ('$name','$type','$content',3,'$online','$pathAndName','$description')";
                $req = mysqli_query($con,$sql) or die ('Erreur SQL!<br>'.$sql.'<br>'.mysqli_error());
                
                  if(!empty($_POST)){
                    extract($_POST);            
                  }        

              ?>

             
           <a href="index.php"><h2>Retour Sommaire Administration</h2></a>

              <em>Merci de ne pas actualiser</em>
                        

</div>
    </div>


</div>

  <?php include("../footer.php");?>
</body>
</html>