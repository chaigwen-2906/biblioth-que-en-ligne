<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- je n'index pas cette pas là  -->
        <meta name="robots" content="noindex">
        <meta name="title" content="Notre bibliothèque en ligne">

        <!-- Appel des feuilles de style --/ Calling style sheets-->
        <link rel="stylesheet" href="app/public/css/admin/ajout.css">
 
        <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
        <link rel="icon" href="app/public/image/logo-flavicon/flavicon.jpg" />

    </head>

    <body>
        <main class="ajoutLivre">
            <!--BOUTON RETOUR  -->
            <figure class="retour">
                <a href="./admin-listeLivres">
                    <img src="app/public/image/bouton/retour.png" alt=" Retour" title=" Retour">
                    <p>
                    Retour
                    </p>
                    <!-- Retour  -->
                </a>
            </figure>
            <!-- FIN BOUTON RETOUR  -->

            <h1>
                Ajouter un livre
            </h1>
            <form enctype="multipart/form-data" method="POST" action="./admin-<?= $this->nomPage;?>?action2=ajoutLivre">

                <!-- CATEGORIES  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="selectCategorie">Catégorie :</label>
                    <select class=conteneurInputAjout id="selectCategorie" name="selectCategorie">
                            <option value="">
                                Catégorie...
                            </option>
                            <?php
                                foreach($listCategorie AS $uneCategorie)
                                {
                                    echo "<option value='".$uneCategorie['idCategorie']."'>".$uneCategorie['nomCategorie']."</option>";
                                }
                            ?>
                    </select>
                </section>

                <!-- AUTEURS -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="selectAuteurs">Auteurs :</label>
                    <select class=conteneurInputAjout id="selectAuteurs" name="selectAuteurs">
                            <option value="">
                                Nom et prénom...
                            </option>
                            <?php
                                foreach($listAuteurs AS $unAuteur)
                                {
                                    echo "<option value='".$unAuteur['idAuteur']."'>".$unAuteur['nomAuteur']." ".$unAuteur['prenomAuteur']."</option>";
                                }
                            ?>
                    </select>
                </section>

                <!-- EDITERS  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="selectEditeurs">Editeurs :</label>
                    <select class=conteneurInputAjout id="selectEditeurs" name="selectEditeurs">
                            <option value="">
                                Code et nom d'éditeurs...
                            </option>
                            <?php
                                foreach($listEditeurs AS $unEditeurs)
                                {
                                    echo "<option value='".$unEditeurs['idEditeur']."'>".$unEditeurs['code']." -> ".$unEditeurs['nom']."</option>";
                                }
                            ?>
                    </select>
                </section>

                <!-- NOM  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="nom"> Nom du livre :</label>
                    <input class=conteneurInputAjout type="text" name="nom" placeholder="Nom du livre" required>             
                </section>

                <!-- IMAGE  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="image"> Image du livre :</label>
                    <input class=conteneurInputAjout type="file" name="image">             
                </section>

                <!-- DATE DE PUBLICATION  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="date"> Date de publications du livre :</label>
                    <input class=conteneurInputAjout type="date" name="date" placeholder=" Date de publications du livre">             
                </section>

                <!-- DESCRIPTION  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="description">Descriptions du livre :</label>
                    <textarea class=conteneurInputAjout name="description" placeholder="Entrer votre description"></textarea>            
                </section>

                <!-- DISPONIBLE  -->
                <section class="conteneurSection">
                <label class="conteneurLabel" for="selectDispo">Livre disponible :</label>
                    <select class=conteneurInputAjout id="selectDispo" name="selectDispo" placeholder="Livre disponible">
                            <option value="oui">oui</option>
                            <option value="non">non</option>
                    </select>            
                </section>

                <!-- NB DE PAGE  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="nbPage"> Nombre de pages du livre :</label>
                    <input class=conteneurInputAjout type="number" name="nbPage" placeholder="Nombre de pages du livre ">             
                </section>

                <!-- DIMENSION  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="dimension"> Dimension du livre :</label>
                    <input class=conteneurInputAjout type="text" name="dimension" placeholder="21,5 cm × 29,2 cm × 1,2 cm">             
                </section>

                <!-- LANGUE  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="langue"> Langue du livre :</label>
                    <input class=conteneurInputAjout type="text" name="langue" placeholder="Langue du livre">             
                </section>

                <!-- ISBN  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="isbn"> isbn du livre :</label>
                    <input class=conteneurInputAjout type="text" name="isbn" placeholder="isbn du livre">             
                </section>

                <!-- EAN  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="ean"> Ean du livre :</label>
                    <input class=conteneurInputAjout type="text" name="ean" placeholder="Ean du livre">             
                </section>

                <!-- BOUTON VALIDER  -->
                <section>
                    <input class="boutonValiderAjoutLivre" id="btnValideAjoutLivre"  type="submit" value="Valider">
                </section>
                
            </form>    
        </main>
        <footer>
            <p>
                &copy; La bibliothèque en ligne 2020. Développeur web: Lemoine Gwénola
            </p>
        </footer>
    </body>
    
</html>