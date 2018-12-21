<?php
require_once('assets/php/main.php');
$db = get_db();
$prof = $_REQUEST['prof'];
$bts = $_REQUEST['bts'];
$sql = "DELETE FROM enseigner WHERE idProf = '".$prof."' AND idBts = '".$bts."';";
$db->query($sql);
echo "done";
?>
