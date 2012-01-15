<?php
/*
 * Extending PVApplication will allow yoou to build you application without the command interperter.
 */
class PVLinkedin extends PVApplication {
	
	protected function share($options = array()) {
		
		$defaults = array(
			'data-onsuccess ' => '',
			'data-onerror' => '',
			'data-counter' => 'top',
			'data-url' => PVTools::getCurrentUrl(),
		);
		$options += $defaults;
		
		$output = '<script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>';
		
		$output .= '<script type="IN/Share" ';
		
		foreach($options as $key => $value){
			
			if(!empty($value)) {
				$output .= $key.'="'.$value.'" ';
			}
		}
		
		$output .= '></script>';
		return $output;
	}
	
	public function defaultFunction($params = array()) {
		echo 'Here';

	}
	
}
