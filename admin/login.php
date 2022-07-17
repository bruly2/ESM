<?php
session_start();
if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pass'])) {
	extract($_POST);
	$pass = sha1($pass);
	mysqli_connect("localhost","root","","esm_site");
	$login = addslashes($login);
	$sql = "SELECT id FROM users WHERE login='$login' AND pass='$pass'";
	$req = mysqli_query($sql) or die (mysqli_error());
	if(mysqli_num_rows($req)>0){
		$_SESSION['Auth'] = array(
			'login' => $login,
			'pass' => $pass
			);
		header("Location:index.php");
	}
	else{		
	}
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Connexion - ESM</title>
<meta name="robots" content="noindex,nofollow"/>
<link href="css/style_admin.css" rel="stylesheet" type="text/css">
<?php include("../header.php");?>

<div class="main_img"><img src="../img-fond.php"></div>
              
<div class="content">
<div class="titre_content" style="background-color:rgba(255,0,0,0.6);">CONNEXION ADMIN</div>

<div class="text_content">
 <div id="centrer">
	<form action="login.php" method="post" style="margin:50px auto;" >
				<img src="img/log.png" id="log"> Login : <input type="text" name="login" class="mac"/>
					<span style="margin-left:10px;">Mot de passe : <input type="password" name="pass" class="mac"/></span>
				<input type="submit" value="Connexion" class="connexion_boutton" style="margin-left:20px;"/>

	</form>	
</div>
</div>


</div>

	<?php include("../footer.php");?>
</body>
</html>