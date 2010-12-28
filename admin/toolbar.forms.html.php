<?php defined( '_JEXEC' ) or die( 'Restricted access' );

/**
* @package		Joomla
* @subpackage	Forms
*/
class TOOLBAR_forms
{
	function edit_form($edit)
	{
		$cid = JRequest::getVar( 'cid', array(0), '', 'array' );
		$cid = intval($cid[0]);

		$text = ( $edit ? JText::_( 'EDIT' ) : JText::_( 'NEW' ) );

		JToolBarHelper::title( JText::_( 'Form' ).': <small><small>[ '. $text.' ]</small></small>', 'addedit.png' );
		JToolBarHelper::preview( 'index.php?option=com_forms&id='.$cid.'&tmpl=component', true );
		JToolBarHelper::save( 'save_form' );
		JToolBarHelper::apply( 'apply_form' );
		if ( $edit ) {
			// for existing articles the button is renamed `close`
			JToolBarHelper::cancel( 'cancel', 'Close' );
		} else {
			JToolBarHelper::cancel();
		}
		JToolBarHelper::help( 'screen.forms.edit_form' );
	}

	function edit_field()
	{
		JToolBarHelper::title( JText::_( 'Form field' ), 'addedit.png' );
		JToolBarHelper::apply( 'apply_field' );
		JToolBarHelper::save( 'save_field' );
		JToolBarHelper::cancel();
		JToolBarHelper::help( 'screen.forms.edit_field' );
	} 

	function copy()
	{
		JToolBarHelper::title( JText::_( 'Copy Form' ), 'copy_f2.png' );
		JToolBarHelper::custom( 'copysave', 'save.png', 'save_f2.png', 'Save', false );
		JToolBarHelper::cancel();
	}

	function index()
	{
		global $filter_state;

		JToolBarHelper::title( JText::_( 'Form Manager' ), 'article.png' );
		if ($filter_state == 'A' || $filter_state == NULL) {
			JToolBarHelper::unarchiveList();
		}
		if ($filter_state != 'A') {
			JToolBarHelper::archiveList();
		}
		JToolBarHelper::publishList();
		JToolBarHelper::unpublishList();
//		JToolBarHelper::customX( 'movesect', 'move.png', 'move_f2.png', 'Move' );
		JToolBarHelper::customX( 'copy', 'copy.png', 'copy_f2.png', 'Copy' );
		JToolBarHelper::trash();
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX( 'edit_form' );
		JToolBarHelper::preferences('com_forms', '550');
		JToolBarHelper::help( 'screen.forms' );
	}
}
