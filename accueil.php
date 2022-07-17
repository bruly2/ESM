<!DOCTYPE html>
<html>
<head>
<title>Accueil - Es Montgeron Athl&eacute;tisme</title>
<meta name="robots" content="index, follow">
<meta name="description" content="Le site officiel de l'es montgeron athletisme. Retrouvez toutes les informations et les actualites du club: vie du club, saison, statistiques, et communication."/>
<meta name="keywords" content="montgeron, athletisme, meeting, accueil, club, comp&eacute;tion, sport, running, course, lancer, sauter, marcher, piste, salle, cross, marathon, loisirs"/>
<?php include("header.php");?>

<div class="container-fluid" id="alaune">
	<?php
      require"admin/bdd.php";
       $con = mysqli_connect(DB_HOST,DB_LOGIN,DB_PASS,DB_BDD);
         
       $sql = "SELECT dated, name, type, id, content, file, description FROM posts WHERE online=1 ORDER BY dated DESC LIMIT 0, 1";
       $req = mysqli_query($con,$sql) or die ('Maintenance en cours<br>'.$sql);

     function rewrite_escape_string($nom)
      {
      $accent ="ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ";
      $noAccent="AAAAAAACEEEEIIIIDNOOOOOOUUUUYBsaaaaaaaceeeeiiiidnoooooouuuyyby";
      $reecriture=strtr(trim($nom),$accent,$noAccent);
      $url=preg_replace('/[^0-9a-zA-Z]/', ' ', $reecriture);
      $url=preg_replace('/ +/', '-', trim($url));
      return $url;
      }             

		function debutchaine($chaine, $nbmots) { 
      $chaine = preg_replace('!<br.*>!iU', "", $chaine); // remplacement des BR par des espaces
      $chaine = preg_replace('!</p.*>!iU', "", $chaine); // remplacement des p par des espaces
      $chaine = preg_replace('/\s\s+/', ' ', $chaine); // retrait des espaces inutiles
      $tab = explode(" ",$chaine);
      if (count($tab) <= $nbmots) {
      $affiche = $chaine;
      } else {
      $affiche = "$tab[0]";
      for ($i=1; $i<$nbmots; $i++) {
      $affiche .= " $tab[$i]";
      }
      }           
      $affiche .= ''; 
      return $affiche;
      }  

	 while($data = mysqli_fetch_assoc($req))

			{        
    $url = rewrite_escape_string($data["name"])."-".$data["id"].".html";
    ?>
	<article>
        <?php
           echo "<img src=\"/admin/{$data["file"]}\" alt=\"{$data["description"]}\" id=\"imgune\">";
           
           echo "<h2><a href=\"$url\">".$data["name"]."</a></h2>";      
         } ?>
	</article>
</div>


