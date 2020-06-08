<?php 
    $nomPage = "tableaux";
    include "includes/header.php";
?>


            <div class="row">
                <h1>TABLEAUX DU PRATICIEN</h1>
                <article class="col-md-6">

            <!-- Mettre un bandeau d'information pour demander au patient-->
            <!-- de revoir son formulaire-->
            <!--Vérification des champs en JS-->
            <!--marquee direction="left" >Revoyez votre formulaire</marquee-->
            <!--ou votre demande a été envoyé-->


            <!--img src="circles.svg" alt="points"-->
            <h3>DEMANDES DE RENDEZ-VOUS</h3>
            <!--RESTITUTION DU TABLEAU DES RDV-->
            <table>
                <!--caption>Liste des patients</caption-->
                <thead>
                    <tr>
                    <th>NOM</th>
                    <th>Prenom</th>
                    <th>Tel</th>
                    <th>Heure</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    date_default_timezone_set('America/Guadeloupe');
                    $dates=date("Y-m-d");
                    $mysqli = new mysqli('localhost', 'buttaubc_chantal', 'Bfly357T', 'buttaubc_SIMPLONG');
                    $mysqli->set_charset("utf8");
                    $requete = "SELECT * FROM qms_patient WHERE dateRdv='".$dates."' ORDER BY heureRdv";
                    $resultat = $mysqli->query($requete);
                    
                    //$resultat = $this->_DBConnect->query($requete);
                    /*while ($ligne = $resultat->fetch_assoc()) {
                        echo $ligne['nom'].' '.$ligne['prenom'].' ';
                        echo $ligne['numTel'].' '.$ligne['heureRdv'].'<br>';
                    }*/
                    

                    //While($data=mysqli_fetch_array($resultat)){
                        While ($ligne = $resultat->fetch_assoc()){
                        $tabl1[]=$ligne;
                        
                    }
                    $nbcol1=4;

                    //echo '<table>';
                    $nb1=count($tabl1);

                    $idPatient=$tabl1[0]['IDPatient'];

                    //echo $nb1;
                    for($i=0;$i<$nb1;$i++){
                        $valeur1=$tabl1[$i]['nom'];
                        $valeur2=$tabl1[$i]['prenom'];
                        $valeur3=$tabl1[$i]['numTel'];
                        $valeur4=$tabl1[$i]['heureRdv'];
                        //$valeur4=strftime ( $valeur4 [%H:%M] ) ;
                        //$valeur4=substr($valeur4,-14,5);

                        //echo $valeur4;

                        if($i%$nbcol1==0)
                        echo '<tr>';
                        echo '<td>',$valeur1,'</td>';
                        echo '<td>',$valeur2,'</td>';
                        echo '<td>',$valeur3,'</td>';
                        echo '<td>',$valeur4,'</td>';
                        //if($i%$nbcol1==($nbcol1-1))
                        echo '</tr>';
                    }
                    //echo '</table>';

                    
                    $mysqli->close();
                ?>
                </tbody>
                
            </table>
                    <br>
                <div class="form-group">
                    <input type="hidden" name="frmName" value="TICKET">
                </div>
<!--class="btn btn-default"-->
   
                  <!--button class="btn btn-primary" type="submit" id=ticket name="frmSubmit">ATTRIBUER UN TICKET</button-->
                  <!--a href="#"><img src="images/valider.jpeg"id="img">Attribuer un ticket
                </img></a-->
    </article>


    <article class="col-md-6">
                <h3>PASSAGES</h3>
                <!--RESTITUTION DU TABLEAU DES PASSAGES-->
                <table>
                    <!--caption>Liste des patients</caption-->
                    <thead>
                        <tr>
                        <th>Numero de ticket</th>
                        <th>Numero Position</th>
                        <th>NOM</th>
                        <th>Prenom</th>
                        <th>Heure</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    <?php
                    $mysqli = new mysqli('localhost', 'buttaubc_chantal', 'Bfly357T', 'buttaubc_SIMPLONG');
                    $mysqli->set_charset("utf8");
                    $requete = "SELECT * FROM qms_passages,qms_patient WHERE qms_passages.IDPatient=qms_patient.IDPatient  AND qms_passages.IDPatient='".$idPatient."' ORDER BY numPassage";
                    $resultat = $mysqli->query($requete);

                    /*while ($ligne = $resultat->fetch_assoc()) {
                        echo $ligne['numPassage'].' '.$ligne['numPosition'].' '.$ligne['nom'].' '.$ligne['prenom'].' ';
                        echo $ligne['heureRdv'].'<br>';
                    }*/
                    //While($data=mysqli_fetch_array($resultat)){
                        While ($ligne = $resultat->fetch_assoc()){
                            $tabl2[]=$ligne;
                            
                        }
                        $nbcol2=5;
    
                        //echo '<table>';
                        $nb2=count($tabl2);
                        //echo $nb1;
                        for($i=0;$i<$nb2;$i++){
                            $valeur1=$tabl2[$i]['numPassage'];
                            $valeur2=$tabl2[$i]['numPosition'];
                            $valeur3=$tabl2[$i]['nom'];
                            $valeur4=$tabl2[$i]['prenom'];
                            $valeur5=$tabl2[$i]['heureRdv'];
    
                            if($i%$nbcol2==0)
                            echo '<tr>';
                            echo '<td>',$valeur1,'</td>';
                            echo '<td>',$valeur2,'</td>';
                            echo '<td>',$valeur3,'</td>';
                            echo '<td>',$valeur4,'</td>';
                            echo '<td>',$valeur5,'</td>';
                            //if($i%$nbcol1==($nbcol1-1))
                            echo '</tr>';
                        }
                        //echo '</table>';
                    $mysqli->close();
                ?>
                    </tbody>
                </table>
                <br>
                <div class="form-group">
                    <input type="hidden" name="frmName" value="SUIVANT">
                </div>
                <button class="btn btn-primary" type="submit" id=suivant name="frmSubmit">PATIENT SUIVANT</button>
                <!--a href="#"><img src="images/valider.jpeg"id="img">Patient suivant</img></a-->
        </article>
            </div>


        <?php 
        include "includes/footer.php";
    ?>