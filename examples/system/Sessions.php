<?php
//Include the DEFINES and boot on the core componets.
//Do not initialize the session, that will be done manually
include_once ('../../DEFINES.php');
require_once (PV_CORE . '_classLoader.php');
PVBootstrap::bootSystem(array('initialize_session' => false));

//Set a few session arguements and initialize the session
$session_args = array('session_lifetime' => 3000, 'cookie_lifetime' => 3000, );
PVSession::init($session_args);

//Data to encrypt
$cookie_name = 'Test_Cookie';
$cookie_data = 'Test Cookie Data';
$cookie_array_name = 'Test_Cookie_Array';
$cookie_array_data = array('abc', 123, 'doe', 'rae', 'mee');

$session_name = 'Test Session';
$session_data = 'Test Session Data';
$session_array_name = 'Session_Cookie_Array';
$session_array_data = array('abc', 123, 'doe', 'rae', 'mee');

PVSession::writeCookie($cookie_name, $cookie_data);
echo '<p>Unhashed Cookie Accessed Directly: ' . $_COOKIE[$cookie_name] . '</p>';
echo '<p>Unhashed Cookie Accessed through readCookie: ' . PVSession::readCookie($cookie_name) . '</p>';

PVSession::deleteCookie($cookie_name);
echo '<p>Cookie Deleted... ' . PVSession::readCookie($cookie_name) . '</p>';
echo '<hr />';

PVSession::writeCookie($cookie_array_name, $cookie_array_data);
echo '<p>Unhashed Array Cookie Accessed Directly: ' . $_COOKIE[$cookie_array_name] . '</p>';
echo '<p>Unhashed ArrayCookie Accessed through readCookie: ' . PVSession::readCookie($cookie_array_name) . '</p>';

PVSession::deleteCookie($cookie_array_name);
echo '<p>Cookie Deleted... ' . PVSession::readCookie($cookie_array_name) . '</p>';
echo '<hr />';

$options = array('hash_cookie' => true);
PVSession::writeCookie($cookie_name, $cookie_data, $options);
echo '<p>Hashed Cookie Accessed Directly: ' . @$_COOKIE[$cookie_name] . '</p>';
echo '<p>Hashed Cookie Accessed through readCookie: ' . PVSession::readCookie($cookie_name, $options) . '</p>';

PVSession::deleteCookie($cookie_name, $options);
echo '<p>Cookie Deleted... ' . PVSession::readCookie($cookie_name, $options) . '</p>';
echo '<hr />';

PVSession::writeSession($session_name, $session_data);
echo '<p>Unhashed Cookie Accessed Directly: ' . $_SESSION[$session_name] . '</p>';
echo '<p>Unhashed Cookie Accessed through readSession: ' . PVSession::readSession($session_name) . '</p>';

PVSession::deleteSession($session_name);
echo '<p>Session Deleted... ' . PVSession::readSession($session_name) . '</p>';
echo '<hr />';

PVSession::writeSession($session_array_name, $session_array_data);
echo '<p>Unhashed Array Session Accessed Directly: ' . $_SESSION[$session_array_name] . '</p>';
echo '<p>Unhashed Array Session Accessed through readSession: ' . PVSession::readSession($session_array_name) . '</p>';

PVSession::deleteSession($session_array_name);
echo '<p> Session Deleted... ' . PVSession::readSession($session_array_name) . '</p>';
echo '<hr />';

$options = array('hash_session' => true);
PVSession::writeSession($session_name, $session_data, $options);
echo '<p>Hashed Session Accessed Directly: ' . @$_SESSION[$session_name] . '</p>';
echo '<p>Hashed Session Accessed through readSession: ' . PVSession::readSession($session_name, $options) . '</p>';

PVSession::deleteSession($session_name, $options);
echo '<p>Session Deleted... ' . PVSession::readSession($session_name, $options) . '</p>';
echo '<hr />';

print_r($_COOKIE);
