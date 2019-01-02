<?php 

/**
* 
*/
namespace Core\Form;
/*
* bootstapForm est spécifique au framework bootstrap
*/
class bootstrapForm extends form{
	
	/*
	* input() permet de générer soit des textarea soit des input 
	* $name recupère le nom du champs
	* $label recupère le label
	* $option recupère les différentes options (type, ...)
	* 
	*/

	public function input($name, $label, $option = [])
	{
		$type = isset($option['type']) ? $option['type'] : 'text';

		$html =  '<label>'.$label.'</label>';
		
		if ($type==='textarea') {

			$html .= '<textarea name='.$name.' class="form-control">'.$this->getValue($name).'</textarea>';
		
		}
		else{

			$html .= '<input type="'.$type.'" name="'.$name.'" value="'.$this->getValue($name).'" class="form-control"/>';
		
		}
		
		return $this->surrond($html);
		
	}

	/*
	* submit() permet de générer un boutton 
	* $name récupère le nom du boutton
	* $value récupère la valeur du champ de saisie
	*/

	public function submit($name, $value){

		$html = '<input type="submit" name="'.$name.'" value="'.$value.'" class="btn btn-primary"/>';

		return $this->surrond($html);
	}

	/*
	* select() permet de générer une sélection d'élément
	* $name récupère le nom de la sélection
	* $data récupère les données de la sélection
	*/

	public function select($name, $label, $data)
	{
		
		$html =  '<label>'.$label.'</label>';

		$html .= '<select name='.$name.' class="form-control">';
		$attribute = '';
		foreach ($data as $key => $value) {

			if ($value == $this->getValue($name)) {
				$attribute = ' selected';
			}

			$html .= '<option value='.$key.''.$attribute.'>'.$value.'</option>';

		}
		

		$html .= '</select>';


		return $this->surrond($html);
	}

}

?>


