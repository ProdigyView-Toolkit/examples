<?php
//Include the DEFINES and boo the system
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_BootCompleteSystem.php');

class Tickets extends  PVObject {
	
	private $rides = 3;
	
	//Make the constructor proteced so it cannot be instaniated with new
	protected function __construct() {
		
	}
	
	public function useTicket() {
		$this->rides = $this->rides - 1;
	}
	
	public function getTickets() {
		return $this->rides;
	}
		
}//end class Tickets


class FerrisWheel {
	
	public function __construct() {
		$tickets = Tickets::getInstance();
		$tickets ->useTicket();
	}
}

class BumperCars {
	
	public function __construct() {
		$tickets = Tickets::getInstance();
		$tickets ->useTicket();
	}
}

class MerryGoRound {
	
	public function __construct() {
		$tickets = Tickets::getInstance();
		$tickets ->useTicket();
	}
}

$tickets = Tickets::getInstance();
echo '<strong>Ticket Count</strong> '.$tickets -> getTickets(). '<br />';
new FerrisWheel();

echo '<strong>Ticket Count</strong> '.$tickets -> getTickets(). '<br />';
new BumperCars();

echo '<strong>Ticket Count</strong> '.$tickets -> getTickets(). '<br />';
new MerryGoRound();

echo '<strong>Ticket Count</strong> '.$tickets -> getTickets(). '<br />';
