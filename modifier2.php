<?php
require_once('assets/php/main.php');
require_once('assets/php/tableColNames.php');
$db = get_db();

if(!empty($_REQUEST['ref']) && !empty($_REQUEST['table']) && !empty($_REQUEST['cond'])){
  $id = $_REQUEST['ref'];
  $table = $_REQUEST['table'];
  $cond = $_REQUEST['cond'];
}

if(!empty($id) && !empty($table) && !empty($cond)) {
  $names = ${"names_".$table};
  $sql = "SELECT ".$names[0]." FROM ".$table." WHERE ".$names[0]." = '".$id."';";
  $res = $db->query($sql);
  if(!empty($res)) {
    $res->close();
    echo "<table>";
    echo "<tr>";
    $cpt = 0;
    while($cpt < sizeof($names)) {
      if($names[$cpt] != $cond) {
        echo "<th>".$names[$cpt]."</th>";
      }
      $cpt++;
    }
    echo "</tr><tr>";
    $cpt = 0;
    while($cpt < sizeof($names)) {
      if($names[$cpt] != $cond) {
        $sql = "SELECT ".$names[$cpt]." FROM ".$table." WHERE ".$names[0]." = '".$id."';";
        $res = $db->query($sql);
        while($row = $res->fetch_row()) {
          echo "<td>".$row[0]."</td>";
        }
        $res->close();
      }
      $cpt++;
    }
    echo "</tr>";
    echo "</table>";

    echo "<br/><br/>";// ////////////////////////////////////

    echo "<form onsubmit='confirmEdit(this); return false;'><table>";
    echo "<tr>";
    $cpt = 0;
    while($cpt < sizeof($names)) {
      if($names[$cpt] != $cond) {
        echo "<th>".$names[$cpt]."</th>";
      }
      $cpt++;
    }
    echo "</tr><tr>";
    $cpt = 0;
    while($cpt < sizeof($names)) {
      $sql = "SELECT ".$names[$cpt]." FROM ".$table." WHERE ".$names[0]." = '".$id."';";
      $res = $db->query($sql);
      while($row = $res->fetch_row()) {
        if($names[$cpt] == $cond) {
          echo "<input name='".$names[$cpt]."' type='hidden' value='".$row[0]."'></input>";
        } else {
          echo "<td><input name='".$names[$cpt]."' type='text' value='".$row[0]."'></input></td>";
        }
      }
      $res->close();
      $cpt++;
    }
    echo "</tr>";
    echo "<tr><td><input type='submit'></input></td></tr>";
    echo "</table></form>";
    echo "<span id='msg_all'></span>";
  } else {
    echo "<p>Pas de résultat à afficher.</p>";
  }
}
?>

<script>
function editMsg(){
}
function confirmEdit(form) {
  <?php
  $colNames = "var colNames=[";
  if(!empty($names)) {
    $cpt = 0;
    while($cpt < sizeof($names)) {
      if($cpt == sizeof($names)-1) {
        $colNames .= "'".$names[$cpt]."'";
      } else {
        $colNames .= "'".$names[$cpt]."',";
      }
      $cpt++;
    }
  }
  $colNames .= "];";
  echo $colNames;
  ?>
  data = {};
  data['table'] = "<?=$table?>";
  data['cond'] = "<?=$cond?>";
  for (var i = 0; i < colNames.length; i++) {
    var name = colNames[i];
    data[colNames[i]]=form[name].value;
  }
  var show_message = $('#msg_all').stop(true, false).fadeIn(0).delay(2000).fadeOut(0);
  $.ajax({
    url: 'modifierProcess.php',
    type: 'POST',
    data: data
  })
  .done(function() {
    show_message;
    $("#msg_all").html("Formulaire envoyé");
  })
  .fail(function() {
    $("#msg_all").html("Erreur");
  });
}
</script>
