<?php
class Post extends Model {

	protected $_schema = array(
		'post_id' => array('type' => 'int', 'primary_key' => true, 'auto_increment' => true), 
		'title' => array('type' => 'string', 'default' => "''", 'precision' => 255), 
		'content' => array('type' => 'text', 'default' => "''"), 
		'user_id' => array('type' => 'int', 'default' => 0)
	);
	
	protected $_validators=array(
		'title'=>array(
			'notempty'=>array('error'=>'Post must have a title.')
		),
		'content'=>array(
			'notempty'=>array('error'=>'There must be content in the post.')
		),
	);

}
?>