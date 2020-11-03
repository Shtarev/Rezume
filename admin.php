<?php
include('src/config.php'); include('src/dat.php');
function __autoload( $className ) {  
    include "src/classes/" . $className . ".php";
}
$pass_view = 'view';
$pass = new Pass($passw);
if(isset($_POST['ausgang'])){
    $pass->aus();
    $pass->pruf($pass_view);
}
else {
    $pass->pruf($pass_view);
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap-4.0.0.css" rel="stylesheet">
  <link href="css/admin.css" rel="stylesheet" type="text/css">
  <link href="contentedit/css/fontAwesome.css" rel="stylesheet">
  <link href="contentedit/css/style.css" rel="stylesheet">
  <title>Admin</title>
</head>
  <body>
  <center>
  <br> 
  <form method="post" action="">  
    <input type="hidden" name="ausgang">  
    <input type="submit" class="btn btn-secondary" value="Ausgang">  
  </form>
  </center>
  <br> 
    <div class="container">
      <hr>
<?php include('view/admin/header.php'); ?>
      <hr>
      <div class="row">
<?php include('view/admin/block_1.php'); ?>
<?php include('view/admin/block_2.php'); ?>
      </div>
      <hr>
<?php if($Skill) { include('view/admin/skill.php'); } ?>
<?php if($block5) { include('view/admin/block_5.php'); } ?>
<?php if($erfahrungen) { include('view/admin/erfahrung.php'); } ?>
<?php if($beispiele) { include('view/admin/block_8.php'); } ?>
	  <div id="kontakt"></div>
      <hr>
      <h2>Contact E-Mail</h2>
      <hr>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8  col-12 jumbotron">
            <form method="post" action="src/email.php">
              <div class="text-center">
                <p>Empfänger E-Mail:</p><br>
                <input type="hidden" name="altEmail" value="<?=$email?>">
                <input class="text-center" style="width:220px;" type="text" name="email" value="<?=$email?>"><br><br>
                <button type="submit" class="btn btn-primary">E-Mail Bestätigen</button>
              </div>
            </form>
          </div>
        </div>
      </div>
	  <hr>
      <h2>Passwort</h2>
      <hr>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8  col-12 jumbotron">
            <form method="post" action="src/pass.php">
              <div class="text-center">
                <p>Passwort:</p><br>
                <input type="hidden" name="altPass" value="<?=$passw?>">
                <input class="text-center" style="width:220px;" type="num" name="pass" value="<?=$passw?>"><br><br>
                <button type="submit" class="btn btn-primary">Passwort Bestätigen</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <footer class="text-center">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <p>Copyright © 2010<script>new Date().getFullYear()>2010&&document.write("-"+new Date().getFullYear());</script> | Freiheitsgewährende Software | Design & programmierung by <a href="https://www.netzexplorer.com">Andrey Shtarev</a></p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.0.0.js"></script>
    <script src="js/nachtrag.js"></script>
    <script src="js/admin.js"></script>
    <script src="contentedit/js/script.js"></script>
  </body>
</html>