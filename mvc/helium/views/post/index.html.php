<?php

echo PVHtml::h1('Post');
echo PVHtml::p(PVHtml::alink('-Add Post-', array('controller' => 'post', 'action' => 'add')));

foreach($posts as $post) :
	$link = PVHtml::alink($post->title, array('controller' => 'post', 'action' => 'view', 'id' => $post -> post_id));
	
	echo PVHtml::div($link);
endforeach;
