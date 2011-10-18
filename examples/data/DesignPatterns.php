<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

class Restaurant extends PVApplication {
	
	private $total;
	
	protected function walkIn(){
		if($this->_hasAdapter(get_class(), __FUNCTION__) )
			return $this->_callAdapter(get_class(), __FUNCTION__);
		
		$this->_notify('new_customer');
	}
	
	protected function placeOrder($order){
		if($this->_hasAdapter(get_class(), __FUNCTION__) )
			return $this->_callAdapter(get_class(), __FUNCTION__, $details);
		
		if($order=='steak'){
			$this->_addToCollectionWithName('steak', 12.99);
		} else if($order=='eggs'){
			$this->_addToCollectionWithName('eggs', 3.99);
		} else if($order=='juice'){
			$this->_addToCollectionWithName('juice', 1.99);
		} else if($order=='lobster'){
			$this->_addToCollectionWithName('lobster', 19.99);
		} else if($order=='wine'){
			$this->_addToCollectionWithName('wine', 4.99);
		}
		
		$order=$this->_applyFilter( get_class(), __FUNCTION__ , $order);
		$this->_notify('ordered', $order);
		
		return '<p>Here is the '.$order.' that you ordered</p>';
	}
	
	protected function requestCheck() {
		if($this->_hasAdapter(get_class(), __FUNCTION__) )
			return $this->_callAdapter(get_class(), __FUNCTION__, $details);
		
		$orders=$this->_getIterator();
		
		$bill='';
		$total=0;
		
		foreach($orders as $item=>$price) {
			$bill.="$item.....$price <br />";
			$total += $price;
		}
		
		$charges=$this->_applyFilter( get_class(), __FUNCTION__ , array('bill'=>$bill, 'total'=>$total), array('event'=>'surcharges'));
		$bill=$charges['bill'];
		$total=$charges['total'];
		
		$this->total=$total;
		$bill.="Total.....$total";
		
		$bill=$this->_applyFilter( get_class(), __FUNCTION__ , $bill);
		$this->_notify('bill', $bill, $total);
		
		return $bill;
	}
	
	protected function payBill($amount, $tip){
		if($this->_hasAdapter(get_class(), __FUNCTION__) )
			return $this->_callAdapter(get_class(), __FUNCTION__, $details);
		
		if($amount< $this->total)
			return "<p>Sorry, $amount is not enough. Your bill was $this->total.<p>";
		
		$change=$this->total-$amount;
		
		$this->_applyFilter( get_class(), __FUNCTION__ , array('amount'=>$amount, 'tip'=>$tip));
		$this->_notify('paybill', $this->total, $amount, $tip);
		
		return '<h2>Thank you! Come again!</h2>';
	}
	
	public function defaultFunction($params=array()){
		return 'No Color found';
	}
}

class Billing {
	
	public static function customize($bill) {
		$bill='<h1>Thank You For Dining At PV\'s Dinner!</h1><br >'.$bill;
		$bill.='<br /><strong>Come Again!</strong>';
		
		return $bill;
	}
	
	public static function charges($charges) {
		$bill=$charges['bill'];
		$total=$charges['total'];
		
		if($total==0)
			return $charges;
		
		$bill.='<hr />';
		$bill.='Taxes.....'.($total*.06).'<br />';
		$bill.='Gratuity.....2%<br />';
		$total+=($total*.02)+($total*.06);
		
		return array('bill'=>$bill, 'total'=>$total);
	}
}

$restaurant= new Restaurant();

$restaurant->commandInterpreter('walkIn');

echo $restaurant->commandInterpreter('placeOrder', 'steak');
echo $restaurant->commandInterpreter('placeOrder', 'juice');

echo $restaurant->commandInterpreter('requestCheck');
echo $restaurant->commandInterpreter('payBill', 15.00, 3.00);



$restaurant= new Restaurant();
$restaurant->_addFilter('Restaurant', 'requestCheck', 'Billing', 'charges', $options=array('event'=>'surcharges'));
$restaurant->_addFilter('Restaurant', 'requestCheck', 'Billing', 'customize');
$restaurant->commandInterpreter('walkIn');

echo $restaurant->commandInterpreter('placeOrder', 'steak');
echo $restaurant->commandInterpreter('placeOrder', 'juice');

echo $restaurant->commandInterpreter('requestCheck');
