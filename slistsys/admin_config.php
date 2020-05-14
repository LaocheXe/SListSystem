<?php

// Generated e107 Plugin Admin Area 

require_once('../../class2.php');
if (!getperms('P')) 
{
	e107::redirect('admin');
	exit;
}

// e107::lan('slistsys',true);


class slistsys_adminArea extends e_admin_dispatcher
{

	protected $modes = array(	
	
		'main'	=> array(
			'controller' 	=> 'server_list_ui',
			'path' 			=> null,
			'ui' 			=> 'server_list_form_ui',
			'uipath' 		=> null
		),
		

	);	
	
	
	protected $adminMenu = array(

		'main/list'			=> array('caption'=> LAN_MANAGE, 'perm' => 'P'),
		'main/create'		=> array('caption'=> LAN_CREATE, 'perm' => 'P'),
			
		'main/prefs' 		=> array('caption'=> LAN_PREFS, 'perm' => 'P'),	

		// 'main/div0'      => array('divider'=> true),
		// 'main/custom'		=> array('caption'=> 'Custom Page', 'perm' => 'P'),
		
	);

	protected $adminMenuAliases = array(
		'main/edit'	=> 'main/list'				
	);	
	
	protected $menuTitle = 'Server List System';
}




				
class server_list_ui extends e_admin_ui
{
			
		protected $pluginTitle		= 'Server List System';
		protected $pluginName		= 'slistsys';
	//	protected $eventName		= 'slistsys-server_list'; // remove comment to enable event triggers in admin. 		
		protected $table			= 'server_list';
		protected $pid				= 'server_id';
		protected $perPage			= 10; 
		protected $batchDelete		= true;
		protected $batchExport     = true;
		protected $batchCopy		= true;

	//	protected $sortField		= 'somefield_order';
	//	protected $sortParent      = 'somefield_parent';
	//	protected $treePrefix      = 'somefield_title';

		protected $tabs				= array('Server Details','Query Details','Viewer Details','Custum Link'); // Use 'tab'=>0  OR 'tab'=>1 in the $fields below to enable. 
		
	//	protected $listQry      	= "SELECT * FROM `#tableName` WHERE field != '' "; // Example Custom Query. LEFT JOINS allowed. Should be without any Order or Limit.
	
