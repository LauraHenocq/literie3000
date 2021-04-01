<?php
class DeleteMatelasView {
    public function __construct(DeleteMatelasController $controller) {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "deleteMatelas.php";
    }

    public function render() {
        $matelas = $this->controller->showItems();
        $message = $this->controller->deleteItem();
        require($this->template);
    }
}
?>