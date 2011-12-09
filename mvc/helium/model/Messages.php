<?php
class Comments extends Model {

	protected $_schema = array(
		'message_id' => array('type' => 'int', 'primary_key' => true, 'auto_increment' => true),
		'receiver_id' => array('type' => 'int', 'default' => 0),
		'sender_id' => array('type' => 'int', 'default' => 0),
		'message' => array('type' => 'text', 'default' => "''"), 
		'date_sent' => array('type' => 'timestamp', 'default' => "now()"), 
	);
	
	protected $_validators=array(
		'message'=>array(
			'notempty'=>array('error'=>'Post must have a title.')
		),
	);
	
	public function hasRead(){
		
	}

}
?>