<?php
//Include the DEFINES and boot the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

PVLibraries::enqueueJavascript('script1.js');
PVLibraries::enqueueJavascript('script2.js');

PVLibraries::enqueueJquery('script3.js');
PVLibraries::enqueueJquery('script4.js');

PVLibraries::enqueuePrototype('script5.js');
PVLibraries::enqueuePrototype('script6.js');

PVLibraries::enqueueMootools('script7.js');
PVLibraries::enqueueMootools('script8.js');

PVLibraries::enqueueCss('style1.css');
PVLibraries::enqueueCss('style2.css');

$script = '<script type="text/javascript">alert("Look at the source code and review the output!");</script>';
PVLibraries::enqueueOpenscript($script);

$javascript_files = PVLibraries::getJavascriptQueue();

foreach($javascript_files as $script) {
	echo '<script type="text/javascript" src="'.PV_JAVASCRIPT.$script.'"></script>'."\n";
}


$jquery_files = PVLibraries::getJqueryQueue();

foreach($jquery_files as $script) {
	echo '<script type="text/javascript" src="'.PV_JQUERY.$script.'"></script>'."\n";
}

$prototype_files = PVLibraries::getPrototypeQueue();

foreach($prototype_files as $script) {
	echo '<script type="text/javascript" src="'.PV_PROTOTYPE.$script.'"></script>'."\n";
}

$mootools_files = PVLibraries::getMootoolsQueue();

foreach($mootools_files as $script) {
	echo '<script type="text/javascript" src="'.PV_MOOTOOLS.$script.'"></script>'."\n";
}

$css_files = PVLibraries::getCSSQueue();

foreach($css_files as $script) {
	echo '<script type="text/javascript" src="'.PV_CSS.$script.'"></script>'."\n";
}

$option_script = PVLibraries::getOpenscriptQueue();

echo $option_script;

//echo '<script type="text/javascript">'.$option_script.'</script>'."\n";

