<?php 

/**
* 
*/

namespace Core\DbAuth;


use Core\Database\database;

class dbAuth
{

	protected $db;
	
	/*
	* Injection  de dépendance de la classe database() 
	*/

	public function __construct(database $db)
	{

		$this->db = $db;
	
	}
	
	/*
	* getUserID() permett de retourner l'id de l'utilisateur
	*/

	public function getUserId(){

		if ($this->logged()){
			return $_SESSION['auth'];
		}

		return false;
	}

	/**
	* login() permet d'authentifier un utilisateur 
	*/

	public function login($username, $pass){

		$auth = $this->db->prepare('SELECT * FROM users WHERE username=?', [$username], null, true);

		if($auth){

			if ($auth->pass === sha1($pass)) {

			 	$_SESSION['auth'] = $auth->id;

			 	return true;

			 } 
		
		}

		return false;

	}

	/*
	* logged() permet de verifier si l'utlisateur est connecté
	*/

	public function logged(){

		return isset($_SESSION['auth']);
	}
}
?>