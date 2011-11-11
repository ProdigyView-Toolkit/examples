<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', E_ALL);

class ParentObject {

	public static function aPublicMethod() {
		echo 'I am a public function. Anyone can call me.<br />';
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

//echo ParentObject::aPrivateMethod();

//echo ParentObject::aPublicMethod();

class MyObjectWithExtension extends ParentObject {

	public static function aNewMethod() {
		static::_aProtectedMethod();
	}

}
