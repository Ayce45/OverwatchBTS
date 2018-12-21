<?php
require_once('assets/php/main.php');
$db = get_db();

if(!empty($_REQUEST['data'])) {
  $toDelete = $_REQUEST['data'];
  $table = $_REQUEST['table'];
  $cond = $_REQUEST['cond'];
}

if($db && !empty($toDelete) && !empty($table)) {
  foreach ($toDelete as $key => $value) {
    $sql = 'DELETE FROM '.$table.' WHERE '.$cond.' = "'.$value.'";';
    // echo $sql;
    $res = $db->query($sql);
  }
  echo 'end';
}
?>
