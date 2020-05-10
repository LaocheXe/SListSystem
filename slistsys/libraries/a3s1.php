<?php

require_once('GameQ/Autoloader.php');

// Testing for Server 1
$GameQ = new \GameQ\GameQ();
$GameQ->addServer([
	'id' => 'serv1',
	'type' => 'arma3',
	'host' => '66.187.70.186:5012',
	'options' => [
		'query_port' => 5013
	]
]);

//$results = $GameQ->requestData(); // This is a no no... outdated
$results = $GameQ->process(); // This is what is used

//$results['serv1']['gq_hostname'] = $hostName;
$hostName = $results['serv1']['gq_hostname'];
if($results['serv1']['gq_online'] == '1')
{
	$serverStatus = "Online";
}
elseif($results['serv1']['gq_online'] == '0')
{
	$serverStatus = "Offline";
}
else
{
	$serverStatus = "Unknown";
}
$currentMap = $results['serv1']['map'];
$gameDescr = $results['serv1']['game_descr'];
$maxPlayers = $results['serv1']['max_players'];
//$currentAi = $results['serv1']['num_bots']; // Our servers dont use bots
$currentPlayers = $results['serv1']['num_players'];
if($results['serv1']['password'] == '1')
{
	$usePass = "Yes";
}
else
{
	$usePass = "No";
}
$serverVersion = $results['serv1']['version'];
//$players = ;// it's an array of data - foreach player as players - html of player names, (cc jAY, BC Kin)
//$playersList = $results['serv1']['players']; // Shows Array -> [Number] -> ['name']
//$playersList['{NUMBER}']['name']
$playersNameList = array();
$playersArray = $results['serv1']['players'];

foreach($playersArray as $player)
{
	$playersNameList[] = $player['name'];
}

$playerList = implode(', ', $playersNameList);

//echo $playersNameList;

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
//foreach($playerNameList as $playerName)
//{
//	$text = $playerName . "<br />";
//}
//$text .= $playersList;


//print_r($hostName);
echo $text;

?>