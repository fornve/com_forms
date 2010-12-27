<?php defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');
jimport('joomla.html.pane');

class formsViewEdit extends JView
{
	function display()
	{
		$document = JFactory::getDocument();
		$document->addScript( 'components/com_forms/assets/forms.js' );

		$this->assign( 'form', $this->form );
		$this->assign( 'pane', JPane::getInstance( 'sliders', array( 'allowAllClose' => true ) ) );
		parent::display();
	}
}
