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
<title>Supprimer Administration - ESM</title>
<link href="css/style_admin.css" rel="stylesheet" type="text/css">
<meta name="robots" content="noindex,nofollow"/>
<?php include("../header.php");?>

<div class="main_img"><img src="../img-fond.php"></div>

<span class="titre_lateral"><h2><a href="index.php">Retour Sommaire Administration</a><hr class="foot2"></h2></span>

<div class="content">
<div class="titre_content" style="background-color:rgba(0,0,0,0.8);">SUPPRIMER UNE NEWS</div>

<div class="text_content">

  <div id="centrer">

              <?php

			require"bdd.php";
			$con = mysqli_connect(DB_HOST,DB_LOGIN,DB_PASS,DB_BDD);
			$sql = "SELECT * FROM posts WHERE id={$_GET["id"]}";
			$req = mysqli_query($con,$sql) or die ('Erreur SQL!<br>'.$sql.'<br>'.mysqli_error());
			while($data = mysqli_fetch_assoc($req))
			{?>
				<span style="font-size: 1.5em">Etes vous sur de vouloir supprimer :</span><br>
			<?php
			echo "<h2><span style='font-size: 1.3em'>{$data["name"]} ?</span></h2><br>";
			echo "<div class='suppression-bouton'><a href=\"suppr.php?id={$data["id"]}\">Oui</a></div>";
			}
			?>            

           <div class="suppression-bouton"><a href="index.php">Non</a></div>

<br><br>            

</div>
</div>


</div>

	<?php include("../footer.php");?>
</body>
</html>