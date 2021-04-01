<?php 
class DeleteMatelasController {
    //mettre la propriété model en privé empêche l'utilisation en direct sur l'instance de la classe HomeController des propriétés et méthodes du model
    private $model;

    public function __construct(DeleteMatelasModel $model) {
        $this->model = $model;
    }

}