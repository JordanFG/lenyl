<?php 
	
	/**
	* 
	*/
	namespace Core\Table;

	use Core\Database\database;

	class table
	{

		protected $table;

		protected $db;

		/*
		* nous avons une injection de dépendance de la classe database() dans la  classe table()
		*/

		public function __construct(database $db)
		{
			$this->db = $db;

			$part= explode('\\', get_class($this));

			$className = end($part);

			$className = str_replace('Table','', $className);

			$this->table = $className;

		}

		/*
		* query() permet de faire soit des requêtes préparé soit des requêtes simple en fonction de la présence d'attribut
		* $statement récupère la requête
		* $attribute récupère les attributs
		* $bool récupère un booléen qui nous permetra de savoir si l'on veut renvoyer un seul résultat ou plusieurs résultats
		*/

		public function query($statement, $attribute=null, $bool=false){

			if ($attribute===null) {
				
				return $this->db->query($statement, str_replace('Table', 'Entite', get_class($this)), $bool);
			
			}
			else{

				return $this->db->prepare($statement, $attribute, str_replace('Table', 'Entite', get_class($this)), $bool);
			}

		}
		public function getList($key, $champ)
		{
			$tab = [];
			$table = $this->all();

			foreach ($table as $k => $v) {

				$tab[$v->$key] = $v->$champ;

			}

			return $tab;
		}
		/*
		* all() permet de récupérer tous les éléments d'une table
		* elle est propre à toutes les applications 
		*/
		public function all(){

			return $this->query('SELECT * FROM '.$this->table);

		}

		public function update($id, $data)
		{
			
			foreach ($data as $key => $value) {

				$values[] = "$key = ?";

				$att[] = "$value";
			
			}
			
			$att[] = $id;

			$val = implode($values, ",");


			return $this->query("UPDATE {$this->table} SET {$val} WHERE id=?", $att, true);

		}
        
		public function insert($data)
		{
			
			foreach ($data as $key => $value) {

				$values[] = "$key = ?";

				$att[] = "$value";
			
			}
			

			$val = implode($values, ", ");
			return $this->query("INSERT INTO {$this->table} SET {$val} ", $att, true);

		}

		public function delete($id){

			return $this->query("DELETE FROM {$this->table} WHERE id=?", [$id], true);

		}

		
	}

 ?>