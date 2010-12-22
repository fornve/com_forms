<?php defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class formsViewEdit extends JView
{
	function display()
	{
		$this->assign( 'form', $this->form );
		parent::display();
	}
}
