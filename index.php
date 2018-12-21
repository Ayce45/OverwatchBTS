<?php
require_once('assets/php/main.php');
$db = get_db();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Surveillance BTS</title>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans"/>
    <link  rel="shortcut icon" href="assets/img/surveillance-eye-symbol.svg">
    <link rel="stylesheet" href="assets/css/jquery-ui.structure.min.css"/>
    <link rel="stylesheet" href="assets/css/jquery-ui.theme.min.css"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
  </head>
  <body id="hpbody">
    <img id="backgroundImg" src="assets/img/examen.jpg"></img>
    <header id="hpheader">
      <h1 id="hph1"><img id="hpimg" src="assets/img/surveillance-eye-symbol.svg" alt="Eye symbol">Surveillance BTS</h1>
    </header>
    <content>
      <section>
        <div>
          <ul id="hpul">
            <li class="hpli" onclick="$('#hpform').load('profbts.php');">PROF-BTS</li><li class="hpli">BTS-EPREUVE</li><li class="hpli">M.A.J Epreuve et Affectation Salle</li><li id="lastli" onclick="$('#hpform').load('backoffice.php')" class="hpli">Back Office</li>
          </ul>
        </div>
        <div id="hpform"></div>
      </section>
    </content>
    <footer id="hpfooter">
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/jquery.mobile-1.4.5.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
