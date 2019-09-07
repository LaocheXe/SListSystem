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
			'controller' 	=> 'serverlist_ui',
			'path' 			=> null,
			'ui' 			=> 'serverlist_form_ui',
			'uipath' 		=> null
		),
		

		'cat'	=> array(
			'controller' 	=> 'serverlist_cat_ui',
			'path' 			=> null,
			'ui' 			=> 'serverlist_cat_form_ui',
			'uipath' 		=> null
		),
		

		'other1'	=> array(
			'controller' 	=> 'serverlist_submission_ui',
			'path' 			=> null,
			'ui' 			=> 'serverlist_submission_form_ui',
			'uipath' 		=> null
		),
		

	);	
	
	
	protected $adminMenu = array(

		'main/list'			=> array('caption'=> LAN_MANAGE, 'perm' => 'P'),
		'main/create'		=> array('caption'=> LAN_CREATE, 'perm' => 'P'),

		'cat/list'			=> array('caption'=> LAN_MANAGE, 'perm' => 'P'),
		'cat/create'		=> array('caption'=> LAN_CREATE, 'perm' => 'P'),

		'other1/list'			=> array('caption'=> LAN_MANAGE, 'perm' => 'P'),
		'other1/create'		=> array('caption'=> LAN_CREATE, 'perm' => 'P'),
			
		'main/prefs' 		=> array('caption'=> LAN_PREFS, 'perm' => 'P'),	

		// 'main/div0'      => array('divider'=> true),
		// 'main/custom'		=> array('caption'=> 'Custom Page', 'perm' => 'P'),
		
	);

	protected $adminMenuAliases = array(
		'main/edit'	=> 'main/list'				
	);	
	
	protected $menuTitle = 'Server List';
}




				
class serverlist_ui extends e_admin_ui
{
			
		protected $pluginTitle		= 'Server List';
		protected $pluginName		= 'slistsys';
	//	protected $eventName		= 'slistsys-serverlist'; // remove comment to enable event triggers in admin. 		
		protected $table			= 'serverlist';
		protected $pid				= 'server_id';
		protected $perPage			= 10; 
		protected $batchDelete		= true;
		protected $batchExport     = true;
		protected $batchCopy		= true;

	//	protected $sortField		= 'somefield_order';
	//	protected $sortParent      = 'somefield_parent';
	//	protected $treePrefix      = 'somefield_title';

	//	protected $tabs				= array('Tabl 1','Tab 2'); // Use 'tab'=>0  OR 'tab'=>1 in the $fields below to enable. 
		
	//	protected $listQry      	= "SELECT * FROM `#tableName` WHERE field != '' "; // Example Custom Query. LEFT JOINS allowed. Should be without any Order or Limit.
	
		protected $listOrder		= 'server_id DESC';
	
