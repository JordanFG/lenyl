<?php 

/**
* 
*/
namespace Core;


class Config
{
	
	private $config=[];
	private static $instance;


	public function __construct()
	{
		$this->config = require dirname(__DIR__).'/config/config.php';	
	}

	public static function getInstance(){

		if (is_null(self::$instance)) {

			self::$instance = new Config();
			
		}

		return self::$instance;
		
	}

	public function getKey($key){
		
		return $this->config[$key];

	}

}

?>