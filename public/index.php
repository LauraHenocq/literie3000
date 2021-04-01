<?php
// On cherche à développer une page index.php qui nous permet de générer n'importe quelle page du site. 
// Pour cela on test la présence d'un paramètre get s'appelant page
// Si le paramètre n'est pas présent, on génère la page d'acceuil par défaut. 
$page = "home";
if(!empty($_GET["page"])) {
    $page = $_GET["page"];
}

// On importe les chemins (dossier des templates, ...) et les données de la base de données
require("../config/index.php");
require_once("../config/db.php");

//Connexion à la base de donnée literie3000 à partir des constantes du fichier index.php du dossier de config
$dsn = "mysql:host=".DB_HOSTNAME.";dbname=".DB_DATABASE.";port=".DB_PORT;
$db = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
//$db = new DB(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

// Tableau qui contient pour chaque page les noms du Model, du Controller et de la View
$data = array(
    "home" => array(
        "model" => "HomeModel",
        "view" => "HomeView",
        "controller" => "HomeController"
    ),
    "addMatelas" => array(
        "model" => "AddMatelasModel",
        "view" => "AddMatelasView",
        "controller" => "AddMatelasController"
    ),
    "editMatelas" => array(
        "model" => "EditMatelasModel",
        "view" => "EditMatelasView",
        "controller" => "EditMatelasController"
    ),
    "deleteMatelas" => array(
        "model" => "DeleteMatelasModel",
        "view" => "DeleteMatelasView",
        "controller" => "DeleteMatelasController"
    )
);


// On parcourt le tableau pour retrouver les classes associées à la page véhiculée en paramètre GET
// Cela nous permet aussi de valider que la page existe réellement dans notre projet
$find = false;
foreach($data as $key => $value) {
    // $value correspond au tableau home ou addMatelas, etc.
    if($page === $key) {
        // Nous avons trouvé le bon élément
        $find = true;
        $model = $value["model"];
        $view = $value["view"];
        $controller = $value["controller"];

        // pas besoin d'aller plus loin, on sort de la boucle (puisque dans tous les cas on ne rentre qu'une fois dans le if)
        break;
    }
}

// Si l'élement a été retrouvé alors on peut faire les traitements ci-dessous sinon aucun intérêt
if ($find) {
    // On importe les différentes classes (ex: HomeModel, HomeView et HomeController)
    require_once(DIR_MODEL.$page.".php");
    require_once(DIR_CONTROLLER.$page.".php");
    require_once(DIR_VIEW.$page.".php");

    // Suite à l'import nous avons la possibilité d'instancier les classes importées (ex: HomeModel, HomeView et HomeController)
    // Il faut rendre cela dynamique pour pouvoir appeler BeerModel, BeerController et BeerView
    // Pour cela on crée un tableau contenant pour chaque page les noms du Model, du Controller et de la View, puis en allant chercher la bonne clé, on pourra faire l'affichage (cf plus haut)
    $pageModel = new $model($db); 
    $pageController = new $controller($pageModel);
    $pageView = new $view($pageController);

    // On peut faire appel à la méthode render de la classe HomeView (ou de la classe LoginView) pour faire le rendu de la vue
    $pageView->render();
}
?>