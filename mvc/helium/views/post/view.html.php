<?php

echo PVHtml::h1($post -> title);

echo PVHtml::aLink('Edit', array('controller' => 'post', 'action' => 'edit', 'id' => $post -> post_id));

echo PVHtml::p($post -> content);

echo PVHtml::strong('Leave A Comment');

if ($this -> UserHelper -> isLoggedIn()) :

	echo PVForms::formBegin('add-post', array('action' => $_SERVER['REQUEST_URI']));

	echo PVForms::label('Comment', array('for' => 'comment'));
	echo PVForms::textarea('comment', '', array('id' => 'comment'));
	echo $comment -> error('comment');

	echo PVForms::hidden('post_id', array('value' => $post -> post_id));
	echo PVForms::hidden('user_id', array('value' => $this -> UserHelper -> userid()));
	echo PVForms::submit('submit_comment', 'Leave Comment');

	echo PVForms::formEnd();

endif;

$comments_text = '';

foreach ($comments as $comment) {
	$comments_text .= PVHtml::strong($comment -> username);
	$comments_text .= PVHtml::aside($comment -> comment);
}

echo PVHtml::details($comments_text);
