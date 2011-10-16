<?php
//Include the DEFINES and boot the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

//Set the arguements to create an option with
$option=array(
	'option_name'=>'My First Option',
	'option_value'=>serialize(array('Mocha', 'Latte')),
	'option_type'=>'coffee'
);
//Create the option
PVTools::addOption($option);

//Set the arguements to set an option value with. Setting a value is very specfic in setting an option
//with certain paramters. The parameters that can be used to distinguish two different options are:
//'option_name', 'option_type', 'user_id', 'app_id', 'content_id'.
//Changing anyone of these will either create a new object or update an existing one
$option=array(
	'option_name'=>'My Second Option',
	'option_value'=>serialize(array('Carmel', 'Mochaito')),
	'option_type'=>'coffee',
	'user_id'=>5,
	'app_id'=>3
);
//Set the object
PVTools::setOption($option);

//Set the arguements that you want to retrieve an arguement by. The only value
//that cannot be used is the option_value
$option_value_parameters=array(
	'option_name'=>'My Second Option',
	'option_type'=>'coffee',
	'user_id'=>5,
	'app_id'=>3
);
//Retrieve the value of the set object
echo PVTools::getOptionValue($option_value_parameters);
echo '<br />';

//Set the arguements that will overrite the option with the exact same values set.
$option=array(
	'option_name'=>'My Second Option',
	'option_value'=>serialize(array('White', 'Chocolate')),
	'option_type'=>'coffee',
	'user_id'=>5,
	'app_id'=>3
);
//Update the option using set
PVTools::setOption($option);

//Get the updated option with the same parameters
echo PVTools::getOptionValue($option_value_parameters);
echo '<br />';

//Get a list of options in the database
$list=PVTools::getOptionList();

foreach($list as $value){
	?>
	<pre>
		<?php print_r($value); ?>
	</pre>
	<?php
	$value['content_id']=3;
	//Update the option. The option id is in the retrieved value
	PVTools::updateOption($value);
}

//Get a list of options in the database with a option_type set to 'coffeee'
$list=PVTools::getOptionList(array('option_type'=>'coffee'));

foreach($list as $value){
	?>
	<pre>
		<?php print_r($value); ?>
	</pre>
	<?php
	//Retreive the option by the option id.
	$an_option=PVTools::getOptionByID($value['option_id']);
	//Delete the option
	PVTools::deleteOption($value['option_id']);
}

echo '<p>Option Example Complete</p>';