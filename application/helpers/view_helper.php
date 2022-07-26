<?php
use Jenssegers\Blade\Blade;

if(! function_exists('view')){
	function view($file = '',$data = array()){
		$view = APPPATH.'views';
		$cache = $view.'/cache';
		$blade = new Blade($view, $cache);
		echo $blade->render($file,$data);
	}
}
?>
