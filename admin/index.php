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
<meta name="robots" content="noindex,nofollow"/>
<?php include("../header.php");?>

<div id="alaune" class="main_img"><img src="../img/3000m-steeple.jpg"></div>

<span class="titre_lateral"><h2><a href="logout.php">D&eacute;connexion</a><hr class="foot2"></h2></span>
              
<div class="content">
<div class="titre_content">ZONE ADMINISTRATEUR</div>

<div class="text_content">

	<?php

	$jour = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");

	$mois = array("","Janvier","F&eacute;vrier","Mars","Avril","Mai","Juin","Juillet","Ao&ucirc;t","Septembre","Octobre","Novembre","D&eacute;cembre");

	$datefr = $jour[date("w")]." ".date("d")." ".$mois[date("n")]." ".date("Y");

	echo "Bonjour : -  nous sommes $datefr";

	?> 

<div>				
        <?php

			require"bdd.php";
				$con = mysqli_connect(DB_HOST,DB_LOGIN,DB_PASS,DB_BDD);
			?>

		<h4><?php
			$query = "SELECT count(id) from posts";

				$result = mysqli_query($con,$query) or die (mysqli_error());

				$resultat=mysqli_fetch_row($result);

				echo $resultat[0] ;?>
				Articles au total</h4>
				<br>
					<div class="text-center">  
						<a href="admin_news.php" class="ajouter_boutton">
					   	  Ajouter un article
						</a>
					</div>
				<br><br><br><br>
	<table>
		<thead>
	            <tr>
	                <th id="coin_sup_droit">Titre</th>
	                <th id="coin_sup_droit">Categorie</th>
                    <th id="coin_sup_droit">Date</th>
                    <th id="coin_sup_droit">Visible</th>
                    <th id="coin_sup_droit">Actions</th>                    
	            </tr>
	       </thead>

           <?php            	
			
				$messagesParPage=20;

				$retour_total = mysqli_query($con,'SELECT COUNT(*) AS total FROM posts');
				$donnees_total = mysqli_fetch_assoc($retour_total);
				$total = $donnees_total['total'];

				 function rewrite_escape_string($nom)
				              {
				              $accent ="ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ";
				              $noAccent="AAAAAAACEEEEIIIIDNOOOOOOUUUUYBsaaaaaaaceeeeiiiidnoooooouuuyyby";
				              $reecriture=strtr(trim($nom),$accent,$noAccent);
				              $url=preg_replace('/[^0-9a-zA-Z]/', ' ', $reecriture);
				              $url=preg_replace('/ +/', '-', trim($url));
				              return $url;
				              }


				$nombreDePages=ceil($total/$messagesParPage);

				if(isset($_GET['page']))
				{
				     $pageActuelle=intval($_GET['page']);
				     
				     if($pageActuelle>$nombreDePages)
				     {
				          $pageActuelle=$nombreDePages;
				     }
				}
				else
				{
				     $pageActuelle=1;
				}

				$premiereEntree=($pageActuelle-1)*$messagesParPage;

				$retour_messages=mysqli_query($con,'SELECT dated, name, type, id, online FROM posts ORDER BY dated DESC LIMIT '.$premiereEntree.', '.$messagesParPage.'');

				while($data=mysqli_fetch_assoc($retour_messages))
				{   
					
							 $url = rewrite_escape_string($data["name"])."-".$data["id"].".html";

				     		echo "<tr>
				     		<td><p><a href=\"../$url\"><strong>{$data["name"]}</a></td></strong>";
							echo "<td>{$data["type"]}</td>";			
							echo "<td>".date("G:i - d/m/y", strtotime($data["dated"]))."</td>";			
							$line = array("<img src='img/red.png'>","<img src='img/green.png'>");
							$on = $line{$data["online"]};
							echo "<td id=\"ligne\">$on</td>";
							echo "<td><a href=\"edit.php?id={$data["id"]}\"><img src='img/ico_edit.png' title='Modifier'/></a> / 
							<a href=\"supprimer.php?id={$data["id"]}\"><img src='img/ico_suppr.png' title='Supprimer'/></a></td>
							</tr>";
				               
				}?>
		</table> 
			<?php
				echo '<br><div id="centrer">Page : '; 
				for($i=1; $i<=$nombreDePages; $i++)
				{     
				     if($i==$pageActuelle) //Si il s'agit de la page actuelle...
				     {
				         echo ' <div class="pagination-actif">'.$i.'</div>'; 
				     }	
				     else
				     {
				          echo ' <div class="pagination"><a href="index.php?page='.$i.'">'.$i.'</a> </div></div>';
				     }
				}
			?> 
		</div>
		
	</div>

</div>
<?php include("../footer.php");?>
</body>
</html>