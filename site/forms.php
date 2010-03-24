<?php defined('_JEXEC') or die('Restricted access');
//error_reporting( E_ALL );
ini_set( 'display_errors', true );
if( !class_exists( 'entity' ) )
	die( "This controller requires DAO plugin: http://extensions.joomla.org/extensions/tools/database-tools/11101" );

// Require the com_content helper library
require_once( JPATH_COMPONENT.DS.'controller.php');

plgSystemDao::addClassPath( JPATH_COMPONENT . DS . 'entities/' );

// Component Helper
jimport('joomla.application.component.helper');

// Create the controller
$controller = new ContentController();

// Register Extra tasks
$controller->registerTask( 'new'  , 	'edit' );
$controller->registerTask( 'apply', 	'save' );
$controller->registerTask( 'apply_new', 'save' );

// Perform the Request task
$controller->execute( JRequest::getVar('task', null, 'default', 'cmd') );
$controller->redirect();
