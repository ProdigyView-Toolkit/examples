<?php

class SiteHelper extends PVObject {
	
	public function getUserSitesList() {
		if(!PVUsers::checkLogin())
			return false;
		
		$sites=new SitesAdmin();
		$conditions=array('user_id'=>PVUsers::getUserID());
		$join=array('sites');
		
		$sites->find(compact('conditions', 'join'));
		
		return $sites->data;
	}
	
	
}
