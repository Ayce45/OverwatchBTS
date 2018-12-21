<?php
require_once('assets/php/main.php');
require_once('assets/php/tableColNames.php');
$db = get_db();
if(!empty($_REQUEST) && !empty($_REQUEST['table']) && !empty($_REQUEST['cond'])){
  $table = $_REQUEST['table'];
  $cond = $_REQUEST['cond'];
}

if(!empty($table) && !empty($cond)) {
  $sql = "UPDATE ".$table." SET ";
  $cpt=0;
  foreach ($_REQUEST as $key => $value) {
    $keys[$cpt]=$key;
    $values[$cpt]=$value;
    $cpt++;
  }
  $comma=false;
  for ($i=0; $i < $cpt; $i++) {
    if($keys[$i] == "table") {
      $i++;
    }
    if($keys[$i] == "cond") {
      $i++;
    }
    if($keys[$i] == $cond) {
      $i++;
    }
    var_dump($i);
    if($comma) {
      $sql .= ", ";
    }
    $sql .= $keys[$i]."='".$values[$i]."'";
    $comma=true;
  }
}
$sql .= " WHERE ".$cond."='".$_REQUEST[$cond]."'";
$sql .= ";";
$db->query($sql);
?>
