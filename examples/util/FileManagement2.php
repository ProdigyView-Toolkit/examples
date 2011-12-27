<?php
//Turn on error reporting
ini_set('display_errors','On');
error_reporting(E_ALL); 

//Only the class loader is needed because no database connection
//or supporting libraries are needed
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');

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

