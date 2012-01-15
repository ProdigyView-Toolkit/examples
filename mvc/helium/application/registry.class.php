<?php

Class Registry extends He2Object {

	private $vars = array();

	public function __set($index, $value) {
		$this -> vars[$index] = $value;
	}

	public function __get($index) {
		if (isset($this -> vars[$index])) {
			return $this -> vars[$index];
		}
	}

}
?>
