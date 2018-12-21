<h1 style="text-decoration: underline;">Formulaire</h1>
<form id="form" style="float: left;">
  <center>
    <label for="nom">Nom</label><br>
    <input class="a_inpt" id="nom" type="text" name="nom"
    pattern="[A-Za-z]*" title="Mettre que des lettres"></br></br>
    <label for="prenom">Prénom</label><br>
    <input class="a_inpt" id="prenom" type="text" name="prenom"
    pattern="[A-Za-z]*" title="Mettre que des lettres"></br></br>
    <input type="hidden" name="data" value="">
    <button type="submit" value="Submit">Valider</button><br>
    <span id="msg_all"></span>
  </center>
</form>
