<?php
/***********************************/
//		www.defiantz.org          // 
//		server.php           	 //
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

$sql = e107::getDB();
$tp = e107::getParser();

// Let's retrieve the data table 
//$getDetails = $sql->retrieve('server_list', 'server_id, server_name, server_type, server_ip, server_port, server_password, server_qport, server_qname, server_qpass, server_enable_gq, server_enable_sc, server_sc, server_enable_vc, server_viewer_cc, server_sef' false, true);

// Got to get sef or id
$sef = $_GET['sef'];
$id = $_GET['id'];
if(!empty($sef))
{
	$urlSql = $sql->select("server_list", "server_id, server_name, server_type, server_ip, server_port, server_password, server_qport, server_qname, server_qpass, server_enable_gq, server_enable_sc, server_sc, server_enable_vc, server_viewer_cc, server_sef", "server_sef LIKE '".$sef."%'");
}
else
{
	$urlSql = $sql->select("server_list", "server_id, server_name, server_type, server_ip, server_port, server_password, server_qport, server_qname, server_qpass, server_enable_gq, server_enable_sc, server_sc, server_enable_vc, server_viewer_cc, server_sef", "server_id LIKE '".$id."%'");
}

//server_id, server_name, server_type, server_ip, server_port, server_password, server_qport, 
//server_qname, server_qpass, server_enable_gq, server_enable_sc, 
//server_sc, server_enable_vc, server_viewer_cc, server_sef
if($urlSql != null)
{	
	while($row = $sql->db_Fetch())
	{
		$sID = $row['server_id'];
		$sName = $row['server_name'];
		$sType = $row['server_type'];
		
		$pageName = $sName; // Could replace with Server Name via GameQuery
		
		$sIP = $row['server_ip'];
		$sPort = $row['server_port'];
		$sPass = $row['server_password'];
		$sQPort = $row['server_qport'];
		$sQName = $row['server_qname'];
		$sQPass = $row['server_qpass'];
		$gqEnabled = $row['server_enable_gq'];
		$enableSC = $row['server_enable_sc'];
		$SCode = $row['server_sc'];
		$cvcEenabled = $row['server_enable_vc'];
		$vCode = $row['server_viewer_cc'];
	}
}

define('PAGE_NAME', $pageName); // TODO - Replace with Server Name
e107::meta('keywords', ''.$pageName.', '.$sType.''); // TODO - Get Corrected Info (look at eWL Games)
require_once(HEADERF);
//////////////////// HEADER END ////////////////////
// Meat and Bones
////////////////////////////////////////////////////

// Check if GameQ is Enabled
if($gqEnabled == 1)
{
	require_once('/libraries/GameQ/Autoloader.php');
	$date = date("Y-m-d H:i:s"); //Year-month-day Hour:minute:second
	// Use GameQ Libary to query the server
	$GameQ = new \GameQ\GameQ(); // Or is it is it just \GameQ\GameQ
	$GameQ->addServer([
		'id' => 'server', // Should replace with $sID
		'type' => $sType,
		'host' => ''.$sIP.':'.$sPort.'',
		'options' => [
			'query_port' => $sQPort
			]
	]);
	
	$results = $GameQ->process();
	$hostName = $results['server']['gq_hostname'];
	// Check if it's Online - TODO: Use Images (Green/Red/Yellow)(Maybe add as option in preferences
	if($results['server']['gq_online'] == '1')
	{
		$serverStatus = "Online"; // TODO - Replace with LAN
	}
	elseif($results['server']['gq_online'] == '0')
	{
		$serverStatus = "Offline"; // TODO - Replace with LAN
	}
	else
	{
		$serverStatus = "Unknown"; //TODO - Replace with LAN
	}
	$currentMap = $results['server']['map'];
	$gameDescr = $results['server']['game_descr'];
	$maxPlayers = $results['server']['max_players'];
	//$currentAi = $results['serv1']['num_bots']; // Our servers dont use bots
	$currentPlayers = $results['server']['num_players'];
	if($results['server']['password'] == '1')
	{
		$usePass = "Yes"; //TODO - Replace with LAN
	}
	else
	{
		$usePass = "No"; //TODO - Replace with LAN
	}
	$serverVersion = $results['server']['version'];
	
	$playersNameList = array();
	$playersArray = $results['server']['players'];
	
	foreach($playersArray as $player)
	{
		$playersNameList[] = $player['name'];
	}

	$playerList = implode(', ', $playersNameList);
	
	if($serverStatus == "Online")
	{
		$text = "Server Status: ".$serverStatus."<br />
			 Server Name: ".$hostName."<br />
			 Password Required: ".$usePass."<br />
			 Terrain: ".$currentMap."<br />
			 Mission: ".$gameDescr."<br />
			 Players: ".$currentPlayers."/".$maxPlayers."<br />
			 Game Version: ".$serverVersion."<br />
			 Current Players: <br />
			 ".$playerList;
	}
	elseif($serverStatus == "Offline")
	{
		$text = "Server Status: ".$serverStatus;
	}
	else
	{
		$text = "Server Status: Unknown";
	}
	// Get Query Info - Display different $pageTitle
	$pageTitle = $hostName.'::'.$serverStatus;
}
else // Else gqEnabled = 0 then check if cvcEnabled
{
	// 0 = off, 1 = on.
	if($cvcEnabled == 1)
	{
		// Display the $vCode - but must be rendered - check Voice plugin
		$pageTitle = $sName.' - '.$sType;
		$text = $tp->toHTML($vCode);
	}
	else
	{
		$text = "This server has no view set up at the moment"; //TODO - Replace with LAN
	}
}

// This will be removed once we get everything set up.
$text .= "Testing this code, no real feedback required. <br />
<br />
".$sID." - ".$sName." - ".$sType."<br />
Was it successful?";


e107::getRender()->tablerender($pageTitle, $text); // TODO - Replace With LAN
require_once(FOOTERF);
exit; 
?>