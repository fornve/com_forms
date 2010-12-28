<?php defined('_JEXEC') or die('Restricted access');

if( !class_exists( 'entity' ) )
	die( "This controller requires DAO plugin: http://extensions.joomla.org/extensions/tools/database-tools/11101" );

require_once( JPATH_COMPONENT.DS.'controller.php' );

plgSystemDao::addClassPath( JPATH_COMPONENT . DS . 'entities/' );

// Set the helper directory

$controller = new FormsController();
$task = JRequest::getCmd( 'task' );
$args = JRequest::get( null, 'id' );
$id = $args[ 'id' ];

switch (strtolower($task))
{
	case( 'edit_form' ):
	case( 'save_form' ):
	case( 'apply_form' ):
		$controller->Edit_Form( $id );
		break;
			
	case( 'delete_form' ):
		$controller->Delete_Form( $id );
		break;

	case( 'edit_field' ):
	case( 'save_field' ):
	case( 'apply_field' ):
		$controller->Edit_Field( $id );
		break;
			
	case( 'delete_field' ):
		$controller->Delete_Field( $id );
		break;
	
	case( 'form_data' ):
		$controller->Form_Data();
		break;
		
	case( 'form_data_csv' ):
		$controller->Form_Data_CSV();
		break;
	
	default :
		$controller->Index();
		break;
}
