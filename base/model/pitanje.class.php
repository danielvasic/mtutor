<?php

class Pitanje {
	private $pitanje;
	private $odgovori;
	private $odgovor;	
	
	public function __construct ($pitanje = "", $odgovor = "", $odgovori = array ()) {
		$this->pitanje = $pitanje;
		$this->odgovori = $odgovori;
		$this->odgovor = $odgovor;	
	}
	
	public function Pitanje ($pitanje = "") {
		if ($pitanje != "") $this->pitanje = $pitanje;
		return $this->pitanje;	
	}
	
	public function Odgovor ($odgovor = "") {
		if ($odgovor != "") $this->odgovor = $odgovor;
		return $this->odgovor;	
	}
	
	public function Odgovori ($odgovori = "") {
		if ($odgovori != "") $this->odgovori = $odgovori;
		return $this->odgovori;	
	}
}