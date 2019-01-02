<?php 
/**
* 
*/
namespace Core\Form;

class form{

	private $data;

	public $tag = 'p';

	function __construct($data = [])
	{
		$this->data = $data;
	}

	public function surrond($html){

			return "<{$this->tag}>".$html."</{$this->tag}>";
	
	}

	public function getValue($value)
	{
		if (is_object($this->data)) {

			return$this->data->$value;
		
		}
		return $this->data===[$value];
	}


	public function input($name, $option = [], $label){

		$type = isset($option['type']) ? $option['type'] : 'text';

		$value = isset($option['value']) ? $option['value'] : null;

		$html =  '<label>'.$label.'</label>';
		
		if ($type==='textarea') {

			$html = '<textarea name='.$name.' >'.$value.'</textarea>';
		
		}
		else{

			$html .= '<input type="'.$type.'" name="'.$name.'" value="'.$value.'"/>';
		
		}
		
		

		return $this->surrond($html);
	}

	public function submit($name, $value){

		$html = '<input type="submit" name="'.$name.'" value="'.$value.'" />';

		return $this->surrond($html);
	}

	public function select($name, $label, $data)
	{
		$html =  '<label>'.$label.'</label>';

		$html .= '<select name='.$name.'>';

		foreach ($data as $key => $value) {

			$html .= '<option value='.$key.'>'.$value.'</option>';

		}
		

		$html .= '</select>';


		return $this->surrond($html);
	}



}
?>