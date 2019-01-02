<?php 

define('ROOT', __DIR__);
require ROOT.'/App/App.php';

app::load();

if(isset($_GET['p'])){
    $p = $_GET['p'];
}
else{
    $p = 'home';
}

if($p === 'home'){
	$controller = new App\Controller\appController();
    $controller->index();
}




?>