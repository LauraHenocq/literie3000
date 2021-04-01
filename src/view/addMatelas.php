<?php
class AddMatelasView {
    public function __construct(AddMatelasController $controller) {
        $this->controller = $controller;
        $this->template = DIR_TEMPLATE . "addMatelas.php";
    }

    public function render() {
        require($this->template);
    }
}
?>