<?php
  require_once('assets/php/main.php');
  $db = get_db();

  if(!empty($_REQUEST['data'])) {
    $table = $_REQUEST['data'];
    $cond = $_REQUEST['cond'];
  }

  if($db && !empty($table) && !empty($cond)) {
    $sql = 'SELECT * FROM '.$table.';';
    $res = $db->query($sql);
    $firstRow = true;
    echo "<form id='deleteForm' onsubmit='deleteArray(); return false;'><table>";
    while ($row = $res->fetch_row()) {
      $good = true;
      $cpt = 0;
      if($firstRow) {
        !$firstRow;
      }
      echo "<tr>";
      while($good) {
        if(!empty($row[$cpt])) {
          if($cpt > 0) {
            echo "<td>".$row[$cpt]."</td>";
          }
        } else {
          echo "<td>";
            echo "<input type='checkbox' value='".$row[0]."' onclick='checkCheckbox()'/>";
            echo "<input type='hidden' name='".$row[0]."' value='".$cond."'/>";
          echo "</td>";
          $good = false;
        }
        $cpt++;
      }
      echo "</tr>";
    }
    echo "</table>";
    echo "<input id='deleteFormSubmit' type='submit' value='Supprimer'/>";
    echo "</form>";
    $res->close();
  }
?>

<script src="assets/js/main.js"></script>
<script>
  function deleteArray() {
    if(checkCheckbox()) {
      $.ajax({
        url: 'deleteArray.php',
        type: 'POST',
        data: {data: checkCheckbox(), table: "<?=$table?>", cond: "<?=$cond?>"}
      })
      .always(function(res) {
        console.log(res);
        if(res == "end") {
          console.log("Suppression ok");
          loadDelete();
        }
      });
    }
  }
</script>
