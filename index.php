<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>
<!DOCTYPE html>
<?php
include('src' . DIRECTORY_SEPARATOR . 'config.php');
include('src' . DIRECTORY_SEPARATOR . 'dat.php');
?>
<html lang="de">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Resume Andrey Shtarev</title>
  <link href="/css/bootstrap-4.0.0.css" rel="stylesheet">
</head>
  <body>
    <div class="container">
      <hr>
<?php include('view' . DIRECTORY_SEPARATOR . 'header.php'); ?>
      <hr>
      <div class="row">
<?php include('view' . DIRECTORY_SEPARATOR . 'block_1.php'); ?>
<?php include('view' . DIRECTORY_SEPARATOR . 'block_2.php'); ?>
      </div>
      <hr>
<?php if($Skill) { include('view' . DIRECTORY_SEPARATOR . 'skill.php'); } ?>
<?php if($block5) { include('view' . DIRECTORY_SEPARATOR . 'block_5.php'); } ?>
<?php if($erfahrungen) { include('view' . DIRECTORY_SEPARATOR . 'erfahrung.php'); } ?>
<?php if($beispiele) { include('view' . DIRECTORY_SEPARATOR . 'block_8.php'); } ?>
	  <div id="kontakt"></div>
      <hr>
      <h2>Contact</h2>
      <hr>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8  col-12 jumbotron">
            <form id="f_m">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="absenderName" name="absenderName" placeholder="Name">
              </div>
              <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" class="form-control" id="absenderEmail" name="absenderEmail" placeholder="Email Address" aria-describedby="emailHelp">
                <span id="emailHelp" class="form-text text-muted" style="display: none;">Please enter a valid e-mail address.</span>
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea rows="10" cols="100" class="form-control" id="absenderMessage" name="absenderMessage" placeholder="Message" aria-describedby="messageHelp"></textarea>
                <span id="messageHelp" class="form-text text-muted" style="display: none;">Please enter a message.</span>
              </div>
              <div class="text-center">
                <p>Um die Mitteilung abzusenden antworten Sie auf die Frage:</p>
                <p>zwei plus zwei wird<br><input class="text-center" style="width:220px;" type="text" id="otvet" value="" placeholder="Zahl als Zahlen angeben"></p>
                <button type="button" class="btn btn-primary" onclick="emailFoo()">Senden</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <hr>
      <footer class="text-center">
        <div class="container">
          <div class="row">
            <div class="col-12">
            <p>Copyright © 2010<script>new Date().getFullYear()>2010&&document.write("-"+new Date().getFullYear());</script> | <a href="https://github.com/Shtarev/Rezume">Freiheitsgewährende Software</a> | Design & programmierung by <a href="https://www.netzexplorer.com">Andrey Shtarev</a></p>
            </div>
          </div>
        </div>
        <div><a href="admin.php">Admin</a></div>
      </footer>
    </div>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.0.0.js"></script>
    <script src="js/nachtrag.js"></script>
    <script>
    async function emailFoo(){
        if(otvet.value == 4) {
          let data = {
            absenderName: absenderName.value,
            absenderEmail: absenderEmail.value,
            absenderMessage: absenderMessage.value
          }
          let uri = location.protocol+'//'+window.location.hostname;
          var resp = await fetch(uri + '/emailFoo.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
          })
          .then(response => {
            return response.text();
          })

        }
        else{ alert('Antwort ist nicht richtig. Vorsagen: 4') }
        if(resp) {
          absenderName.value = '';
          absenderEmail.value = '';
          absenderMessage.value = '';
          alert('Die Nachricht wurde erfolgreich gesendet!')
        }
    }
    </script>
  </body>
</html>