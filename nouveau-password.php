<?php 
     $nomPage="nouveau mot de passe";
    include "includes/header.php";
?>

    <div class="container">
    <form method="POST" action="validation.php" id="frmPASS">

    <div class="form-group">
        <label for="email">Email : <span class="info">(*)</span></label>
        <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="" required>
    </div>

    <div class="form-group">
        <input type="hidden" name="frmName" value="PASS">
    </div>
    

    <button type="submit" class="btn btn-primary" name="frmSubmit">Nouveau mot de passe</button>
    </form>
        
    </div>
    <script src='js/app.js'></script>
<?php 
    include "includes/footer.php";
?>