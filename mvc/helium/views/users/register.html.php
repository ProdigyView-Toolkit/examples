<?php
echo PVHtml::h1('register');

echo PVForms::formBegin('register', array('action' => $_SERVER['REQUEST_URI']));

	echo PVForms::label('User Name', array('for' => 'username'));
	echo PVForms::text('username', array('value' => $this ->request->username, 'id' => 'username'));
	
	echo PVForms::label('Email', array('for' => 'user_email'));
	echo PVForms::email('user_email', array('value' =>$this->request->user_email, 'id' => 'user_email'));
	
	echo PVForms::label('Password', array('for' => 'user_password'));
	echo PVForms::password('user_password', array('id' => 'user_password'));
	
	echo PVForms::hidden('user_access_level', array('value' => 1));
	echo PVForms::hidden('is_active', array('value' => 1));
	echo PVForms::submit('register', 'Register');

echo PVForms::formEnd();

