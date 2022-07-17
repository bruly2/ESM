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
<title>Statistques Administration - ESM</title>
<link href="css/style_admin.css" rel="stylesheet" type="text/css">
<meta name="robots" content="noindex,nofollow"/>
<?php include("../header.php");?>

<div class="main_img"><img src="../img-fond.php"></div>

<span class="titre_lateral"><h2><a href="logout.php">D&eacute;connexion</a><hr class="foot2"></h2></span>
              
<div class="content">
<div class="titre_content" style="background-color:rgba(0,0,0,0.8);">STATISTIQUES</div>

<div class="text_content">

        <div id="centrer">
            <br>    
<?php
   
    $nombre_total_news = mysqli_num_rows(mysqli_query('SELECT * FROM posts'));
    $nombre_ac = mysqli_num_rows(mysqli_query('SELECT * FROM posts WHERE type="Actu Club"'));
    $nombre_Agenda = mysqli_num_rows(mysqli_query('SELECT * FROM posts WHERE type="Agenda"'));
    $nombre_Carnet = mysqli_num_rows(mysqli_query('SELECT * FROM posts WHERE type="Carnet"'));
    $nombre_ComiteDirecteur = mysqli_num_rows(mysqli_query('SELECT * FROM posts WHERE type="Comite Directeur"'));
    $nombre_Competitions = mysqli_num_rows(mysqli_query('SELECT * FROM posts WHERE type="Competitions"')); 
    $nombre_Entrainements = mysqli_num_rows(mysqli_query('SELECT * FROM posts WHERE type="Entrainements"')); 
    $nombre_InfoSite = mysqli_num_rows(mysqli_query('SELECT * FROM posts WHERE type="Info Site"'));
    $nombre_Interclubs = mysqli_num_rows(mysqli_query('SELECT * FROM posts WHERE type="Interclubs"')); 
    $nombre_Photos = mysqli_num_rows(mysqli_query('SELECT * FROM posts WHERE type="Photos"'));
    $nombre_MeetingdeMontgeron = mysqli_num_rows(mysqli_query('SELECT * FROM posts WHERE type="Meeting de Montgeron"')); 
    $nombre_Newsletters = mysqli_num_rows(mysqli_query('SELECT * FROM posts WHERE type="Newsletters"')); 
    $nombre_Selections = mysqli_num_rows(mysqli_query('SELECT * FROM posts WHERE type="Selections"'));
    $nombre_RevuedePresse = mysqli_num_rows(mysqli_query('SELECT * FROM posts WHERE type="Revue de Presse"'));
    
    $pourcentage_ac = $nombre_ac * 100 / $nombre_total_news;
    $pourcentage_Agenda = $nombre_Agenda * 100 / $nombre_total_news;
    $pourcentage_Carnet = $nombre_Carnet * 100 / $nombre_total_news;
    $pourcentage_ComiteDirecteur = $nombre_ComiteDirecteur * 100 / $nombre_total_news;
    $pourcentage_Competitions = $nombre_Competitions * 100 / $nombre_total_news; 
    $pourcentage_Entrainements = $nombre_Entrainements * 100 / $nombre_total_news; 
    $pourcentage_InfoSite = $nombre_InfoSite * 100 / $nombre_total_news;
    $pourcentage_Interclubs = $nombre_Interclubs * 100 / $nombre_total_news; 
    $pourcentage_Photos = $nombre_Photos * 100 / $nombre_total_news;
    $pourcentage_MeetingdeMontgeron = $nombre_MeetingdeMontgeron * 100 / $nombre_total_news;
    $pourcentage_Newsletters = $nombre_Newsletters * 100 / $nombre_total_news;  
    $pourcentage_Selections = $nombre_Selections * 100 / $nombre_total_news;
    $pourcentage_RevuedePresse = $nombre_RevuedePresse * 100 / $nombre_total_news;
     ;?>  
   
    <table width="650px">
        <thead>
                <tr>
                    <th id="coin_sup_droit" colspan="2"><?php 
                         echo $nombre_total_news . ' Articles publies';
                     ?>
                 </th>                                   
                </tr>
            </thead>
        <?php
    echo ' <tr><td><br> ' .$nombre_ac . ' Actu Club<br><hr>';
    echo $nombre_Agenda . ' Agenda<br><hr>';
    echo $nombre_Carnet . ' Carnet<br><hr>';
    echo $nombre_ComiteDirecteur . ' Comite Directeur<br><hr>';
    echo $nombre_Competitions . ' Competitions<br><hr>'; 
    echo $nombre_Entrainements . ' Entrainements<br><hr>'; 
    echo $nombre_InfoSite . ' Info Site<br><hr>';
    echo $nombre_Interclubs . ' Interclubs<br><hr>'; 
    echo $nombre_Photos . ' Photos<br><hr>';
    echo $nombre_MeetingdeMontgeron . ' Meeting de Montgeron<br><hr>'; 
    echo $nombre_Newsletters . ' Newsletters<br><hr>'; 
    echo $nombre_Selections . ' Selections<br><hr>';
    echo $nombre_RevuedePresse . ' Revue de Presse</td><br>';

    echo '<td><br> Actu Club : ' . $pourcentage_ac . ' %<br><hr>';
    echo ' Agenda : ' . $pourcentage_Agenda . ' %<br><hr>';
    echo ' Carnet : ' . $pourcentage_Carnet . ' %<br><hr>';
    echo ' Comite Directeur : ' . $pourcentage_ComiteDirecteur . ' %<br><hr>';
    echo ' Competitions : ' . $pourcentage_Competitions . ' %<br><hr>';
    echo ' Entrainements : ' . $pourcentage_Entrainements . ' %<br><hr>'; 
    echo ' Info Site : ' . $pourcentage_InfoSite . ' %<br><hr>';
    echo ' Interclubs : ' . $pourcentage_Interclubs . ' %<br><hr>'; 
    echo ' Photos : ' . $pourcentage_Photos . ' %<br><hr>';
    echo ' Meeting de Montgeron : ' . $pourcentage_MeetingdeMontgeron . ' %<br><hr>'; 
    echo ' Newsletters : ' . $pourcentage_Newsletters . ' %<br><hr>'; 
    echo ' Selections : ' . $pourcentage_Selections . ' %<br><hr>';
    echo ' Revue de Presse : ' . $pourcentage_RevuedePresse . ' %<br></td></tr>';

    ?> 
</table>
<br>        <a href="index.php"><h2>Retour Sommaire Administration</h2></a>         
<br>

</div>
        </div>


</div>

    <?php include("../footer.php");?>
</body>
</html>