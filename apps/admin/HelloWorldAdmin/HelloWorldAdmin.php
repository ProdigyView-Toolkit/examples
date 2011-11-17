<?php
class HelloWorldAdmin{

	function HelloWorldAdmin(){
		//Every Class should have a constructor like this one
	}//end constructor
	
	function commandInterpreter($command, $params){

	
			$this->mainPanel($params);
		

	}//end commandIntepreter


	private function mainPanel($params){
		?>
        <h1>Hello World Admin</h1>
        <p>You are now in the admin section of HelloWorld!</p>
        <?php
	}//end mainPanel

}//end class
?>