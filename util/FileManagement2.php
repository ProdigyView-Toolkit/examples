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

echo '<h3>File Mime Type</h3>';
echo FileManager::getFileMimeType('FileManagement2.php');

echo '<h3>File Size Using Perl</h3>';
echo FileManager::getFileSize_PERL('FileManagement2.php');

echo '<h3>Lastest File In A Directory</h3>';
echo FileManager::getLastestFileInDirectory(PV_CORE);

echo '<h3>Retrieve all the files in a directory</h3>';
?>
<pre>
	<?php print_r(FileManager::getFilesInDirectory(PV_CORE)); ?>
</pre>
<?php

echo '<h3>Retrieve all the files in a directory descriptive version</h3>';
?>
<pre>
	<?php print_r(FileManager::getFilesInDirectory(PV_CORE, array('verbose'=>true))); ?>
</pre>
<?php