		protected $listOrder		= 'server_id DESC';
	// TODO - Replace WITH LANS!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		protected $fields 		= array (
			'checkboxes'              => array (  'title' => '',  'type' => null,  'data' => null,  'width' => '5%',  'thclass' => 'center',  'forced' => true,  'class' => 'center',  'toggle' => 'e-multiselect',  'readParms' =>  array (),  'writeParms' =>  array (),),
			'server_id'               => array (  'title' => LAN_ID,  'data' => 'int',  'width' => '5%',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'server_name'             => array (  'title' => LAN_TITLE,  'type' => 'text', 'tab' => 0, 'data' => 'str',  'width' => 'auto',  'filter' => true,  'inline' => true,  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'server_type'             => array (  'title' => LAN_TYPE,  'type' => 'dropdown', 'tab' => 0, 'data' => 'str',  'width' => 'auto',  'batch' => true,  'filter' => true,  'inline' => true,  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'server_ip'               => array (  'title' => LAN_IP,  'type' => 'text', 'tab' => 0, 'data' => 'str',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'server_port'             => array (  'title' => 'Port',  'type' => 'text', 'tab' => 0, 'data' => 'int',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'server_password'         => array (  'title' => 'Password',  'type' => 'text', 'tab' => 0, 'data' => 'str',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'server_qport'            => array (  'title' => 'Query Port',  'type' => 'text', 'tab' => 1, 'data' => 'int',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'server_qname'            => array (  'title' => 'Query User',  'type' => 'text', 'tab' => 1, 'data' => 'str',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'server_qpass'            => array (  'title' => 'Query Passwrod',  'type' => 'text', 'tab' => 1, 'data' => 'str',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'server_enable_gq'        => array (  'title' => 'Use GameQ',  'type' => 'boolean', 'tab' => 2, 'data' => 'int',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'server_enable_sc'        => array (  'title' => 'Join Link',  'type' => 'boolean', 'tab' => 3, 'data' => 'int',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'server_sc'               => array (  'title' => 'Join Link Code',  'type' => 'textarea', 'tab' => 3, 'data' => 'str',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'server_enable_vc'        => array (  'title' => 'Custom Viewer',  'type' => 'boolean', 'tab' => 2, 'data' => 'int',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'server_viewer_cc'        => array (  'title' => 'Custom Viewer Code',  'type' => 'textarea', 'tab' => 2, 'data' => 'str',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'server_sef'			  => array (  'title' => LAN_SEFURL, 'type' => 'text', 'tab' => 0, 'batch'=>true, 'inline'=>true, 'noedit'=>false, 'data' => 'str', 'width' => 'auto', 'help' => LAN_eWL_ADMIN_SEF, 'readParms' => '', 'writeParms' => 'sef=server_name&size=xxlarge', 'class' => 'left', 'thclass' => 'left',  ),
			'options'                 => array (  'title' => LAN_OPTIONS,  'type' => null,  'data' => null,  'width' => '10%',  'thclass' => 'center last',  'class' => 'center last',  'forced' => true,  'readParms' =>  array (),  'writeParms' =>  array (),),
		);		
		
		protected $fieldpref = array('server_name', 'server_type', 'server_enable_gq');
		

	//	protected $preftabs        = array('General', 'Other' );
		protected $prefs = array(
			'MenuPrefs'		=> array('title'=> 'MenuPrefs', 'tab'=>0, 'type'=>'text', 'data' => 'str', 'help'=>'', 'writeParms' => array()),
		); 

	
		public function init()
		{
			// This code may be removed once plugin development is complete. 
			if(!e107::isInstalled('slistsys'))
			{
				e107::getMessage()->addWarning("This plugin is not yet installed. Saving and loading of preference or table data will fail.");
			}
			
			// Lets Try to get the protocols (GameQ Identifier)
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
			
			$this->serverType['other'] = "Other"; // TODO - Replace With LAN
			
			foreach ($protocols AS $gameq => $info)
			{
				$serverType = $info['name'];
				$this->serverType[$gameq] = $serverType;
			}
 
			$this->fields['server_type']['writeParms'] = $this->serverType;
			//$this->fields['server_type']['writeParms']['optArray'] = array('server_type_0','server_type_1', 'server_type_2'); // Example Drop-down array.
		}

		
		// ------- Customize Create --------
		
		public function beforeCreate($new_data,$old_data)
		{	
			if(!empty($new_data['server_name']))
			{
				$new_data['server_name'] = trim(e107::getParser()->toText($new_data['server_name']));
			}
			
			if(empty($new_data['server_sef']))
			{
				$new_data['server_sef'] = eHelper::title2sef($new_data['server_name']);
			}
			else
			{
				$new_data['server_sef'] = eHelper::title2sef($new_data['server_sef']);
			}
			
			return $new_data;
		}
	
		public function afterCreate($new_data, $old_data, $id)
		{
			// do something
		}

		public function onCreateError($new_data, $old_data)
		{
			// do something		
		}		
		
		
		// ------- Customize Update --------
		
		public function beforeUpdate($new_data, $old_data, $id)
		{
			if(!empty($new_data['server_name']))
			{
				$new_data['server_name'] = trim(e107::getParser()->toText($new_data['server_name']));
			}
			
			if(isset($new_data['server_sef']) && empty($new_data['server_sef']) && !empty($new_data['server_name']))
			{
				$new_data['server_sef'] = eHelper::title2sef($new_data['server_name']);
			}
			elseif(!empty($new_data['server_sef']))
			{
				$new_data['server_sef'] = eHelper::title2sef($new_data['server_sef']);
			}
			return $new_data;
		}

		public function afterUpdate($new_data, $old_data, $id)
		{
			// do something	
		}
		
		public function onUpdateError($new_data, $old_data, $id)
		{
			// do something		
		}		
		
		// left-panel help menu area. (replaces e_help.php used in old plugins)
		public function renderHelp()
		{
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
			
			// Lets check to see if SEF is enabled
			$sefActive = e107::getPref('e_url_list');
			$checkIsIt = $sefActive['slistsys'];
			
			if($checkIsIt == 'slistsys')
			{
				$gameQlist = '/gameq';
			}
			else
			{
				$gameQlist = '{e_PLUGIN}slistsys/supported.php';
			}
			
			$caption = LAN_HELP;
			// Lets Count
			//$text = 'Some help text';
			// TODO - Replace With LAN!!!!!!!!
			$text = 'GameQ v3 Supports Up To ('.count($protocols).') Servers<br />
			 <a href="'.$gameQlist.'" target="_blank">Click Here</a> for the full list.<br /><br />
			 You dont have to use GameQ to list your servers, just make sure you have<br />
			 GameQ Off, and have Custom Viewer On, and put in your own custom html code<br />
			 in the Custom Viewer Code area.';

			return array('caption'=>$caption,'text'=> $text);

		}
			
	/*	
		// optional - a custom page.  
		public function customPage()
		{
			$text = 'Hello World!';
			$otherField  = $this->getController()->getFieldVar('other_field_name');
			return $text;
			
		}
		
	
		
		
	*/
			
}
				


class server_list_form_ui extends e_admin_form_ui
{

}		
		
		
new slistsys_adminArea();

require_once(e_ADMIN."auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN."footer.php");
exit;

