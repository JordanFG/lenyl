<?php 
/**
 * 
 */
namespace App\Controller;

use Core\Controller\controller;

use \app;


class appController extends controller
{
 	
 	
 	protected $template = 'default';

 	function __construct()
 	{
 
 		$this->viewpath = ROOT.'/App/Views/'; 

 	}

 	protected function getModel($model)
 	{

 		return app::getInstance()->getTable($model);

 	}

 	protected function setTitle($title){

 		app::getInstance()->titre = $title;
 	
 	}

 	public function index(){

 		$this->render('home');
 	}

} 

?>