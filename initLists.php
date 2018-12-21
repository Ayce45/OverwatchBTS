<?php
require_once('assets/php/main.php');
$db = get_db();

$bts = $_REQUEST['bts'];

$sql = "SELECT prof.idProf, nom, prenom FROM prof WHERE prof.idProf NOT IN (SELECT prof.idProf FROM prof, enseigner WHERE enseigner.idProf=prof.idProf AND idBts = '".$bts."');";
echo '<ul id="notAssigned" class="linkedSort">';
$res = $db->query($sql);
while ($row = $res->fetch_row()) {
  echo '<li class="ui-state-default" value="'.$row[0].'">'.$row[1]." ".$row[2].'</li>';
}
echo '</ul>';
$res->close();

$sql = "SELECT prof.idProf, nom, prenom FROM prof, enseigner WHERE enseigner.idProf=prof.idProf AND idBts = '".$bts."';";
echo '<ul id="assigned" class="linkedSort">';
$res = $db->query($sql);
while ($row = $res->fetch_row()) {
  echo '<li class="ui-state-highlight" value="'.$row[0].'">'.$row[1]." ".$row[2].'</li>';
}
echo '</ul>';
$res->close();
?>
<script>

$( function() {
  $( "#notAssigned, #assigned" ).sortable({
    connectWith: ".linkedSort",
    revert: true
  }).disableSelection();
} );

$( "#assigned" ).on( "sortreceive", function( event, ui ) {
  var data = {};
  data['prof'] = ui.item[0].attributes['value'].value;
  data['bts'] = $('#bts').val();
  console.log(data);
  $.ajax({
    url: 'addProfToBts.php',
    type: 'POST',
    data: data
  })
  .always(function(e) {
    console.log(e);
  });
});

$( "#notAssigned" ).on( "sortreceive", function( event, ui ) {
  var data = {};
  data['prof'] = ui.item[0].attributes['value'].value;
  data['bts'] = $('#bts').val();
  console.log(data);
  $.ajax({
    url: 'removeProfToBts.php',
    type: 'POST',
    data: data
  })
  .always(function(e) {
    console.log(e);
  });
});

</script>
