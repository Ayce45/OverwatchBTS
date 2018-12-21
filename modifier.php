<?php
require_once('assets/php/main.php');
require_once('assets/php/tableColNames.php');
$db = get_db();

if(!empty($_REQUEST['data']) && !empty($_REQUEST['cond'])) {
  $table = $_REQUEST['data'];
  $cond = $_REQUEST['cond'];
}

if($db && !empty($table) && !empty($cond)) {
  $names = ${"names_".$table};
  $sql = 'SELECT * FROM '.$table.';';
  $res = $db->query($sql);
  $firstRow = true;
  echo "<form id='editForm' onsubmit='edit(this); return false;'><table>";
  $cpt = 0;
  while($cpt < sizeof($names)) {
    if($names[$cpt] != $cond) {
      echo "<th>".$names[$cpt]."</th>";
    }
    $cpt++;
  }
  while ($row = $res->fetch_row()) {
    $good = true;
    $cpt = 0;
    if($firstRow) {
      !$firstRow;
    }
    echo "<tr>";
    while($good) {
      if(isset($row[$cpt]) && !is_null($row[$cpt])) {
        if($cpt >= 0) {
          if($cpt > 0) {
            echo "<td>".$row[$cpt]."</td>";
          }
        }
      } else {
        echo "<td>";
        echo "<input type='submit' name='".$row[0]."' value='Modifier' onclick='refThis(this);'/>";
        echo "<input type='hidden' name='".$row[0]."' value='".$cond."'/>";
        echo "</td>";
        $good = false;
      }
      $cpt++;
    }
    echo "</tr>";
  }
  echo "</table>";
  echo "</form>";
  $res->close();
}
?>

<script>
var ref;
function refThis(item) {
  ref = item.name;
}
function edit(form) {
  console.log(ref);
  console.log(form);
  var data = {};
  data['ref'] = ref;
  data['table'] = "<?=$table?>";
  data['cond'] = "<?=$cond?>";
  $("#tableau").load("modifier2.php", data);
}
</script>
