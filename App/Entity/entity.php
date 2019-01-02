<?php 

/**
* entite nous permet d'avoir des fonction propre à chaque résultat obtenu après requête sur une table 
* 
*/
namespace App\Entite;

class entite 
{
	/*
	* __get permet si un nom de classe est entrer comme suit article->url de renvoyer la fonction correspondante ici url()
	*/
    
	public function __get($class){

		return $this->$class();

	}

}
?>

