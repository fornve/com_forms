<?php defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');
jimport('joomla.html.pane');

class formsViewEdit extends JView
{
	function form()
	{
		$document = JFactory::getDocument();
		$document->addScript( 'components/com_forms/assets/forms.js' );

		$this->assign( 'form', $this->form );
		$this->assign( 'pane', JPane::getInstance( 'sliders', array( 'allowAllClose' => true ) ) );
		$this->setLayout( 'form' );
		parent::display();
	}

	function field()
	{
		$this->assign( 'field', $this->field );
		$this->assign( 'pane', JPane::getInstance( 'sliders', array( 'allowAllClose' => true ) ) );
		$this->setLayout( 'field' );
		parent::display();
	} 
}