		protected $fields 		= array (
			'checkboxes'              => array (  'title' => '',  'type' => null,  'data' => null,  'width' => '5%',  'thclass' => 'center',  'forced' => true,  'class' => 'center',  'toggle' => 'e-multiselect',  'readParms' =>  array (),  'writeParms' =>  array (),),
			'server_id'               => array (  'title' => LAN_ID,  'data' => 'int',  'width' => '5%',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'servercat_id'            => array (  'title' => LAN_ID,  'type' => 'dropdown',  'data' => 'int',  'width' => '5%',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',  'filter' => false,  'batch' => false,),
			'server_name'             => array (  'title' => LAN_TITLE,  'type' => 'text',  'data' => 'int',  'width' => 'auto',  'inline' => true,  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'server_ip'               => array (  'title' => LAN_IP,  'type' => 'text',  'data' => 'str',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'server_port'             => array (  'title' => 'Port',  'type' => 'text',  'data' => 'str',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'server_pass'             => array (  'title' => 'Pass',  'type' => 'text',  'data' => 'str',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'server_gsid'             => array (  'title' => 'Gsid',  'type' => 'text',  'data' => 'str',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'server_enable_vcc'       => array (  'title' => 'Vcc',  'type' => 'boolean',  'data' => 'int',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'server_viewer_cc'        => array (  'title' => 'Cc',  'type' => 'textarea',  'data' => 'str',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'options'                 => array (  'title' => LAN_OPTIONS,  'type' => null,  'data' => null,  'width' => '10%',  'thclass' => 'center last',  'class' => 'center last',  'forced' => true,  'readParms' =>  array (),  'writeParms' =>  array (),),
		);		
		
		protected $fieldpref = array('server_name');
		

	//	protected $preftabs        = array('General', 'Other' );
		protected $prefs = array(
			'sl_cathdr'		=> array('title'=> 'Sl_cathdr', 'tab'=>0, 'type'=>'number', 'data' => 'str', 'help'=>'', 'writeParms' => array()),
			'sl_catftr'		=> array('title'=> 'Sl_catftr', 'tab'=>0, 'type'=>'number', 'data' => 'str', 'help'=>'', 'writeParms' => array()),
		); 

	
		public function init()
		{
			// This code may be removed once plugin development is complete. 
			if(!e107::isInstalled('slistsys'))
			{
				e107::getMessage()->addWarning("This plugin is not yet installed. Saving and loading of preference or table data will fail.");
			}
			
			// Set drop-down values (if any). 
			$this->fields['servercat_id']['writeParms']['optArray'] = array('servercat_id_0','servercat_id_1', 'servercat_id_2'); // Example Drop-down array. 
	
		}

		
		// ------- Customize Create --------
		
		public function beforeCreate($new_data,$old_data)
		{
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
			$caption = LAN_HELP;
			$text = 'Some help text';

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
				


class serverlist_form_ui extends e_admin_form_ui
{

}		
		

				
class serverlist_cat_ui extends e_admin_ui
{
			
		protected $pluginTitle		= 'Server List';
		protected $pluginName		= 'slistsys';
	//	protected $eventName		= 'slistsys-serverlist_cat'; // remove comment to enable event triggers in admin. 		
		protected $table			= 'serverlist_cat';
		protected $pid				= 'scat_id';
		protected $perPage			= 10; 
		protected $batchDelete		= true;
		protected $batchExport     = true;
		protected $batchCopy		= true;

	//	protected $sortField		= 'somefield_order';
	//	protected $sortParent      = 'somefield_parent';
	//	protected $treePrefix      = 'somefield_title';

	//	protected $tabs				= array('Tabl 1','Tab 2'); // Use 'tab'=>0  OR 'tab'=>1 in the $fields below to enable. 
		
	//	protected $listQry      	= "SELECT * FROM `#tableName` WHERE field != '' "; // Example Custom Query. LEFT JOINS allowed. Should be without any Order or Limit.
	
		protected $listOrder		= 'scat_id DESC';
	
		protected $fields 		= array (
			'checkboxes'              => array (  'title' => '',  'type' => null,  'data' => null,  'width' => '5%',  'thclass' => 'center',  'forced' => true,  'class' => 'center',  'toggle' => 'e-multiselect',  'readParms' =>  array (),  'writeParms' =>  array (),),
			'scat_id'                 => array (  'title' => LAN_ID,  'data' => 'int',  'width' => '5%',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'scat_name'               => array (  'title' => LAN_TITLE,  'type' => 'text',  'data' => 'int',  'width' => 'auto',  'inline' => true,  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'options'                 => array (  'title' => LAN_OPTIONS,  'type' => null,  'data' => null,  'width' => '10%',  'thclass' => 'center last',  'class' => 'center last',  'forced' => true,  'readParms' =>  array (),  'writeParms' =>  array (),),
		);		
		
		protected $fieldpref = array('scat_name');
		
	
		public function init()
		{
			// This code may be removed once plugin development is complete. 
			if(!e107::isInstalled('slistsys'))
			{
				e107::getMessage()->addWarning("This plugin is not yet installed. Saving and loading of preference or table data will fail.");
			}
			
			// Set drop-down values (if any). 
	
		}

		
		// ------- Customize Create --------
		
		public function beforeCreate($new_data,$old_data)
		{
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
			$caption = LAN_HELP;
			$text = 'Some help text';

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
				


class serverlist_cat_form_ui extends e_admin_form_ui
{

}		
		

				
class serverlist_submission_ui extends e_admin_ui
{
			
		protected $pluginTitle		= 'Server List';
		protected $pluginName		= 'slistsys';
	//	protected $eventName		= 'slistsys-serverlist_submission'; // remove comment to enable event triggers in admin. 		
		protected $table			= 'serverlist_submission';
		protected $pid				= 'submit_id';
		protected $perPage			= 10; 
		protected $batchDelete		= true;
		protected $batchExport     = true;
		protected $batchCopy		= true;

	//	protected $sortField		= 'somefield_order';
	//	protected $sortParent      = 'somefield_parent';
	//	protected $treePrefix      = 'somefield_title';

	//	protected $tabs				= array('Tabl 1','Tab 2'); // Use 'tab'=>0  OR 'tab'=>1 in the $fields below to enable. 
		
	//	protected $listQry      	= "SELECT * FROM `#tableName` WHERE field != '' "; // Example Custom Query. LEFT JOINS allowed. Should be without any Order or Limit.
	
		protected $listOrder		= 'submit_id DESC';
	
		protected $fields 		= array (
			'checkboxes'              => array (  'title' => '',  'type' => null,  'data' => null,  'width' => '5%',  'thclass' => 'center',  'forced' => true,  'class' => 'center',  'toggle' => 'e-multiselect',  'readParms' =>  array (),  'writeParms' =>  array (),),
			'submit_id'               => array (  'title' => LAN_ID,  'data' => 'int',  'width' => '5%',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			's_game'                  => array (  'title' => 'Game',  'type' => 'text',  'data' => 'int',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			's_ip'                    => array (  'title' => LAN_IP,  'type' => 'text',  'data' => 'str',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			's_port'                  => array (  'title' => 'Port',  'type' => 'text',  'data' => 'str',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			's_pass'                  => array (  'title' => 'Pass',  'type' => 'text',  'data' => 'str',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			's_gsid'                  => array (  'title' => 'Gsid',  'type' => 'text',  'data' => 'str',  'width' => 'auto',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'options'                 => array (  'title' => LAN_OPTIONS,  'type' => null,  'data' => null,  'width' => '10%',  'thclass' => 'center last',  'class' => 'center last',  'forced' => true,  'readParms' =>  array (),  'writeParms' =>  array (),),
		);		
		
		protected $fieldpref = array();
		
	
		public function init()
		{
			// This code may be removed once plugin development is complete. 
			if(!e107::isInstalled('slistsys'))
			{
				e107::getMessage()->addWarning("This plugin is not yet installed. Saving and loading of preference or table data will fail.");
			}
			
			// Set drop-down values (if any). 
	
		}

		
		// ------- Customize Create --------
		
		public function beforeCreate($new_data,$old_data)
		{
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
			$caption = LAN_HELP;
			$text = 'Some help text';

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
				


class serverlist_submission_form_ui extends e_admin_form_ui
{

}		
		
		
new slistsys_adminArea();

require_once(e_ADMIN."auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN."footer.php");
exit;

