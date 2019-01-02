<?php 
/**
 * 
 */
namespace Core\Controller;

 class controller
 {
 	
 	protected $viewpath;

 	protected $template;

 	function __construct()
 	{
 		# code...
 	}

 	public function render($view, $variable = [])
 	{
 		ob_start();

 		extract($variable);

 		require $this->viewpath . str_replace('.', '/', $view) . '.php';

 		$content = ob_get_clean();
 		
 		require $this->viewpath . 'template/' . $this->template . '.php';
 	}

 	
 	public function forbidden(){

 		header("HTTP/1.0 403 Forbidden");
 		die("Acces Interdit");

 	}


 	public function notFound(){
 		
 		header("HTTP/1.0 404 Not Founf");
		die("Page introuvable");

 	
 	}

 } 
 ?>