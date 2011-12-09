<?php
class Comments extends Model {

	protected $_schema = array(
		'comment_id' => array('type' => 'int', 'primary_key' => true, 'auto_increment' => true),
		'post_id' => array('type' => 'int', 'default' => 0),
		'comment' => array('type' => 'string', 'default' => "''", 'precision' => 255), 
		'content' => array('type' => 'text', 'default' => "''"), 
		'user_id' => array('type' => 'int', 'default' => 0)
	);
	
	protected $_validators=array(
		'comment'=>array(
			'notempty'=>array('error'=>'Comment must have text')
		),
	);
	
	protected $_joins = array(
		'users' => array('table' => 'users', 'type' => 'natural')
	);

}
?>