<?php
require_once("header.php");
?>

<main>
    <section class="deleteItem">
    <div class="row">
    <?php
    foreach($matelas as $matela) {
    ?>
        <div class="col">
            <img src="<?= $matela["poster"] ?>" alt="">
            <h2>
                <a href="recipe.php?id=<?= $recipe["id"]?>"><?= $matela["nom"] ?></a>
            </h2>
            <p>Marque : <?= $matela["marque"] ?></p>
            <p>Prix : <?= $matela["prix"] - ($matela["prix"] * $matela["promotion"] / 100) ?> €</p>
            <span class="btn btn-secondary"><a href="index.php?page=deleteMatelas&id=<?= $matela["id"] ?>">Supprimer le matelas</span>
        </div>
    <?php
    }
    ?>
    </div>
    </section>

</main>

<?php
require_once("footer.php");
?>