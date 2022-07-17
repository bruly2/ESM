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
<title>Ajouter News Administration - ESM</title>
<link href="css/style_admin.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<meta name="robots" content="noindex,nofollow"/>
<?php include("../header.php");?>

<div id="alaune" class="main_img"><img src="../img/3000m-steeple.jpg"></div>

<span class="titre_lateral"><h2><a href="index.php">Retour Administration</a><hr class="foot2"></h2></span>
              
<div class="content">
<div class="titre_content">ADMINISTRATION NEWS</div>

<div class="text_content" id="admin_content">


		<form id="formu" method="post" action="creer.php" enctype="multipart/form-data"/>
            		Titre : <input type="text" name="name" required autofocus id="formul"/>
            		 					
            		<br><br>

            		Cat&eacute;gorie : 

						<select name="type" required id="formul">

							<option value ="Actu Club" selected>Actu Club</option>
							<option value ="Agenda">Agenda</option>
							<option value ="Carnet">Carnet</option>
							<option value ="Comite Directeur">Comite Directeur</option>
							<option value ="Competitions">Competitions</option>
							<option value ="Info Site">Info Site</option>
							<option value ="Interclubs">Interclubs</option>
							<option value ="Meeting de Montgeron">Meeting de Montgeron</option>
							<option value ="Newsletters">Newsletters</option>
                            <option value ="Photos">Photos</option>
							<option value ="Selections">Selections</option>
							<option value ="Revue de Presse">Revue de Presse</option>


						</select>
						        		<br><br>

            	
            		<h1>Contenu de la news :</h1>

            		<div class="switch">
<input type="checkbox" value="1" name="online" checked/>
 <label><i></i></label>
</div>


<br><br>


Image : <input type="file" name="file" required><br><br>
Description : <input type="text" name="description">


<br><br><br>


            		<textarea class="ckeditor" name="content" required></textarea>

            		<script type="text/javascript">            
            				CKEDITOR.replace('content',{
                              toolbar : 'MyToolbar_user'                            
                            });
      				</script> 

					<br>

            		<input type="submit" value='Merci de cliquer sur "Enregistrer" pour ajouter'/>
                    <input type="hidden" name="version"/>                  
            		</form>
            		
						<p><span style="font-size: 1em; color: green">Astuce : pour un simple retour à la ligne, faites "Enter + Majuscule".</span><br>
                        <span style="font-size: 1em; colsor: green">Attention : Veillez à ne pas utiliser d'images sous licence ou sans accord, utilisez des images libre d'acc&egrave;s ou dont vous poss&egrave;dez les droits.</span><br></p>
            		            <br>
           </div>


</div>

</div>

	<?php include("../footer.php");?>
</body>
</html>