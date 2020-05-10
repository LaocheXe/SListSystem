<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2009 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * Sitelinks configuration module - gsitemap
 *
 * $Source: /cvs_backup/e107_0.8/e107_plugins/slistsys/e_sitelink.php,v $
 * $Revision$
 * $Date$
 * $Author$
 *
*/

if (!defined('e107_INIT')) { exit; }
/*if(!e107::isInstalled('slistsys'))
{ 
	return;
}*/


// Disable For Now Until We Need It
/*
class slistsys_sitelink // include plugin-folder in the name.
{
	function config()
	{
		global $pref;
		
		$links = array();
			
		$links[] = array(
			'name'			=> 'Server List', // TODO - Replace with LAN
			'function'		=> "serverLIST"
		);	
		
		return $links;
	}
	

	function serverLIST()
	{
		$sql = e107::getDb();
		$tp = e107::getParser();
		
		// Example
		//return $tp->parseTemplate("{VOICE_EXE}",true);	
	}
*/	
}
