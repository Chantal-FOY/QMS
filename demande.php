<?php 
    $nomPage = "demande";
    include "includes/header.php";
?>



            <!-- Mettre un bandeau d'information pour demander au patient-->
            <!-- de revoir son formulaire-->
            <!--Vérification des champs en JS-->
            <!--marquee direction="left" >Revoyez votre formulaire</marquee-->
            <!--ou votre demande a été envoyé-->


            <h1>DEMANDE DE RENDEZ-VOUS</h1>

            <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8">
    <div class="col text-center">

            <form method="POST" action="validation.php" id="frmDEMAND">
                <fieldset>
                    <legend>PATIENT </legend>
                    <div class="form-group">
                      <label for="nom">Nom</label>
                      <input type="text" class="form-control" style="text-align:center;" id="nom" name="nomPatient" placeholder="MARTIN">
                    </div>
                    <div class="form-group">
                      <label for="prenom">Prenom</label>
                      <input type="text" class="form-control" style="text-align:center;" id="prenom" name="prenomPatient" placeholder="Frédéric">
                    </div>
                    <div class="form-group">
                        <label for="numTel">Numéro de téléphone</label>
                        <input type="text" class="form-control" style="text-align:center;" minlenght="10" maxlenght="14" id="numTel" name="numTel" placeholder="0601010101" pattern="[0-9]{10}" required>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend>PROPOSITION </legend>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" style="text-align:center;" id="date" name="dateRDV">
                      </div>
                      <div class="form-group">
                        <label for="heure">Heure</label>
                        <input type="time" class="form-control" style="text-align:center;" id="heure" name="heureRDV" min="09:00" max="18:00" placeholder="10:00" required>
                      </div>
                  </fieldset>
                  <div class="form-group">
                      <input type="hidden" name="frmName" value="DEMAND">
            </div> 
                  <br>
                  <button type="submit" class="btn btn-primary" name="frmSubmit">VALIDER</button>
                  <!--a href="#"><img src="images/valider.jpeg" id="img"></img></a-->
                </form>

</div>
</div>
</div>

    <?php 
        include "includes/footer.php";
    ?>