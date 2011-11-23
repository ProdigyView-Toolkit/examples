<?php

class UserHelper extends PVObject {
	
	function isLoggedIn() {
		return PVUsers::checkLogin();
	}
	
	function username(){
		return PVUsers::getUserName();
	}
	
	function useremail() {
		return PVUsers::getUserEmail();
	}
	
	function userid() {
		return PVUsers::getUserID();
	}
}
