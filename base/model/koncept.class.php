<?php

class Koncept {
	private $naziv;
	public function __construct ($naziv = "") {
		$this->naziv = $naziv;
	}
	public function Naziv ($value = "") {
		if ($value == "") return $this->naziv;
		$this->naziv = $value;	
	}
}

?>