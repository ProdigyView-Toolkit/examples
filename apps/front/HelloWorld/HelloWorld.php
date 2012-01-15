<?php
class HelloWorld{

	function HelloWorld(){
		//Every Class should have a constructor like this one
	}//end constructor
	
	function commandInterpreter($command, $params){
		//Allow your application to interface with parts
		//Part of your design preferences
		if(empty($command)){
			$command=pv_retrieveGET('command');
		}

		if($command=='hijudy' || $command=='hellojudy'){
			$this->sayHiToJudy($params);
		}
		else if($command=='seebob' || $command=='hi' ||  (isset($params['bobparam']) && $params['bobparam']==true)){
			$this->sayHiToBob();

		}
		else{
			$this->main();
		}

	}//end commandIntepreter

	private function sayHiToJudy($params){
		echo '<h1>Function: sayHiToJudy</h1>';
		$name=$params['a_name'];
		echo $name.' says hi to Judy';
	}//end say hi to judy

	private function sayHiToBob(){
		echo '<h1>Function: sayHiToBob</h1>';
		echo 'Hi Bob, how are you!'; 
	}//end sayHiToBob

	function main(){
		echo '<h1>Function: main</h1>';
		echo "Hello World";
	}

}//end class
?>