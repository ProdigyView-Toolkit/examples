<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

Image::init();

//Draw a blue image with a width of 100 and a height of 50
$square_1 = Image::drawImage(100 , 50, 'blue');
echo Html::p($square_1);
$square_1  = str_replace(PV_ROOT, '' , $square_1 );
echo Html::image($square_1, array('append_location' => false)).'<br />';


//Draw a green image with a width of 50 and height of 100
$square_2 = Image::drawImage(50 , 100, 'green');
echo Html::p($square_2);
$square_2  = str_replace(PV_ROOT, '' , $square_2);
echo Html::image($square_2, array('append_location' => false)).'<br />';


//Draw a yellow circle
$ellipse_1 = Image::drawEllipse(100 , 100, 'yellow');
echo Html::p($ellipse_1);
$ellipse_1  = str_replace(PV_ROOT, '' , $ellipse_1 );
echo Html::image($ellipse_1, array('append_location' => false)).'<br />';


//Draw a pink ellipse
$ellipse_2 = Image::drawEllipse(70 , 180, 'pink');
echo Html::p($ellipse_2);
$ellipse_2   = str_replace(PV_ROOT, '' , $ellipse_2 );
echo Html::image($ellipse_2 , array('append_location' => false)).'<br />';

//Set the location of an image on the file
$image_location = PV_ROOT . '/examples/content/example_files/sample_image_1.jpg';

//Get the height and width of an image
$image_width = Image::getImageWidth($image_location); 
$image_height = Image::getImageHeight($image_location); 

echo Html::p('Width: '.$image_width. ' Height: '.$image_height);

//Convert the image file into a png
$png_file = Image::convertImageFormat($image_location, 'png');
echo Html::p($png_file);
$png_file  = str_replace(PV_ROOT, '' , $png_file );
echo Html::image($png_file, array('append_location' => false)).'<br />';

//Convert the image file into a gif
$gif_file = Image::convertImageFormat($image_location, 'gif');
echo Html::p($gif_file);
$gif_file  = str_replace(PV_ROOT, '' , $gif_file );
echo Html::image($gif_file, array('append_location' => false)).'<br />';
