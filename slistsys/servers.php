<?php
/***********************************/
//		www.defiantz.org          // 
//		servers.php           	 //
//		For slistsys            //
//		Created by             //
//		LaocheXe              //
/*****************************/

if (!defined('e107_INIT'))
{
	require_once("../../class2.php");
}

if(!e107::isInstalled('slistsys'))
{
	e107::redirect();
	exit;
}

//e107::lan('slistsys'); // TODO - GET IT

define('PAGE_NAME', 'Servers'); // TODO - Replace With LAN
require_once(HEADERF);
e107::meta('keywords', 'servers');

$sql = e107::getDB();
$tp = e107::getParser();

if(!$sql->count('server_list'))
{
	$text = 'No Servers To List'; // TODO - Replace With LAN
	e107::getRender()->tablerender('No Servers', $text); // TODO - Replace With LAN
	require_once(FOOTER);
	exit;
}

// Load auto loader
require_once(__DIR__ . '/libraries/GameQ/Autoloader.php'); // TODO - Make Sure This Is Correct Path

// Define the protocols path
$protocols_path = __DIR__ . "/libraries/GameQ/Protocols/"; // TODO - Make Sure This Is Correct Path

// Grab the dir with all the classes available
$dir = dir($protocols_path);

$protocols = [];

// Now lets loop the directories
while (false !== ($entry = $dir->read())) {
    if (!is_file($protocols_path . $entry)) {
        continue;
    }

    // Lets get some info on the class
    $reflection = new ReflectionClass('\\GameQ\\Protocols\\' . pathinfo($entry, PATHINFO_FILENAME)); // TODO - Make Sure This Is Correct Path

    // Check to make sure we can actually load the class
    if (!$reflection->IsInstantiable()) {
        continue;
    }

    // Load up the class so we can get info
    $class = $reflection->newInstance();

    // Add it to the list
    $protocols[ $class->name() ] = [
        'name'  => $class->nameLong(),
        'state' => $class->state(),
    ];

    // Unset the class
    unset($class);
}

// Close the directory
unset($dir);

ksort($protocols);

$servers = $sql->retrieve('server_list', 'server_id, server_name, server_type, server_sef', false, true);

$text .= "<table border='1'>
			<thead style='font-weight: bold;'>
				<tr>
					<td style='text-align: left; width: 300px; border: 1px solid; border-spacing: 1px 1px;'>Server Name</td>
					<td style='text-align: left; width: 300px; border: 1px solid; border-spacing: 1px 1px;'>Server Type</td>
				</tr>
			</thead>
			<tbody>";
			
// The Meat and bones
// First nice links (meat)
//var_dump($servers);
// Second the server types(bones)
foreach($servers as $server)
{
	// In the future - add Link
	$text .= "<tr>
				<td>".$server['server_name']."</td>
				<td>".$server['server_type']."</td>
			</tr>";
}
// Closing The Table
$text .= "	</tbody>
		</table>";

e107::getRender()->tablerender('Server List', $text); // TODO - Replace With LAN
require_once(FOOTERF);
exit; 
?>