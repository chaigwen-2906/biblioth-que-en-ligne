<footer>
        
    <div class="contenuFooter">
            <figure class="figureBgFooter">
            <img src="./../app/public/image/imgFond/bookFooter2.png" alt="livre" title ="livre">
        </figure> 


        <!-----------Adresse de la boutique, Shop address------------>
        <div class="adresse">              
            <address>
                <h3>
                    Contactez-nous
                </h3>
                <div>
                    <img class="iconAdresse" alt="Adresse" title="Adresse" src="./../app/public/image/icon/adress.png"><span>45 rue du pleuple 56690 Landaul</span><br>
                    <img class="iconAdresse" alt="Adresse Mail" title="Adresse Mail"  src="./../app/public/image/icon/mail.png" ><a href="mailto:chaigwen@hotmail.fr">chaigwen@hotmail.fr</a> <br>
                    <img class="iconAdresse" alt="Téléphone" title="Téléphone"  src="./../app/public/image/icon/telephone.png" ><a href="tel: 06 19 43 32 49">tel: 06 19 43 32 49 </a> <br>
                    <img class="iconAdresse cacherLocalisation" alt="Map" title="Map"  src="./../app/public/image/icon/localisation1.png"><a class="cacherLocalisation" href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2687.920197716522!2d-2.7750422843781455!3d47.647117579187444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48101c1e45bf9d89%3A0xf1b4ec0fcc4d768d!2s20%20Rue%20Winston%20Churchill%2C%2056000%20Vannes!5e0!3m2!1sfr!2sfr!4v1573737460679!5m2!1sfr!2sfr" target="_blank"><strong>Map</strong></a>
                </div>
            </address>
            <iframe class="footerMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2687.920197716522!2d-2.7750422843781455!3d47.647117579187444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48101c1e45bf9d89%3A0xf1b4ec0fcc4d768d!2s20%20Rue%20Winston%20Churchill%2C%2056000%20Vannes!5e0!3m2!1sfr!2sfr!4v1573737460679!5m2!1sfr!2sfr" 
                width="300" height="175" frameborder="0" style="border:0;" allowfullscreen="">
            </iframe>
        </div>


        <!----------lien réseaux sociaux, social media link-------------->
        <div class="ulReseauxFooter ">
            <h3 class="cacherReseaux">
                Réseaux sociaux
            </h3>
            <ul>
                <li><a href="https://www.facebook.com/" target="_blank"><img src="./../app/public/image/reseaux/Facebookgd.png"
                            alt="Facebook" title="Facebook"></a></li>

                <li><a href="https://www.YouTube.com/" target="_blank"><img src="./../app/public/image/reseaux/YouTube.png"
                            alt="YouTube" title="YouTube"></a></li>
            </ul>
            <ul>
                <li><a href="https://www.Linkedin.com/" target="_blank"><img src="./../app/public/image/reseaux/Linkedin.png"
                            alt="Linkedin" title="Linkedin"> </a></li>

                <li><a href="https://twitter.com/accueil?lang=fr" target="_blank"><img src="./../app/public/image/reseaux/Twittergd.png"
                            alt="Twitter" title="Twitter"> </a></li>
            </ul>
        </div>
        

        <!---------toutes les mentions obligatoire d"un site, all obligatory mentions of a site-->
        <div class="mentionFooter">
            <div>
                <h3>
                    Allez plus loin
                </h3>
                <div><img class="iconMentions" alt="Mentions Légales" title="Mentions Légales"  src="./../app/public/image/icon/puce.png"><a href="./mentionsLegales"><span>Mentions Légales</span></a></div>
                <div><img class="iconMentions" alt="Conditions Générales" title="Conditions Générales"  src="./../app/public/image/icon/puce.png"><a href="./conditionsGenerales"><span>Conditions générales</span></a></div>
                <div><img class="iconMentions" alt="Règlement général sur la protection des données" title="Règlement général sur la protection des données"  src="./../app/public/image/icon/puce.png"><a href="./rgpd"><span>RGPD</span></a></div>
                <div><img class="iconMentions" alt="Plan du site" title="Plan du site" src="./../app/public/image/icon/puce.png"><a href="./planDuSite"><span>Plan du site</span></a></div>
            </div>
        </div>


        <div  class="copyFooter">
            <p>
                &copy; La bibliothèque en ligne 2020  Développeur web: Lemoine Gwénola
            </p>
        </div>
    </div>
</footer>


<!---------------------- jQuery ---------------------------------->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!---------- Appel du javascript  / Call of javascript------------>
<script type="text/javascript" src="./../app/public/js/allJavaScriptMin.js"></script>

<!-- Ouverture de la boite modal en cas d'échec du formulaire de création de compte -->
<?php
if($this->erreurCreationCompte == true)
{
    //on ouvre la boite modal creer votre compte 
    echo "<script>$('#modalCreerCompte').show('slow');</script>";
}
?>

<!-- Ouverture de la boite modal en cas d'échec du formulaire de connexion -->
<?php
if($this->erreurConnexionCompte == true)
{
    //on ouvre la boite modal creer votre compte 
    echo "<script>$('#modalConnection').show('slow');</script>";
}
?>
