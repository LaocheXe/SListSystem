<?php
/***********************************/
//       www.defiantz.org          // 
//         supported.php           //
//			For slist-sys          //
//		     created by            //
//             LaocheXe            //
/***********************************/

// This is only showing the supported game servers, and voice servers
// that GameQ libaray uses.

if (!defined('e107_INIT'))
{
	require_once("../../class2.php");
}

/*	|| Maybe in the future this will be needed ||
if(!e107::isInstalled('games'))
{
	e107::redirect();;
	exit;	
}

e107::lan('games');
	|| Until then, we wont use this ||	*/

define('PAGE_NAME', 'Servers Supported'); // TODO - Replace with LAN
e107::meta('keywords', 'GameQ', 'Supported Servers');
require_once(HEADERF);

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


// Page/Table Title
$pageTitle = 'GameQ v3 - Supported Servers ('.count($protocols).')'; // TODO - Replace with LAN
// Starting the page rendering
// TODO - Replace with LAN
//<thead style="font-weight: bold; height: 35px; background-color: #333;">
//style="border: 1px solid; border-spacing: 1px 1px;"
$text .= '
	<table class="table table-striped table-bordered table-hover">
		<thead style="font-weight: bold; background-color: #333;">
			<tr>
				<td style="text-align: left; width: 300px; border: 1px solid; border-spacing: 1px 1px;">Game Name</td>
				<td style="text-align: left; width: 300px; border: 1px solid; border-spacing: 1px 1px;">GameQ Identifier</td>
				<td style="text-align: center; width: 150px; border: 1px solid; border-spacing: 1px 1px;">State</td>
			</tr>
		</thead>
		<tbody style="border: 1px solid; border-spacing: 1px 1px;">
';

foreach ($protocols AS $gameq => $info)
{
	switch ($info['state']) 
	{
        case 1:
            $state = 'Testing'; // TODO - Replace with LAN
         break;

        case 2:
            $state = 'Beta'; // TODO - Replace with LAN
         break;

        case 3:
            $state = 'Stable'; // TODO - Replace with LAN
         break;

        case 4:
            $state = 'Deprecated'; // TODO - Replace with LAN
         break;
    }
	

    //$cls = empty($cls) ? ' class="uneven"' : '';
    //printf("<tr%s><td>%s</td><td>%s</td><td>%s</td></tr>\n", $cls,
    //htmlentities($info['name']),
    //$gameq,
    //$state
	//);
	
	// Start Making The Table And Placing The Info Down
	$text .= '
			<tr>
				<td style="text-align: left; border: 1px solid; border-spacing: 1px 1px;">'.$info['name'].'</td>
				<td style="text-align: left; border: 1px solid; border-spacing: 1px 1px;">'.$gameq.'</td>
				<td style="text-align: center; border: 1px solid; border-spacing: 1px 1px;">'.$state.'</td>
			</tr>
	';
	
}

$text .= '
	    </tbody>
    </table>
';

e107::getRender()->tablerender($pageTitle, $text);
require_once(FOOTERF);
exit;
?>