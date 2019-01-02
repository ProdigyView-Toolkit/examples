<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

include_once ('../vendor/autoload.php');

echo Html::h1('Code Example + Output');
echo Html::p('Code will be at the beginning, with example output below.');

echo Html::h3('Code Example');

highlight_string(file_get_contents(__FILE__));

echo Html::h3('Output From Code');

/**
 * Examples of the basics for writing and reading files as well
 * as copying directories.
 */

$draft_directory = PV_ROOT . PV_FILE . 'drafts' . DS;
$final_directory = PV_ROOT . PV_FILE . 'final' . DS;

if (!file_exists($draft_directory)) {
	mkdir($draft_directory);
}

$file = $draft_directory . 'MyBook.txt';
$file2 = $draft_directory . 'MySequel.txt';

//Write a new file
FileManager::writeFile($file, 'Once upon a time....what a cliche was starting a story.<br />');

//Append to a current file
FileManager::writeFile($file, 'Well the story must go on so lets continue anyway<br />', 'a');

//Append to a current file and set file encoding
@FileManager::writeFile($file, 'At least I should make sure its encoded correctly<br />', 'a', 'ISO-8859-1');

echo '<h2>Read A File</h2>';
$written = FileManager::readFile($file);
echo $written;

echo '<hr />';
echo '<h2>Change Mode For Reading File</h2>';
$written = FileManager::readFile($file, 'r+');
echo $written;

echo '<hr />';
echo '<h2>Add Encoding For Reading File</h2>';
$written = @FileManager::readFile($file, 'r+', 'UTF-8');
echo $written;

echo '<hr />';
echo '<h2>New File WILL NOT be written using writeNewFile</h2>';
//This will not execute because the file already exist and this function
//only writes new files
FileManager::writeNewFile($file, 'Starting on my second novel.<br />');
$written = FileManager::readFile($file);
echo $written;

echo '<hr />';
echo '<h2>New File WILL be written using writeNewFile() if it DOES NOT exist</h2>';
//This will execute if the file does not exist
FileManager::writeNewFile($file2, 'Starting on my second novel.<br />');
$written = FileManager::readFile($file2);
echo $written;

echo '<hr />';
echo '<h2>New File WILL be written using rewriteNewFile() if the file DOES exist</h2>';
//This will only execute if the file exist, it attempts to write over it
FileManager::rewriteNewFile($file, 'I am scrapping my old novel for something fresh.<br />');
$written = FileManager::readFile($file);
echo $written;

echo '<hr />';
echo '<h2>Copy Files into A New Directory And Delete Directory</h2>';
FileManager::copyDirectory($draft_directory, $final_directory);

//Delete the directory and all the files in it.
//Comment Out To Keep Directory
FileManager::deleteDirectory($draft_directory);
FileManager::deleteDirectory($final_directory);
