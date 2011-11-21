<?php

echo PVHtml::h1('Edit Post');

echo PVForms::formBegin('edit-post', array('action' => $_SERVER['REQUEST_URI']));

	echo PVForms::label('Title', array('for' => 'text'));
	echo PVForms::text('title', array('value' => $post -> title, 'id' => 'title'));
	echo $this->error('title');
	
	echo PVForms::label('Post', array('for' => ''));
	echo PVForms::textarea('content', $post ->content, array('id' => 'content'));
	echo $this->error('content');
	
	echo PVForms::submit('submit_post', 'New Post');

echo PVForms::formEnd();