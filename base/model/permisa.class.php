<?php
require_once ('koncept.class.php');
require_once ('relacija.class.php');
class permisa {
	private $nadkoncept;
	private $relacija;
	private $podkoncept;
	public function __construct ($nadkoncept = NULL, $relacija = NULL, $podkoncept = NULL) {
		$this->nadkoncept = $nadkoncept;
		$this->relacija = $relacija;
		$this->podkoncept = $podkoncept;	
	}
	public function Nadkoncept ($nadkoncept = NULL) {
		if ($nadkoncept == NULL) $this->nadkoncept = $nadkoncept;
		return $this->nadkoncept;
	}
	public function Podkoncept ($podkoncept = NULL) {
		if ($podkoncept == NULL) $this->podkoncept = $podkoncept;
		return $this->podkoncept;
	}
}
?>