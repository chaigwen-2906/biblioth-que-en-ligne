//Chargement de la page
$(document).ready( function() {

    //Jquery : on détecte la saisie dans le champs champRecherche
    $('#champRecherche').on('keyup', function(){
        //On récupère la valeur saisie
        $champ = $(this);
        let valeur = $champ.val();
        
        //On récupère la liste des section qui ont la classe detail
        let tabSection = $('.detail');

        for (var i = 0; i < tabSection.length; i++) {
            
            //On récupère les enfants de la section
            let enfantsSection = tabSection[i].childNodes;

            //on test si la valeur recherché est contenu dans le nom du livre
            let p = enfantsSection[1];
            //on récupère le contenu du p
            let valeurP = p.firstChild.textContent.toLowerCase();
            let test = valeurP.indexOf(valeur);
            if(test == -1)
            {
                //la chaine n'est pas trouvé
                tabSection[i].style.display = "none";
            }
            else{
                //La chaine est trouvé
                tabSection[i].style.display = "flex";
            }
        }
            
      });


});