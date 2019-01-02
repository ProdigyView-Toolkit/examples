<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

include_once ('../vendor/autoload.php');

use prodigyview\design\Singleton;
use prodigyview\template\Html;

echo Html::h1('Code Example + Output');
echo Html::p('Code will be at the beginning, with example output below.');

echo Html::h3('Code Example');

highlight_string(file_get_contents(__FILE__));

echo Html::h3('Output From Code');

class Tickets {
	
	use Singleton;
	
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
