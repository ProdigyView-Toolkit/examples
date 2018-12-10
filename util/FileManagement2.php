<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

include_once ('../vendor/autoload.php');

echo PVHTML::h1('Code Example + Output');
echo PVHTML::p('Code will be at the beginning, with example output below.');

echo PVHtml::h3('Code Example');

highlight_string(file_get_contents(__FILE__));

echo PVHtml::h3('Output From Code');

echo '<h3>File Mime Type</h3>';
echo PVFileManager::getFileMimeType('FileManagement2.php');

echo '<h3>File Size Using Perl</h3>';
echo PVFileManager::getFileSize_PERL('FileManagement2.php');

echo '<h3>Lastest File In A Directory</h3>';
echo PVFileManager::getLastestFileInDirectory(PV_CORE);

echo '<h3>Retrieve all the files in a directory</h3>';
?>
<pre>
	<?php print_r(PVFileManager::getFilesInDirectory(PV_CORE)); ?>
</pre>
<?php

echo '<h3>Retrieve all the files in a directory descriptive version</h3>';
?>
<pre>
	<?php print_r(PVFileManager::getFilesInDirectory(PV_CORE, array('verbose'=>true))); ?>
</pre>
<?php

