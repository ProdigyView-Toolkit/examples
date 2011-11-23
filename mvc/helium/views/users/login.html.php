<?php
echo PVHtml::h1('Login');

echo PVForms::formBegin('login', array('action' => $_SERVER['REQUEST_URI']));
	
	echo PVForms::label('Email', array('for' => 'user_email'));
	echo PVForms::email('user_email', array('value' =>$this->request->user_email, 'id' => 'user_email'));
	
	echo PVForms::label('Password', array('for' => 'user_password'));
	echo PVForms::password('user_password', array('id' => 'user_password'));
	
	echo PVForms::submit('login', 'Login');
	
echo PVForms::formEnd();