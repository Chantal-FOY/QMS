<?php 
    $_SESSION['prenom']." " .$_SESSION['nom'];
    $nomPage="inscription";
    include "includes/header.php";
?>

                    <h1>Prise de rendez vous</h1>
                    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8">
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
                    <input type="hidden" name="frmName" value="INSC">
                </div>
<!--class="btn btn-default"-->
    <button type="submit" class="btn btn-primary" name="frmSubmit" size="30">Inscription</button>
</form>
</div>
</div>

        
    </div>

<?php 
    include "includes/footer.php";
?>