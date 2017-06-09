#!/usr/local/bin/php
<?php
class Controller {

	public function view($view, $vars = array(), $return = FALSE)
	{
		return $this->load(array('_ci_view' => $view, '_ci_vars' => $vars, '_ci_return' => $return));
	}

	protected function load($_ci_data)
		{
		// Set the default data variables
		foreach (array('_ci_view', '_ci_vars', '_ci_path', '_ci_return') as $_ci_val)
		{
			$$_ci_val = isset($_ci_data[$_ci_val]) ? $_ci_data[$_ci_val] : FALSE;
		}

		extract($_ci_vars);
		ob_start();

		// echo dirname(__DIR__);
		// echo "\n";
		// echo __DIR__;
		// echo "\n";

		include_once("views/$_ci_view.php"); // include() vs include_once() allows for multiple views with the same name
		// Return the file data if requested
		if ($_ci_return === TRUE)
		{
			$buffer = ob_get_contents();
			@ob_end_clean();
			// var_dump($buffer);
			return $buffer;
		}
			// $contents = ob_get_contents();
			// @ob_end_clean();
	}

}