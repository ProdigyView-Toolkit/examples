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

Libraries::enqueueJavascript('script1.js');
Libraries::enqueueJavascript('script2.js');

Libraries::enqueueJquery('script3.js');
Libraries::enqueueJquery('script4.js');

Libraries::enqueuePrototype('script5.js');
Libraries::enqueuePrototype('script6.js');

Libraries::enqueueMootools('script7.js');
Libraries::enqueueMootools('script8.js');

Libraries::enqueueCss('style1.css');
Libraries::enqueueCss('style2.css');

$script = '<script type="text/javascript">alert("Look at the source code and review the output!");</script>';
Libraries::enqueueOpenscript($script);

$javascript_files = Libraries::getJavascriptQueue();

foreach($javascript_files as $script) {
	echo '<script type="text/javascript" src="'.PV_JAVASCRIPT.$script.'"></script>'."\n";
}


$jquery_files = Libraries::getJqueryQueue();

foreach($jquery_files as $script) {
	echo '<script type="text/javascript" src="'.PV_JQUERY.$script.'"></script>'."\n";
}

$prototype_files = Libraries::getPrototypeQueue();

foreach($prototype_files as $script) {
	echo '<script type="text/javascript" src="'.PV_PROTOTYPE.$script.'"></script>'."\n";
}

$mootools_files = Libraries::getMootoolsQueue();

foreach($mootools_files as $script) {
	echo '<script type="text/javascript" src="'.PV_MOOTOOLS.$script.'"></script>'."\n";
}

$css_files = Libraries::getCSSQueue();

foreach($css_files as $script) {
	echo '<script type="text/javascript" src="'.PV_CSS.$script.'"></script>'."\n";
}

$option_script = Libraries::getOpenscriptQueue();

echo $option_script;