<div class="container">
	<h1 class="hide_mobile">ES Montgeron Athlétisme</h1>

	<!-- ACTUALITES -->
	<section class="row" id="actualites">
		<div class="col-sm-8">
			<a class="actu_direct" href="/actualites.php">Actualites</a>
			<hr class="foot4">
			<article>
				<?php
                 
			      $sql = "SELECT dated, name, type, id, content, file, description FROM posts WHERE online=1 ORDER BY dated DESC LIMIT 1, 5";
			      $req = mysqli_query($con,$sql) or die ('Erreur SQL!<br>'.$sql.'<br>'.mysqli_error());
			 
			 		 function debutchaine2($chaine, $nbmots) { 
			              $chaine = preg_replace('!<br.*>!iU', "", $chaine); // remplacement des BR par des espaces
			              $chaine = preg_replace('!</p.*>!iU', "", $chaine); // remplacement des p par des espaces
			              $chaine = preg_replace('/\s\s+/', ' ', $chaine); // retrait des espaces inutiles
			              $tab = explode(" ",$chaine);
			              if (count($tab) <= $nbmots) {
			              $affiche = $chaine;
			              } else {
			              $affiche = "$tab[0]";
			              for ($i=1; $i<$nbmots; $i++) {
			              $affiche .= " $tab[$i]";
			              }
			              }           
			              $affiche .= ' <span class="hide_mobile">...</span>'; 
			              return $affiche;
			              }

			 		while($data = mysqli_fetch_assoc($req))
				      {              
				        $url = rewrite_escape_string($data["name"])."-".$data["id"].".html";
				        echo "<a href=\"$url\"><h2>".$data["name"]."</h2></a>";
				        echo"<time>".date("d/m", strtotime($data["dated"]))," - ", $data["type"]."</time>";
				        echo "<img src=\"/admin/{$data["file"]}\" alt=\"{$data["description"]}\" class=\"imgarticle\">";
				        $mots_complets = $data["content"];
				        $nb_mots = 65;				      
				        $mot_courts = debutchaine2($mots_complets, $nb_mots); 
				        echo "<div class=\"vision-home\"><p>{$mot_courts}</p></ul></u></em></strong></blockquote></table></div>";
				        echo "<div class='lire-suite'><a href=\"$url\">Lire la suite...</a></div>";
				      } ?>
			</article>
			<a href="/actualites.php">Plus d'actualites...</a>
		</div>

		<div class="col-sm-4">
			<aside>
				<ul>
		         	<a href="actualites.php" class="actu_direct">L'actu en direct</a>
		         	<hr class="foot2">
		            <?php 

		                $sql = "SELECT dated, name, id FROM posts WHERE online=1 ORDER BY dated DESC LIMIT 0, 15";
		                $req = mysqli_query($con,$sql) or die ('Erreur SQL!<br>'.$sql.'<br>'.mysqli_error());
		                while($data = mysqli_fetch_assoc($req))
		                  {
		                  	$url = rewrite_escape_string($data["name"])."-".$data["id"].".html";
		                 	echo"<div class='ss-liste'><a href=\"$url\">{$data["name"]}</a></div>";		              
		                } ?> 
		         </ul>

				<div id="slide0">				 
					<a href="inscription.php"><div class="rectangle">Inscription 2021-22</div></a>
					<img src="img/inscri.jpg">
					<a href="/archives_resultats.php"><div class="rectangle">Resultats 2022</div></a>
					<img src="img/compt.jpg">
				</div>
			</aside>
		</div>
	</section>

	<!-- ALBUM PHOTO 
	<section id="album">
		<div id="warp_album" style="max-width:780px;">
    		<h2 id="titre_album"><a href="/photos.html">Phototheque</a></h2>
    		<em>Dernier ajout : 9 avril 2022</em>
    		<a href="/photos.html"><img src="img/phototheque.jpg"></a>
    		<span id="album_detail">Best-of 2022</span>
		</div>
	</section>-->
	</div>

	<hr class="foot4 mt-5">
	
	<div class="container">

	<!-- INSCRIPTON / BOUTIQUE / ENTRAINEMENT / MEETING / RECORDS / HAUT NIVEAU-->
	<section id="troisasides">
		<div class="row">
			<div class="col-sm-4" id="aside1">
				  	<a href="inscription.php"><h3 class="pop_asi">Inscription</h3></a>
			  </div>
			  <div class="col-sm-4" id="aside2">
					<a href="inscription.php#boutique"><h3 class="pop_asi">Boutique</h3></a>
				</div>
			  <div class="col-sm-4" id="aside3">
			  		<a href="entrainement.php"><h3 class="pop_asi">Entrainements</h3></a>
			  </div>
			  <div class="col-sm-4" id="aside4">
			  		<a href="epreuve_horaire_meeting.php"><h3 class="pop_asi">Meeting</h3></a>
				</div>
			  <div class="col-sm-4" id="aside5">
			  		<a href="record-club.php"><h3 class="pop_asi">Records</h3></a>
			  </div>
			  <div class="col-sm-4" id="aside6">
			  		<a href="organisation_haut_niveau.php"><h3 class="pop_asi">Haut niveau</h3></a>
			   </div>
		</div>
	</section>
</div>
<div class="container-fluid p-0">
	<!-- A LA UNE -->
    <section id="slide1">
    	<div id="pub">  
	        <p id="asideune">A LA UNE</p>
	          <h2 id="asidetext"><a href="/news.php?url=1&id=887">5e titre de champion de France pour Pascal Martinot-Lagarde</a></h2>
	        <p id="asidedetail">7"52 - Bordeaux</p>
      	</div>
    </section>
	<!-- TWITTER -->
	<section id="media">
		<div id="socialtw">
			<a href="https://twitter.com/ESMontgeron">Flux direct @EsMontgeron</a>
		</div>
		<a class="twitter-timeline" id="twitter" data-link-color="#000000" data-chrome="nofooter noheader noborders noscrollbar transparent" data-tweet-limit="4"  href="https://twitter.com/ESMontgeron"  data-widget-id="498845715431297024">Tweets de @ESMontgeron</a>
	    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>	 
	</section>

</div>

<?php include("footer.php");?>
</body>
</html>