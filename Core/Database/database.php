<?php 

/**
* 
*/
namespace Core\Database;

use PDO;

class database
{

	public $dbname;
	public $dbhost;
	public $dbuser;
	public $dbpass;
	private $pdo;
	
	function __construct($dbname, $dbhost='127.0.0.1', $dbuser='root', $dbpass='')
	{
		$this->dbname = $dbname;
		$this->dbhost = $dbhost;
		$this->dbuser = $dbuser;
		$this->dbpass = $dbpass;
	}

	/*
	* dbconnect() permet de se connecter à la base de donnée 
	*
	*/

	public function dbconnect(){

		if (empty($this->pdo)) {
			$pdo = new PDO('mysql:dbname='.$this->dbname.';host='.$this->dbhost.'', $this->dbuser, $this->dbpass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo = $pdo;
		}
		
		return $this->pdo;
	}

	/**
	* query permet de faire des requêtes sans attribut
	*/

	public function query($statement, $class_name=null, $bool){
		  
		$req = $this->dbconnect()->query($statement);

		if ($class_name === null) {

			$req->setFetchMode(PDO::FETCH_OBJ);

		}
		else{

			$req->setFetchMode(PDO::FETCH_CLASS, $class_name);
		}
		

		if ($bool) {

			$data = $req->fetch();

		}

		else{

			$data = $req->fetchAll();

		}

		return $data;
	}

	/**
	* prepare permet de faire des requêtes avec des attribut
	*/

	public function prepare($statement, $attribut, $class_name = null, $bool)
	{

		$req = $this->dbconnect()->prepare($statement);
		$res = $req->execute($attribut);
	
		if (strpos($statement, "UPDATE")===0 ||
			strpos($statement, "INSERT")===0 ||
			strpos($statement, "DELETE")===0 
		   ) 
		{
			return $res;
		}
		if ($class_name === null) {

			$req->setFetchMode(PDO::FETCH_OBJ);

		}
		else{

			$req->setFetchMode(PDO::FETCH_CLASS, $class_name);

		}
		

		if ($bool) {

			$data = $req->fetch();

		}

		else{

			$data = $req->fetchAll();

		}
		
		return $data;

	}

	public function getLastInsertId()
	{
		return $this->dbconnect()->lastInsertId();
	}
}
