<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

PVImage::init();

//Draw a blue image with a width of 100 and a height of 50
$square_1 = PVImage::drawImage(100 , 50, 'blue');
echo PVHtml::p($square_1);
$square_1  = str_replace(PV_ROOT, '' , $square_1 );
echo PVHtml::image($square_1, array('append_location' => false)).'<br />';


//Draw a green image with a width of 50 and height of 100
$square_2 = PVImage::drawImage(50 , 100, 'green');
echo PVHtml::p($square_2);
$square_2  = str_replace(PV_ROOT, '' , $square_2);
echo PVHtml::image($square_2, array('append_location' => false)).'<br />';


//Draw a yellow circle
$ellipse_1 = PVImage::drawEllipse(100 , 100, 'yellow');
echo PVHtml::p($ellipse_1);
$ellipse_1  = str_replace(PV_ROOT, '' , $ellipse_1 );
echo PVHtml::image($ellipse_1, array('append_location' => false)).'<br />';


//Draw a pink ellipse
$ellipse_2 = PVImage::drawEllipse(70 , 180, 'pink');
echo PVHtml::p($ellipse_2);
$ellipse_2   = str_replace(PV_ROOT, '' , $ellipse_2 );
echo PVHtml::image($ellipse_2 , array('append_location' => false)).'<br />';

//Set the location of an image on the file
$image_location = PV_ROOT . '/examples/content/example_files/sample_image_1.jpg';

//Get the height and width of an image
$image_width = PVImage::getImageWidth($image_location); 
$image_height = PVImage::getImageHeight($image_location); 

echo PVHtml::p('Width: '.$image_width. ' Height: '.$image_height);

//Convert the image file into a png
$png_file = PVImage::convertImageFormat($image_location, 'png');
echo PVHtml::p($png_file);
$png_file  = str_replace(PV_ROOT, '' , $png_file );
echo PVHtml::image($png_file, array('append_location' => false)).'<br />';

//Convert the image file into a gif
$gif_file = PVImage::convertImageFormat($image_location, 'gif');
echo PVHtml::p($gif_file);
$gif_file  = str_replace(PV_ROOT, '' , $gif_file );
echo PVHtml::image($gif_file, array('append_location' => false)).'<br />';
