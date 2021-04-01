<?php
require_once("header.php");
?>
<main>

    <section class="welcome">
        <h1>Bienvenue sur l'interface administrateur de votre magasin Literie 3000 !</h1>
        <h3>Gérez les références de votre boutique en quelques clics.</h2>
    </section>
    <section class="chooseAction">
        <div class="row">
            <div class="col">
                <p><a href="index.php?page=addMatelas">Ajouter un matelas</a><p>
            </div>
            <div class="col">
                <p><a href="">Modifier un matelas existant</a><p>
            </div>
            <div class="col">
                <p><a href="">Supprimer un matelas</a><p>
            </div>
        </div>
    </section>

</main>

<?php 
require_once("footer.php");
?>