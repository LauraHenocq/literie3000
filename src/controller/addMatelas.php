<?php 
class AddMatelasController {
    //mettre la propriété model en privé empêche l'utilisation en direct sur l'instance de la classe HomeController des propriétés et méthodes du model
    private $model;

    public function __construct(AddMatelasModel $model) {
        $this->model = $model;
    }

    public function addItem() {
        $message = "";
        if (!empty($_POST)) {
            require_once '../config/index.php';

            $errors = [];
        
            $name = trim(strip_tags($_POST['name']));
            $mark = trim(strip_tags($_POST['mark']));
            $poster = trim(strip_tags($_POST['poster']));
            $prix = trim(strip_tags($_POST['prix']));
            $promotion = trim(strip_tags($_POST['promotion']));

            // GERER ICI LES ERREURS POSSIBLES SUR name, mark, poster, prix et promotion !!!!!!!!!!!!
            // Validation du nom du modèle
            if (empty($name)) {
                $errors["name"] = "Le nom du modèle doit être renseigné.";
            }

            // Validation du nom de la marque du modèle
            if (empty($mark)) {
                $errors["mark"] = "Le nom de la marque du modèle doit être renseigné.";
            }

            // Validation de l'url de l'image du modèle
            if(!filter_var($poster, FILTER_VALIDATE_URL)) {
                // pas valide
                $errors["poster"] = "L'url de l'image n'est pas valide.";
            }

            if (empty($prix)) {
                $errors["prix"] = "Le prix du modèle doit être renseigné.";
            }

            // if (empty($dimensions)) {
            //     $errors["dimensions"] = "La ou les dimensions disponibles pour ce modèle doit/doivent être indiquée(s).";
            // }
        
            if (empty($errors)) {
        
                // Insertion du matelas en base de données
                $query = $this->model->db->prepare("INSERT INTO matelas (nom, marque, poster, prix, promotion) VALUES (:name, :mark, :poster, :prix, :promotion)");
                $query->bindParam(":name", $name);
                $query->bindParam(":mark", $mark);
                $query->bindParam(":poster", $poster);
                $query->bindParam(":prix", $prix, PDO::PARAM_INT);
                $query->bindParam(":promotion", $promotion, PDO::PARAM_INT);
        
                if ($query->execute()) {
                    $query = $this->model->db->query("SELECT id from matelas ORDER BY id DESC LIMIT 1");
                    $query->execute();
                    $res = $query->fetch();
                    $matela_id = $res["id"];
                    echo $matela_id;
                    foreach($_POST['dimensions'] as $valeur) {
                        $query = $this->model->db->prepare("INSERT INTO dimensions_matelas (dimension_id, matela_id) VALUES(:dimension_id, :matela_id)");
                        $query->bindParam(":dimension_id", $valeur);
                        $query->bindParam(":matela_id", $matela_id);
                        $query->execute();
                    }
                    header("Location: index.php");
                } else {
                    $message = "Erreur de bdd";
                }
            } else {
                // Message d'erreur
                $message = "<span class=\"info-error\">Certains champs ne sont pas renseignés ou comportent des erreurs !</span>";
            }
        }
        return $message;
    }
}
?>