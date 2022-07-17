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
<title>Edition Administration - ESM</title>
<meta name="robots" content="noindex,nofollow"/>
<link href="css/style_admin.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<?php include("../header.php");?>

<div class="main_img"><img src="../img-fond.php"></div>

<span class="titre_lateral"><h2><a href="index.php">Retour Administration</a><hr class="foot2"></h2></span>
              
<div class="content">
<div class="titre_content" style="background-color:rgba(0,0,0,0.8);">MODIFIER UNE NEWS</div>

<div class="text_content">

    
    <span style="color:red"><img src="img/warning.png"> A remettre la cat&eacute;gorie voulue !</span>
             
              <?php
               require"bdd.php";
            $con = mysqli_connect(DB_HOST,DB_LOGIN,DB_PASS,DB_BDD);
                if(!empty($_POST)){
                  extract($_POST);
                  $sql="UPDATE posts SET name='$name', type='$type', content='$content', online='$online', description='$description' WHERE id=$id";
                  $req = mysqli_query($con,$sql) or die ('Erreur SQL!<br>'.$sql.'<br>'.mysqli_error());
                  echo "<h1 class='news_modf'><span>News modifiee avec succes !</span></h1>";
                  $_GET["id"]=$id;
                }

                $sql="SELECT * FROM posts WHERE id={$_GET["id"]}";
                $req = mysqli_query($con,$sql) or die ('Erreur SQL!<br>'.$sql.'<br>'.mysqli_error());
                $data=mysqli_fetch_assoc($req);

              ?>

             
      <form id="formu" method="post" action="edit.php"/>

      <input name="id" type="hidden" value="<?php echo $data["id"]; ?>"/> 

              Titre : <input type="text" required name="name" id="formul" value="<?php echo $data["name"]; ?>"/>
              <br><br>

              Cat&eacute;gorie : <select type="text" required name="type" id="formul" value="<?php echo $data["type"]; ?>"/>

                        <option value ="Actu Club">Actu Club</option>
                        <option value ="Agenda">Agenda</option>
                        <option value ="Carnet">Carnet</option>
                        <option value ="Comite Directeur">Comite Directeur</option>
                        <option value ="Competitions">Competitions</option>
                        <option value ="Info Site">Info Site</option>
                        <option value ="Interclubs">Interclubs</option>
                        <option value ="Photos">Photos</option>
                        <option value ="Meeting de Montgeron">Meeting de Montgeron</option>
                        <option value ="Newsletters">Newsletters</option>
                        <option value ="Selections">Selections</option>
                        <option value ="Revue de Presse">Revue de Presse</option>


                   </select> <span style="color:red; text-transform: uppercase; font-size: 1.1em"><img src="img/warning.png"> A remettre la cat&eacute;gorie voulue !</span><br>
              
         
              <h1>Contenu : </h1><br>
              <div class="switch">
          <input type="checkbox" value="1" name="online" checked/>
           <label><i></i></label>
          </div>


Description image : <input type="text" name="description" value="<?php echo $data["description"]; ?>">


<br><br>


              <textarea name="content" required autofocus ><?php echo $data["content"]; ?></textarea>
              <script type="text/javascript">            
                    CKEDITOR.replace('content',{ 
                              toolbar : 'MyToolbar_user'                            
                            });
        </script>
        <br>     
              <input type="submit" value="Modifier !"/>
    <br><br>
            </form>
            <span style="color:red"><img src="img/warning.png"> A remettre la cat&eacute;gorie voulue !</span>
            <a href="index.php"><h2>Retour Sommaire Administration</h2></a>
             
           

</div>


</div>


</div>

  <?php include("../footer.php");?>
</body>
</html>