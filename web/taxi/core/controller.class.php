<?php

class Controller extends Database {

	public $variable;
	
	public function filter($variable)
	{
		$this->variable = stripslashes(strip_tags(trim($variable)));
		return $this->variable;
	}

	public function validate_email($email)
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function set_flashdata($item, $value)
	{
		$_SESSION[$item] = $value;
	}

	public function flashdata($item)
	{
		if(isset($_SESSION[$item]))
		{
			$value = $_SESSION[$item];
			unset($_SESSION[$item]);
			return $value;
		}
	}

	public function redirect($location)
	{
		header("location: $location");
		exit;
	}
	
}