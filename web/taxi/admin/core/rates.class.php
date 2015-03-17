<?php

class Rates extends Controller {

	public function getRates()
	{
		$query = 'SELECT * FROM rates';
		$this->select($query);
		return $this->fetch();
	}


}