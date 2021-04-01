<?php 
class AddMatelasController {
    //mettre la propriété model en privé empêche l'utilisation en direct sur l'instance de la classe HomeController des propriétés et méthodes du model
    private $model;

    public function __construct(AddMatelasModel $model) {
        $this->model = $model;
    }
}
?>