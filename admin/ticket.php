<?php 
    $nomPage = "ticket";
    include "includes/header.php";
?>



            <!-- Mettre un bandeau d'information pour demander au patient-->
            <!-- de se rapprocher de l'organisme-->
            <!--marquee direction="left" >Veuillez-vous rapprocher de votre centre.</marquee-->

    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="col text-center">
            <h1>TICKET NUMERIQUE</h1>
            <form>
                <fieldset>
                    <legend>ORGANISME </legend>
                    <div class="form-group">
                      <label for="nom">Nom de l'organisme</label>
                      <input type="text" class="form-control" style="text-align:center;" id="nom" placeholder="DR MARTIN" disabled>
                    </div>
                    <div class="form-group">
                      <label for="adresse">Coordonnées</label>
                      <input type="text" class="form-control" style="text-align:center;" id="adresse" placeholder="3 Boulevard des cocotiers" disabled>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend>ATTENTE </legend>
                    <div class="form-group">
                        <label for="billet">Ticket</label>
                        <input type="text" class="form-control" style="text-align:center;" id="billet" placeholder="A120" disabled>
                      </div>
                      <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" style="text-align:center;" id="position" placeholder="5" disabled>
                      </div>
                      <div class="form-group">
                        <label for="duree">Durée estimée</label>
                        <input type="time" class="form-control" style="text-align:center;" id="duree" placeholder="01:20" value="16:00" disabled>
                      </div>
                  </fieldset>
                  <br>
                  <!--button class="btn btn-primary" type="submit"></button-->
                  <!--a href="#" id="confirm"><img src="images/supprimer.jpeg" id="img"></img></a-->
                  <!--button class="btn btn-primary" type="submit"></button-->
                  <!--a href="demande.html" id="modif"><img src="images/modifier.jpeg" id="img"></img></a-->
                </form>
</div>
</div>
</div>
        <?php 
        include "includes/footer.php";
    ?>