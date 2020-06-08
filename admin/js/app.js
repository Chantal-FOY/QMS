/*const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('nav-links');
const links= document.querySelectorAll(".nav-links li");

hamburger.addEventListener("click", ()=>{
    navLinks.classList.toggle("open");
    links.forEach(link=>{
        links.ClassList.toggle("fade");
    })
});*/

// Si la duree passe à 15 minutes
//var x=setTimeout(marquee,900000);
//document.write(parseInt(document.getElementById('duree').value));

if(parseInt(document.getElementById('duree').value) <=15){
                    document.write("<marquee> Veuillez vous rapprocher de votre praticien</marquee>");
        }

/*if(document.getElementById("selection").value="Patient"){
            document.getElementById("organisme").classList.add('hidden');
}
if(document.getElementById("selection").value="Praticien"){
            document.getElementById("organisme").classList.remove('hidden');
}*/

// Si suppression du RDV
document.getElementById("confirm").onclick= function confirmer(){
    if ( confirm( "Etes-vous sûr de vouloir supprimer ?" ) ) {
        // Code à éxécuter si le l'utilisateur clique sur "OK"
        //supprimer l'enregistrement dans la base
    } else {
        // Code à éxécuter si l'utilisateur clique sur "Annuler" 
        // retour à la page du ticket numérique
    }
}

//Si modification du RDV
document.getElementById("modif").onclick= function modifier(){
    //supprimer l'enregistrement dans la base
    // appeler la page de demande de RDV
}

//pour obtenir la date courante

var auj=new Date();
document.getElementById("date").value= function courante(auj){
    return auj.getDate()+"/"+(auj.getMonth()+1)+"/"+auj.getFullYear();
}

// pour montrer cacher le contenu du champ mot de passe

 var permute = 0;

 function montrer()
{
var p = document.getElementById('pwd');
p.setAttribute('type','text');  
}

function cacher()
{
var p = document.getElementById('pwd');
p.setAttribute('type','password');   
}

function alterner()
{
    
    document.getElementById("eye").addEventListener("click", function() {
        
    if (permute == 0) 
        {
        permute = 1; 
        montrer();
        } 
    else {
        permute = 0;
        cacher();
        }
    }, false);
}

//controle email
/*document.getElementById("email").onmouseout=function ValiderEmail(email) 
{
    document.write("DANS ValiderEmail");
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.emailAddr.value))
  {
    return (true)
  }
    alert("Vous avez saisi une mauvaise adresse !")
    return (false)
} */

//validation formulaire inscription
jQuery(document).ready(function(){

    // champs prénom
    $("#prenom").blur(function(){
       // liste des actions
    /*
        - is-invalid => champs vide,
        - is-invalid => champs pas vide,
      */
     if( $(this).val() == ""){
         // 
        $("#prenom").addClass("is-invalid");
     }else{
           //
     $(this).removeClass("is-invalid").addClass("is-valid");

    }
});


    //champs mot de passe
    $("#password").blur(function(){
        // liste des actions
    /*
        - is-invalid => champs vide,
        - is-invalid => champs pas vide,
      */
     if( $(this).val() != $("#password").value){
        // 
       $("#password").addClass("is-invalid");
    }else{
          //
    $(this).removeClass("is-invalid").addClass("is-valid");

        }

    });

});


/**************************************** */
/*si l'heure sélectionnée ->la désactiver */
/******************************************/
function remove_selected_item(l1) {
    do {
       flag_delete = false;
       for (var i = 0; i < l1.options.length; i++) {
          if (l1.options[i].selected == true) {
             l1.options[i] = null;
             flag_delete = true;
          }
       }
    } while (flag_delete == true)
    return true;
 }
  
 function enum_listbox_items(l1, list_options) {
    list_options.value = "";
    for (var i = 0; i < l1.options.length; i++) {
       list_options.value = list_options.value + l1.options[i].value + ";";
    }
    return true;
 }



/**************************************************** */
//Au declenchement du bouton PATIENT SUIVANT         **/
/**************************************************** */
// ENLEVER LE PREMIER PATIENT du tableau


//Mettre les positions à jour


function RedirectionTableaux(){
    document.location.href="https://butterfly.yj.fr/QMS/admin/tableaux.php";
  }

function RedirectionInscription(){
    document.location.href="https://butterfly.yj.fr/QMS/admin/inscription.php";
  }


