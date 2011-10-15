<?php
//Include the DEFINES and boo the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

/**
 * Class VendingMachine extends PVObject to gain all its features
 * and PVPatterns which has the filters.
 */
class VendingMachine extends PVObject {
	
	public function vend($option, $money, $age) {
		
		if($option==1)
			$item='Soda';
		else if($option==2)
			$item='Chips'; 
		else if($option==3)
			$item='Beer';
		else if($option==4)
			$item='Philopsher\'s Stone';
		else 
			$item='Nail Polish';
		
		$data=array('money'=>$money, 'age'=>$age, 'item'=>$item);
		
		if($this->_hasFilter(get_class(), __FUNCTION__ )) {
			//Two filters are used here because each filter is passing through a different event type
			$data=$this->_applyFilter( get_class(), __FUNCTION__ , $data , array('event'=>'item_check'));
			$data=$this->_applyFilter( get_class(), __FUNCTION__ , $data , array('event'=>'item_selected'));
		}
		
		return $data['item'];
	}
}

/**
 * ItemCheck is a class that will check to make sure
 * the right amount of given and the right age is set
 * before a purchase.
 */
class ItemCheck {
	 
	 public function check(&$data, $options){
	 	if(!is_array($data))
	 		return $data;
	 	//Ensures that the event is 'item_check'
	 	if($options['event']!='item_check')
			return $data;
		
		if($data['item']=='Beer' && $data['age']<21)
			$data['item']='Beer cannot be bought by minors';
		
		if($data['money']<1.25)
			$data['item']='Not enough money';
		
		return $data;
	 }
}

/**
 * ItemChooser, if the item is valid,
 * will choose an item to serve to the
 * customer.
 */
class ItemChooser{
	
	public static function chooseItem($data, $options) {
		//Ensures that the filter is only used when event is 'item_selected'
		if($options['event']!='item_selected')
			return $data;
		
		if($data['item']=='Soda'){
			$data['item']='Prodigy Cola';
		}
		
		else if($data['item']=='Beer'){
			$data['item']='Beer Googles';	
		}
		
		else if($data['item']=='Philopsher\'s Stone'){
			$data['item']='Full Metal Alchemist';	
		}
		
		else if($data['item']=='Chips'){
			$data['item']='Cheesy Sticks';	
		}
		
		else if($data['item']=='Nail Polish'){
			$data['item']='Bleach';	
		} 
		
		return $data;
	}
}//end ItemChooseer

echo '<h1>Vending Without Filters</h1>';
$vending = new VendingMachine();

echo $vending->vend(1, 2.00, 21);
echo '<br />';

echo $vending->vend(3, 1.25, 18);
echo '<br />';

echo $vending->vend(4, 0.25, 18);
echo '<br />';

echo '<h1>Add Item Chooser Filter</h1>';
//First two arguements of the filter is the class and method to filter.
//Second two arguements is the class and method that will do the filtering.
//For this example, associate an even with the filter.
$vending->_addFilter('VendingMachine', 'vend', 'ItemChooser', 'chooseitem', array('event'=>'item_selected'));

echo $vending->vend(1, 2.00, 21);
echo '<br />';

echo $vending->vend(3, 1.25, 18);
echo '<br />';

echo $vending->vend(4, 0.25, 18);
echo '<br />';

echo '<h1>Add Item Check Filter</h1>';
//Add in the fitler for item checking.
//Associate this filter with an event and have it call an instance of a class.
$vending->_addFilter('VendingMachine', 'vend', 'ItemCheck', 'check',array('event'=>'item_check', 'object'=>'instance'));

echo $vending->vend(1, 2.00, 21);
echo '<br />';

echo $vending->vend(3, 1.25, 18);
echo '<br />';

echo $vending->vend(4, 0.25, 18);
echo '<br />';