<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', E_ALL);

class ParentObject {

	public static function aPublicMethod() {
		echo 'I am a public function. Anyone can call me.<br />';
		
		self::_aProtectedMethod();
		self::aPrivateMethod();
	}

	protected static function _aProtectedMethod() {
		echo 'I am a protected function. I can only be called internally by the object I am in.<br />';
		echo 'When extended, children classes can call me.<br />';
		echo 'Notice my naming convention. For coding standard, a protected functions begin with  "_".<br />';
		
	}

	private static function aPrivateMethod() {
		echo 'I am a private function. Only the class I currently reside in can call me.';
	}

}

echo ParentObject::aPublicMethod();

//To throw an error, call one of these
//echo ParentObject::aPrivateMethod();
//echo ParentObject::aPublicMethod();

class MyObjectWithExtension extends ParentObject {

	public static function aNewMethod() {
		echo 'I am going to call the protected method of my parent class.<br />';
		static::_aProtectedMethod();
	}
	
	public static function anErrroMethod() {
		echo 'Calling me with throw an error because I cannot call a private method of my parent.';
		static::aPrivateMethod();
	}

}

MyObjectWithExtension::aNewMethod();

//To Throw an error, uncomment the function below
//MyObjectWithExtension::anErrroMethod();

/*
 * Annonymous functions are functions that are created on the fly.
 */

$htmlEnclose = function($string, $html_tag) {
	
	return '<'.$html_tag.'>'.$string.'</'.$html_tag.'>';
};

echo $htmlEnclose('Wrap Me', 'h1');
$storedFunctions = array( $htmlEnclose );
   