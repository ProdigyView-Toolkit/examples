<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

//Initialize the PVImage object
PVImage::init();

//Set the location of the image
$image_location = PV_ROOT . '/examples/content/example_files/sample_image_1.jpg';

$image_location_2 = PV_ROOT . '/examples/content/example_files/sample_image_2.jpg';

//Scale the image to 300 x 300
$smaller_image_1 = PVImage::scaleImage($image_location, 300, 300);
echo $smaller_image_1.'<br />';

//Scale the image to 100 x 100
$smaller_image_2 = PVImage::scaleImage($image_location, 100, 100);
echo $smaller_image_2.'<br />';

//Read the image in as bytes
$image_bytes = PVFileManager::readFile($image_location);

//Set the options for scaling the image
$options = array(
	'file' => 'blob',
	'write_image_name' => 'defined_image.jpeg',
	'add_extension' => false
);

//Scale the bytes
$smaller_image_3 = PVImage::scaleImage($image_location, 200, 200, $options);
echo $smaller_image_3.'<br />';

//Add a watermark to the image
$watermark_image_1 = PVImage::watermarkImageWithText($smaller_image_1, 'Awesome Watermark!');
echo $watermark_image_1.'<br />';

///Specifiy options about the watermark to be added
$options = array(
	'font_size' => 15,
	'font_color' => 'blue',
	'font_style' => Imagick::STYLE_ITALIC,
);
//Watermark the image with options
$watermark_image_2 = PVImage::watermarkImageWithText($smaller_image_2, 'Awesome Watermark!', $options);
echo $watermark_image_2.'<br />';

//Read the image in as bytes
$image_bytes = PVFileManager::readFile($smaller_image_3);


$options = array(
	'font_color' => 'green',
	'rotation' => 45,
	'position_x' => 10,
	'position_y' => -10,
	'write_image_name' => 'watermarked_image',
	'type' => 'blob'
);

$watermark_image_3 = PVImage::watermarkImageWithText($image_bytes , 'Awesome Watermark!', $options);

echo $watermark_image_3.'<br />';

$options = array(
	'offset_x' => 50,
	'offset_y' => 100,
	'write_image_name' => 'watermarked_image_2',
);

$watermark_image_4 = PVImage::watermarkImageWithImage($image_location ,$smaller_image_2 , $options);

echo $watermark_image_4.'<br />';


$smaller_image_1 = str_replace(PV_ROOT, '' , $smaller_image_1);
$smaller_image_2 = str_replace(PV_ROOT, '' , $smaller_image_2);
$smaller_image_3 = str_replace(PV_ROOT, '' , $smaller_image_3);
$watermark_image_1 = str_replace(PV_ROOT, '' , $watermark_image_1);
$watermark_image_2 = str_replace(PV_ROOT, '' , $watermark_image_2);
$watermark_image_3 = str_replace(PV_ROOT, '' , $watermark_image_3);
$watermark_image_4 = str_replace(PV_ROOT, '' , $watermark_image_4);

echo PVHtml::image($smaller_image_1, array('append_location' => false)).'<br />';
echo PVHtml::image($watermark_image_1, array('append_location' => false)).'<br />';
echo PVHtml::image($smaller_image_2, array('append_location' => false)).'<br />';
echo PVHtml::image($watermark_image_2, array('append_location' => false)).'<br />';
echo PVHtml::image($smaller_image_3, array('append_location' => false)).'<br />';
echo PVHtml::image($watermark_image_3, array('append_location' => false)).'<br />';
echo PVHtml::image($watermark_image_4, array('append_location' => false)).'<br />';




