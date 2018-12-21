<?php
require_once('assets/php/main.php');
$db = get_db();
$choix = $_REQUEST['data'];
if ($choix =='prof') {
  if(!empty($_REQUEST['data']) && !empty($_REQUEST['nom']) && !empty($_REQUEST['prenom'])){
    $table = $_REQUEST['data'];
    $nom = $_REQUEST['nom'];
    $prenom = $_REQUEST['prenom'];

    $sql = 'INSERT INTO '.$table.'(nom,prenom) Values ("'.$nom.'","'.$prenom.'");';
    $db->query($sql);
  }
}elseif ($choix =='bts') {
  if(!empty($_REQUEST['data']) && !empty($_REQUEST['code']) && !empty($_REQUEST['libelle'])){
    $table = $_REQUEST['data'];
    $code = $_REQUEST['code'];
    $libelle = $_REQUEST['libelle'];
    $sql = 'INSERT INTO '.$table.'(codeBts,libelleBts) Values ("'.$code.'","'.$libelle.'");';
    $db->query($sql);
  }
}else if ($choix =='salle'){
  if(!empty($_REQUEST['data']) && !empty($_REQUEST['numero']) && !empty($_REQUEST['capacite'])){
    $table = $_REQUEST['data'];
    $numero = $_REQUEST['numero'];
    $capacite = $_REQUEST['capacite'];
    $sql = 'INSERT INTO '.$table.'(numSalle,capacite) Values ("'.$numero.'","'.$capacite.'");';
    $db->query($sql);
  }
}else if ($choix =='epreuve'){
  if(!empty($_REQUEST['data']) && !empty($_REQUEST['cepreuve']) && !empty($_REQUEST['nepreuve'])){
    $table = $_REQUEST['data'];
    $ecode = $_REQUEST['cepreuve'];
    $enom = $_REQUEST['nepreuve'];
    $sql = 'INSERT INTO '.$table.'(codeEpreuve,libelleEpreuve) Values ("'.$ecode.'","'.$enom.'");';
    $db->query($sql);
  }
}
?>
