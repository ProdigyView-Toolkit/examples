<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

Image::init();

//Create an array to hold multople image
$images = array();
//Create images of a circle base on degreees
for($i = 1; $i < 11; $i++ ){
	$images[] = Image::drawEllipse(100 , 100, 'yellow',  array('end_angle' =>$i * 36));
}

//Animate the array of iamges
$image_1 = Image::animateImage($images);
$image_1 = str_replace(PV_ROOT, '' , $image_1);
echo Html::image($image_1, array('append_location' => false)).'<br /><br /><br />';

//Create an array with different strings of texts
$text_array = array(
	'ProdigyView',
	'HAS',
	'some cool features!',
	'http://www.prodigyview.com'
);

//Set options for creating the animation
$options = array(
	'image_delay' => 120, 	//Delay between each image
	'font_color' => 'blue',	//Font color of the text
	'image_width' => 500,	//Set the width of the gif	
	'image_height' => 100	//Set the height of the gif
);

//Create an animated gif with the text and options
$image_2 = Image::animateText($text_array, $options);
//Dispay the gif as an image
$image_2 = str_replace(PV_ROOT, '' , $image_2);
echo Html::image($image_2, array('append_location' => false)).'<br /><br />';

//Set the location of the image to alter
$image_location = PV_ROOT . '/examples/content/example_files/sample_image_1.jpg';

//Create and display a drop shadow of the image
$image_3 = Image::drawDropShadow($image_location); 
$image_3 = str_replace(PV_ROOT, '' , $image_3);
echo Html::image($image_3, array('append_location' => false)).'<br />';

//Set some options of the dropshadow
$options = array(
	'offset_x' => 20,	//Offest of the dropshadow on the x-coordinate
	'offset_y' => 20	//Offset of the dropshadow on the y-coordinate
);

//Create an display the drop shadow with options
$image_4 = Image::drawDropShadow($image_location, $options); 
$image_4 = str_replace(PV_ROOT, '' , $image_4);
echo Html::image($image_4, array('append_location' => false)).'<br />';

