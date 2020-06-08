<?php 
    $_SESSION['prenom']." " .$_SESSION['nom'];
    $nomPage="inscription";
    include "includes/header.php";
?>

                    <h1>Prise de rendez vous</h1>
                    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="col text-center">
      
                <form method="POST" action="validation.php" id="frmINSC">


                <div class="form-group">
                    <label for="nom">nom : <span class="info">(*)</span></label>
                    <input type="text" class="form-control" id="nom" placeholder="nom" name="nom" value="" required>
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom : <span class="info">(*)</span></label>
                    <input type="text" class="form-control" id="prenom" placeholder="Prénom" name="prenom" value="" required>
                </div>

                <div class="form-group">
                    <label for="téléphone">tel:<span class="info"> (*)</span> </label>
                    <input type="tel" name="numTel" class="form-control" id="tel" placeholder="0690924409" value="" required>

                </div>
               
                <div class="form-group">
                    <label for="email">Email : <span class="info"> (*)</span> </label>
                    <input type="email" class="form-control" id="email" placeholder="nom@domaine.tld" name="email" value=""  required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe :<span class="info">(*)</span> </label>
                    <input type="password" class="form-control" id="pwd" placeholder="MnYx2435@" name="pwd" value=""  required minlength="8" maxlength="12">
                    <button type="button" class="btn btn-default" onclick="alterner()" id="eye">
                        <img src="images/eye.png" alt="eye" id="imgEye"/></button>
                       
                    <small id="" class="form-text text-muted">Mot de passe entre 8 et 12 caractères</small>
                </div>
                <div class="form-group">
                    <label for="selection">heure </label>

                    <select id="selection" class="form-control" name="heureRdv" multiple>
                       
                    <option value="08:00" >08h00</option>
                    <option value="09:00" >09h00</option>
                    <option value="10:00" >10h00</option>
                    <option value="11:00" >11h00</option>
                    <option value="12:00" >12h00</option> 

                    <option value="14:00" >14h00</option>
                    <option value="15:00" >15h00</option>
                    <option value="16:00" >16h00</option>
                    <option value="17:00" >17h00</option>
                    </select>
                </div>
                <!--p><input type=button name=B_remove_items value="Efface la sélection" onClick="remove_selected_item(myform.heureRdv)" -->
</select>
<!--p><input type=hidden name=list_items value=";">
<input type=button name=B_ok value="Donne les options restantes" onClick="enum_listbox_items(myform.heureRdv, list_items);alert(list_items.value)"-->

                <div class="form-group">
                    <input type="hidden" name="frmName" value="INSC">
                </div>
<!--class="btn btn-default"-->
    <button type="submit" class="btn btn-primary" name=B_remove_items size="30" onClick="remove_selected_item(myform.heureRdv)">Inscription</button>
</form>
</div>
</div>

        
    </div>

<?php 
    include "includes/footer.php";
?>