<?php
/**
 * @version		$Id: view.php 11625 2009-02-15 15:32:42Z kdevine $
 * @package		Joomla
 * @subpackage	Content
 * @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant to the
 * GNU General Public License, and as distributed it includes or is derivative
 * of works licensed under the GNU General Public License or other free or open
 * source software licenses. See COPYRIGHT.php for copyright notices and
 * details.
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

/**
 * HTML Article Element View class for the Content component
 *
 * @package		Joomla
 * @subpackage	Content
 * @since 1.5
 */
class formsViewIndex extends JView
{
	function display()
	{
		$forms = Form::getAll();

		$this->assign( 'selected_form', JRequest::getVar( 'form_name' ) );
		$this->assign( 'groups',	$this->groups );
		$this->assign( 'forms',		$forms );
		$this->assign( 'selected_form', $this->selected_form );
		//$this->assign( 'pagination',  );

		parent::display();
	}
}
