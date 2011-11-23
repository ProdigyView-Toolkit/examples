<?php

Class usersController Extends Controller {

	public function index() {
		$users = PVUsers::getUserList();
		
		$this -> registry -> template -> users = $users;
	}
	
	public function add(){
		
	}
	
	public function register() {
		
		if($this -> registry -> post) {
			$allow_registration = true;
			
			if(empty($this -> registry -> post['username'])) {
				$allow_registration = false;
				echo PVTemplate::errorMessage('Username is required');
			}
			
			if(empty($this -> registry -> post['user_email'])) {
				$allow_registration = false;
				echo PVTemplate::errorMessage('Email is required');
			}
			
			if(empty($this -> registry -> post['user_password'])) {
				$allow_registration = false;
				echo PVTemplate::errorMessage('Password is required');
			}
			
			if($allow_registration) {
				$user_id = PVUsers::addUser($this -> registry -> post);
				
				if($user_id) {
					PVUsers::loginUser($this -> registry -> post['user_email']);
					PVTemplate::successMessage('You have succesfully registered');
					PVRouter::redirect('/users/profile/' . $user_id);
				} else {
					echo PVTemplate::errorMessage('There was a problem with your registration');
				}
			}
		}
		
	}
	
	public function login() {
		
		if($this -> registry -> post) {
			if(PVUsers::attemptLogin($this -> registry -> post['user_email'], $this -> registry -> post['user_password'])){
				PVTemplate::successMessage('You have succesfully logged in');
				PVRouter::redirect('/users/profile/' . PVUsers::getUserID());
				
			} else{
				PVTemplate::errorMessage('Invalid email and password combination');
			}
		}
	}
	
	public function logout(){
		if(PVUsers::checkLogin()) {
			PVUsers::logout();
			PVTemplate::successMessage('You have succesfully logged out');
		} else {
			PVTemplate::errorMessage('You were not logged in');
		}
		
		PVRouter::redirect('/');
	}
	
	public function profile() {
		$user_id = PVRouter::getRouteVariable('id');
		$user = PVUsers::getUserInfo($user_id);
		
		$this -> registry -> template -> user = $user;
	}
	
	public function edit() {
		
	}
	
	public function delete() {
		
	}
	
}//end class