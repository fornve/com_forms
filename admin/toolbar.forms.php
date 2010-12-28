<?php defined( '_JEXEC' ) or die( 'Restricted access' );

require_once( JApplicationHelper::getPath( 'toolbar_html' ) );

$task = JRequest::getCmd( 'task' );

switch ($task)
{
	case 'edit_form':
	case 'apply_form':
		TOOLBAR_forms::edit_form(false);
		break;

	case 'edit_field':
	case 'apply_field':
		TOOLBAR_forms::edit_field();
		break;

	case 'copy':
		TOOLBAR_forms::copy();
		break;

	default:
		TOOLBAR_forms::index();
		break;
}
