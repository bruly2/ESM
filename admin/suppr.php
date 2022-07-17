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
<title>Zone d'administration - ESM</title>
<link href="css/style_admin.css" rel="stylesheet" type="text/css">
<meta http-equiv="refresh" content="2;url=index.php" />
<meta name="robots" content="noindex,nofollow"/>
<?php include("../header.php");?>

<div class="main_img"><img src="../img-fond.php"></div>

<span class="titre_lateral"><h2><a href="index.php">Retour zone administration</a><hr class="foot2"></h2></span>
              
<div class="content">
<div class="titre_content" style="background-color:rgba(0,0,0,0.8);">SUPPRIMER UNE NEWS</div>

	<div class="text_content">

			<?php
			
				require"bdd.php";
				$con = mysqli_connect(DB_HOST,DB_LOGIN,DB_PASS,DB_BDD);
				$sql = "DELETE FROM posts WHERE id={$_GET["id"]}";
				$req = mysqli_query($con,$sql) or die ('Erreur SQL!<br>'.$sql.'<br>'.mysqli_error());
				echo "<h1 class='news_modf'><span>News suprimee avec succes !</span></h1>";

			?>
		
	</div>
</div>

	<?php include("../footer.php");?>
</body>
</html>