<?php 
    $nomPage="accueil";
    include "includes/header.php";

    $request=$_GET['r'];
    if($request=="praticien")
    {
        //page(_blank);
        include_once('../QMS/connexion_praticien.php');
        //header("Location:https://butterfly.yj.fr/QMS/connexion_praticien.php");
    } 
?>



    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="col text-center">
    <!--div class="d-flex justify-content-center"-->
    
    <h1>ACCUEIL - QMS<h1>


<button type="button" class="btn btn-primary" name="frmSubmit"><a href="inscription.php" >Inscription</a></button>

<button type="button" class="btn btn-primary" name="frmSubmit"><a href="connexion.php">Connexion</a></button>

<br>
<br>


    <img src="images/coronavirus-gestes-barrieres.jpg" alt="covid19 précautions" width="90%">
    
    

</div>    

</div>


<?php 
    include "includes/footer.php";
?>