<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#"> 
<head>
<?php
require"admin/bdd.php";
$con = mysqli_connect(DB_HOST,DB_LOGIN,DB_PASS,DB_BDD);
      				
$id = mysqli_real_escape_string ($con,$_GET['id']);
$sql = "SELECT * FROM posts WHERE id='$id' AND online='1'";
$req = mysqli_query($con,$sql) or die ('Maintenance en cours<br>'.$sql.'<br>'.mysqli_error());
$data = mysqli_fetch_assoc($req);
function rewrite_escape_string($nom)
              {
              $accent ="ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ";
              $noAccent="AAAAAAACEEEEIIIIDNOOOOOOUUUUYBsaaaaaaaceeeeiiiidnoooooouuuyyby";
              $reecriture=strtr(trim($nom),$accent,$noAccent);
              $url=preg_replace('/[^0-9a-zA-Z]/', ' ', $reecriture);
              $url=preg_replace('/ +/', '-', trim($url));
              return $url;
              }  
?>
<title><?php echo $data["name"]; ?></title>
<!-- OG TW -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@ESMontgeron">
<meta name="twitter:creator" content="@ESMontgeron">
<meta name="twitter:title" content="<?php echo $data["name"]; ?>">
<meta name="twitter:description" content="News et actu ES Montgeron Ahtlétisme">
<meta name="twitter:image" content="http://www.esmontgeron-athle.fr/admin/<?php echo $data["file"]; ?>">
<meta name="twitter:image:alt" content="<?php echo $data["description"]; ?>">
<!-- OG FB -->
<meta property="og:title" content="<?php echo $data["name"]; ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="http://www.esmontgeron-athle.fr/news.php?url=1&id=<?php echo $data["id"]; ?>" />
<meta property="og:image" content="http://www.esmontgeron-athle.fr/admin/<?php echo $data["file"]; ?>" />
<meta property="og:description" content="News et actus ES Montgeron Athlétisme" />
<?php include("header.php");?>
    
<div class="container-fluid mb-0" id="alaune">
	<?php 
	 	$sql = "SELECT * FROM posts WHERE id='$id' AND online='1' AND version='3'";
		$req = mysqli_query($con,$sql) or die ('Maintenance 1 en cours<br>'.$sql.'<br>'.mysqli_error());

		if ($data){
		$data = mysqli_fetch_assoc($req);
		echo "<img src=\"admin/{$data["file"]}\" alt=\"{$data["description"]}\" id=\"imgune\">";						
	?>
</div>

<div class="container">
	<!-- ACTU -->
	<section class="row" id="actualites">
		<div class="col-sm-8" id="article_text">
			<div id="categorie" class="hide_mobile"><?php echo "<time>".date("d/m/y", strtotime($data["dated"]))," - ", $data["type"]."</time>";?></div>	
			<h1><?php echo"{$data["name"]}";?></h1>	   
		     <?php echo "{$data["content"]}<p>&nbsp;</p>";}
		     	else{echo "Maintenance 2 en cours";}
		     ?>
		</div>
		<div class="col-sm-4">
			<aside>
				<ul>
					<a href="actualites.php" class="actu_direct">L'actu en direct</a>
		         	<hr class="foot2">
				 	<?php	
						$sql = "SELECT dated, name, id FROM posts WHERE online='1' ORDER BY dated DESC LIMIT 0, 9";
						$req = mysqli_query($con,$sql) or die ('Maintenance 4 en cours<br>'.$sql.'<br>'.mysqli_error());
						while($data = mysqli_fetch_assoc($req)) {
		        			$url = rewrite_escape_string($data["name"])."-".$data["id"].".html";
		                	echo"<div id='ss-liste'><a href=\"$url\">{$data["name"]}</a></div>";
					} ?>
	   			</ul>
			</aside>
		</div>
		<div id="plusnews"><a href="/actualites.php">Plus d'actualites...</a></div>
	</section>
</div>
<?php include("footer.php");?>
</body>
</html>