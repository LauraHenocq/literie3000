<?php 
class DeleteMatelasController {
    //mettre la propriété model en privé empêche l'utilisation en direct sur l'instance de la classe HomeController des propriétés et méthodes du model
    private $model;

    public function __construct(DeleteMatelasModel $model) {
        $this->model = $model;
    }

    public function showItems() {
        // Insertion du matelas en base de données
        $query = $this->model->db->query("SELECT * FROM matelas");
        $matelas = $query->fetchAll();
        return $matelas;
    }

    public function deleteItem() {
        $message = "";
        // Suppression du matelas en base de données
        if (!empty($_GET["id"])) {
            $id = trim(strip_tags($_GET["id"]));
            $query = $this->model->db->prepare("DELETE FROM matelas WHERE id = :id");
            $query->bindParam(":id", $id, PDO::PARAM_INT);
            if ($query->execute()) {
                header("Location: index.php");
            } else {
                $message = "<span class=\"info-error\">Il y a eu un problème lors de la requête</span>";
            }
        }
        return $message;
    }

}
