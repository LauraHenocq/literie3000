<?php
require_once("header.php");
?>
<main>
    <section id="addItem">
        <h1>Ajouter une référence (matelas) à votre base de données</h1>
        
        <form action="" method="post">
            <?= $message ?>
            <div class="form-group">
                <label for="inputName">Nom du modèle</label>
                <input type="text" name="name" id="inputName" placeholder="Nom du modèle" value="<?= isset($name) ? $name : "" ?>"/>
                <?php
                if (!empty($errors["name"])) {
                    echo "<span class=\"info-error\">{$errors["name"]}</span>";
                }
                ?>
            </div>
            <div class="form-group">
                <label for="inputMark">Marque du modèle</label>
                <input type="text" name="mark" id="inputMark" placeholder="Marque du modèle" value="<?= isset($mark) ? $mark : "" ?>"/>
                <?php
                if (!empty($errors["mark"])) {
                    echo "<span class=\"info-error\">{$errors["mark"]}</span>";
                }
                ?>
            </div>
            <div class="form-group">
                <label for="inputPoster">URL de la photo du modèle</label>
                <input type="text" name="poster" id="inputPoster" placeholder="URL de la photo du modèle" value="<?= isset($poster) ? $poster : "" ?>"/>
                <?php
                if (!empty($errors["poster"])) {
                    echo "<span class=\"info-error\">{$errors["poster"]}</span>";
                }
                ?>
            </div>
            <div class="form-group">
                <label for="selectDimensions">Choississez la ou les dimension(s) disponible(s) pour ce modèle (maintenir la touche ctrl ou cmd enfoncée si plusieurs choix) :</label>
                <select name="dimensions[]" id="selectDimensions" multiple>
                    <option <?= (isset($dimensions) && $dimensions === "90x190") ? "selected" : "" ?> value="1">90x190</option>
                    <option <?= (isset($dimensions) && $dimensions === "140x190") ? "selected" : "" ?> value="2">140x190</option>
                    <option <?= (isset($dimensions) && $dimensions === "160x200") ? "selected" : "" ?> value="3">160x200</option>
                    <option <?= (isset($dimensions) && $dimensions === "180x200") ? "selected" : "" ?> value="4">180x200</option>
                    <option <?= (isset($dimensions) && $dimensions === "200x200") ? "selected" : "" ?> value="5">200x200</option>
                </select>
                <?php
                if (!empty($errors["poster"])) {
                    echo "<span class=\"info-error\">{$errors["dimensions"]}</span>";
                }
                ?>
            </div>
            <div class="form-group">
                <label for="inputPrix">Prix du modèle (en €)</label>
                <input type="number" name="prix" id="inputPrix" placeholder="Prix du modèle en euros" value="<?= isset($prix) ? $prix : "" ?>" />
                <?php
                if (!empty($errors["prix"])) {
                    echo "<span class=\"info-error\">{$errors["prix"]}</span>";
                }
                ?>
            </div>
            <div class="form-group">
                <label for="inputPromotion">Promotion appliquée (% de réduction à déduire)</label>
                <input type="number" name="promotion" id="inputPromotion" placeholder="Pourcentage à déduire" value="<?= isset($promotion) ? $promotion : "" ?>"/>
                <?php
                if (!empty($errors["promotion"])) {
                    echo "<span class=\"info-error\">{$errors["promotion"]}</span>";
                }
                ?>
            </div>
            <!-- Ajouter un champ pour sélectionner les dimensions du matelas -->
            <input class="btn btn-secondary" type="submit" value="Ajouter le matelas" />
        </form>

    </section>

</main>

<?php
require_once("footer.php");
?>