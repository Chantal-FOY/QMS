<?php 
    $nomPage = "connexion";
    include "includes/header.php";
?>




            <!-- Mettre un bandeau d'information pour demander le praticien-->
            <!-- revoir son formulaire-->
            <!--marquee direction="left" >Veuillez-vous rapprocher de votre centre.</marquee-->
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="col text-center">

            <h1>CONNEXION</h1>

            <form method="POST" action="validation.php" id="frmCONN">
               
                <div class="form-group">
                    <label for="email">Email : <span class="info"> (*)</span> </label>
                    <input type="email" class="form-control" id="email" placeholder="nom@domaine.tld" name="email" value=""  required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe :<span class="info">(*)</span> </label>
                    <input type="password" class="form-control" id="pwd" placeholder="MnYx2435@" name="pwd" value=""  required minlength="8" maxlength="12">
                    <button type="button" onclick="alterner()" id="eye">
                        <img src="images/eye.png" alt="eye" id="imgEye"/></button>
                    <small id="" class="form-text text-muted">Mot de passe entre 8 et 12 caractères</small>
                </div>
                
            
                <div class="form-group">
                      <input type="hidden" name="frmName" value="CONN">
            </div> 
            
            <div class="form-group">
            <a href="nouveau-password.php">Demander nouveau mot de passe.</a>
            
            <button type="submit" class="btn btn-primary" name="frmSubmit" >Connexion</button>
            <!--a href="tableaux.html"><img src="images/valider.jpeg" id="img"></img></a-->
                  
                </form>

   
</div>
</div>

        
    </div>

<?php 
    include "includes/footer.php";
?>