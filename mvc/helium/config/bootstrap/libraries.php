<?php
/**
 * Add additional libraries in this class. Also add adapters, filtes and observers in this class.
 */

$library_configuration = array();
PVLibraries::init($library_configuration);

PVLibraries::addLibrary('he2_alert');


PVLibraries::loadLibraries();
