<?php

echo PVHtml::h1('New Post');

echo PVForms::formBegin('add-post', array('action' => $_SERVER['REQUEST_URI']));

	echo PVForms::label('Title', array('for' => 'text'));
	echo PVForms::text('title', array('value' => $this ->request->title, 'id' => 'title'));
	echo $this->error('title');
	
	echo PVForms::label('Post', array('for' => ''));
	echo PVForms::textarea('content', $this ->request->content, array('id' => 'content'));
	echo $this->error('content');
	
	echo PVForms::submit('submit_post', 'New Post');

echo PVForms::formEnd();
