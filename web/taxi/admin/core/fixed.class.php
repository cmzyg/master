<?php

class Fixed extends Controller {

	public function getFixedPrices()
	{
		$query = 'SELECT * FROM fixed_prices';
		$this->select($query);
		return $this->fetch();
	}


}