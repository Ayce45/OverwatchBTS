<div id="content">
  <div id="div1">
    <select id="select">
      <option value="prof"> Professeur</option>
      <option value="salle"> Salle</option>
      <option value="bts"> BTS</option>
      <option value="epreuve"> Epreuve</option>
      <input type="hidden" name="prof" value="idProf"></input>
      <input type="hidden" name="salle" value="idSalle"></input>
      <input type="hidden" name="bts" value="idBts"></input>
      <input type="hidden" name="epreuve" value="idEpreuve"></input>
    </select><br>
    <input value="AJOUTER" type="button" onclick='$("#tableau").load("ajouter.php", {"data": $("#select").val()})'/> </br>
    <input value="MODIFIER" type="button" onclick='loadModif()'/> </br>
    <input value="SUPPRIMER" type="button" onclick='loadDelete()'/> </br>
  </div>
  <div id="tableau"></div>
</div>
