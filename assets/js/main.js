function ajoutProf(){
  var show_message = $('#msg_all').stop(true, false).fadeIn(0).delay(2000).fadeOut(0);
  $.ajax({
    url: 'ajout.php',
    type: 'POST',
    data: $("#form").serialize()
  })
  .done(function() {
    show_message;
    $("#msg_all").html("Formulaire envoyé");
    $(".a_inpt").val('');
  })
  .fail(function() {
    $("#msg_all").html("Erreur");
  });
}
function loadDelete() {
  var value = document.getElementsByName($("#select").val())[0].value;
  var data = {};
  data["data"] = $("#select").val();
  data["cond"] = value;
  $("#tableau").load("supprimer.php", data);
}
function loadModif() {
  var value = document.getElementsByName($("#select").val())[0].value;
  var data = {};
  data["data"] = $("#select").val();
  data["cond"] = value;
  $("#tableau").load("modifier.php", data);
}
function checkCheckbox() {
  var checkedList = {};
  if($('#deleteForm :checked').length > 0) {
    $('#deleteFormSubmit').disabled = false;
    checkedList = {};
    for (var i = 0; i < $('#deleteForm :checked').length; i++) {
      checkedList[i] = $('#deleteForm :checked').eq(i).val();
    }
    console.log(checkedList);
    return checkedList;
  } else {
    $('#deleteFormSubmit').disabled = true;
    return false;
  }
}
function loadRecherche(){
  var critere = document.getElementById("barreDeRecherche").value;
  var dataR= {};
  dataR["critere"] = critere;
  $("#tableau").load("supprimer.php",dataR);
}
