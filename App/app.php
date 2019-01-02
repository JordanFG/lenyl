<?php 
/**
 * 
 */

 use Core\config;
 use Core\Database\database;
 use Core\Form\bootstrapForm;



 class app
 {
 	private static $dbInstance;
 	private static $instance;
 	public $titre = "Lenyl";

 	public static function load()
 	{

 		session_start();
 		require ROOT.'/App/autoloader.php';
		App\Autoloader::register();
		require ROOT.'/Core/autoloader.php';
		Core\Autoloader::register();
		
 	}

 	public static function getDb()
 	{
 		$config = config::getInstance();

 		if ( is_null(self::$dbInstance)){

 			self::$dbInstance = new database($config->getKey('dbname'), $config->getKey('dbhost'), $config->getKey('dbuser'), $config->getKey('dbpass'));

 		}

 		return self::$dbInstance;
 		
 	}

 	public static function getInstance(){

 		if (is_null(self::$instance)) {

 			self::$instance = new app();	

 		}
 		
 		return self::$instance;

 	}

 	public function getTable($name){

 		$className = "App\Table\\".$name."Table";
		
		return new $className($this->getDb());

 	}

 	public function getForm($data = []){

 		return new bootstrapForm($data);

 	}

 	public function forbidden($value='')
 	{
 		return "okokok";
 	}






 } 
 ?>