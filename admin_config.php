<?php

// Generated e107 Plugin Admin Area 

require_once('../../class2.php');
if (!getperms('P')) 
{
	e107::redirect('admin');
	exit;
}

// e107::lan('cloudfront',true);


class cloudfront_adminArea extends e_admin_dispatcher
{

	protected $modes = array(	
	
		'main'	=> array(
			'controller' 	=> 'cloudfront_ui',
			'path' 			=> null,
			'ui' 			=> 'cloudfront_form_ui',
			'uipath' 		=> null
		),
		

	);	
	
	
	protected $adminMenu = array(
			
		'main/prefs' 		=> array('caption'=> LAN_PREFS, 'perm' => 'P'),	

		// 'main/div0'      => array('divider'=> true),
		// 'main/custom'		=> array('caption'=> 'Custom Page', 'perm' => 'P'),
		
	);

	protected $adminMenuAliases = array(
		'main/edit'	=> 'main/list'				
	);	
	
	protected $menuTitle = 'Cloudfront';
}




				
class cloudfront_ui extends e_admin_ui
{
			
		protected $pluginTitle		= 'Cloudfront';
		protected $pluginName		= 'cloudfront';
	//	protected $eventName		= 'cloudfront-'; // remove comment to enable event triggers in admin. 		
		protected $table			= '';
		protected $pid				= '';
		protected $perPage			= 10; 
		protected $batchDelete		= true;
		protected $batchExport     = true;
		protected $batchCopy		= true;

	//	protected $sortField		= 'somefield_order';
	//	protected $sortParent      = 'somefield_parent';
	//	protected $treePrefix      = 'somefield_title';

	//	protected $tabs				= array('Tabl 1','Tab 2'); // Use 'tab'=>0  OR 'tab'=>1 in the $fields below to enable. 
		
	//	protected $listQry      	= "SELECT * FROM `#tableName` WHERE field != '' "; // Example Custom Query. LEFT JOINS allowed. Should be without any Order or Limit.
	
		protected $listOrder		= ' DESC';
	
		protected $fields 		= array (
		);		
		
		protected $fieldpref = array();
		

	//	protected $preftabs        = array('General', 'Other' );
		protected $prefs = array(
			'active'		=> array('title'=> 'Active', 'tab'=>0, 'type'=>'boolean', 'data' => 'str', 'help'=>'', 'writeParms' => []),
			'cdn'		    => array('title'=> 'Distribution domain name', 'tab'=>0, 'type'=>'text', 'data' => 'str', 'help'=>'eg. xxxxxxxx.cloudfront.net', 'writeParms' => ['placholder'=>'xxxxxxxx.cloudfront.net', 'size'=>'xxlarge']),
		); 

	
		public function init()
		{
			// This code may be removed once plugin development is complete. 
			if(!e107::isInstalled('cloudfront'))
			{
				e107::getMessage()->addWarning("This plugin is not yet installed. Saving and loading of preference or table data will fail.");
			}

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
			$text = "If you see CORS errors in the browser console - try modifying Cloudfront's 
			<b>Response headers policy</b> (inside the Behaviors settings) to one of the following: 
			<ul style='margin-top:7px'>
				<li><b>CORS-With-Preflight</b></li>
				<li><b>CORS-with-preflight-and-SecurityHead</b></li>
			</ul>
				
			Once the site is functioning correctly, enable e107's JS/CSS <a href='".e_ADMIN."cache.php'>caching</a> for improved performance.";

			return array('caption'=>$caption,'text'=> $text);

		}

		public function beforePrefsSave($new_data, $old_data)
		{
			$cache = e107::getCache();
			$cache->clearAll('js');
			$cache->clearAll('css');
			$cache->clearAll('browser');
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
				


class cloudfront_form_ui extends e_admin_form_ui
{

}		
		
		
new cloudfront_adminArea();

require_once(e_ADMIN."auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN."footer.php");
exit;

