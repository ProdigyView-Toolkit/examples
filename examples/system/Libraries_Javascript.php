<?php
//Include the DEFINES and boot the system
include_once('../../DEFINES.php');
require_once(PV_CORE.'_BootCompleteSystem.php');

PVLibraries::enqueueJavascript('script1.js');
PVLibraries::enqueueJavascript('script2.js');

PVLibraries::enqueueJquery('script3.js');
PVLibraries::enqueueJquery('script4.js');

PVLibraries::enqueuePrototype('script3.js');
PVLibraries::enqueuePrototype('script4.js');

PVLibraries::enqueueMootools('script3.js');
PVLibraries::enqueueMootools('script4.js');

PVLibraries::enqueueCss('script3.js');
PVLibraries::enqueueCss('script4.js');