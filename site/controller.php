<?php

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.application.component.controller');

/**
 * Content Component Controller
 *
 * @package		Joomla
 * @subpackage	Content
 * @since 1.5
 */
class ContentController extends JController
{
	function display()
	{
		$form_fields = explode( ',', JRequest::getVar( 'form_fields' ) );
		
		if( !empty( $form_fields ) )
		{
			$data = array();
			
			foreach( $form_fields as $field )
			{
				$data[ $field ][ 'text' ] = trim( strip_tags( JRequest::getVar( $field .'_text' ) ) );
				$data[ $field ][ 'data' ] = trim( strip_tags( JRequest::getVar( $field ) ) );
				
				if( empty( $data[ $field ][ 'text' ] ) )
				{
					unset( $data[ $field ] );
				}
			}
			
			$form = new Forms_Data();
			$form->data = serialize( $data );
			$form->name = trim( JRequest::getVar( 'form_name' ) );
			$form->created = time();
			$form->ip = $_SERVER[ 'REMOTE_ADDR' ];
			$form->Save();
			
			//"CREATE TABLE jos_forms_data ( id serial, name varchar(255), created int(10), data text )";
			$mailto = trim( JRequest::getVar( 'mailto' ) );
			
			if( !empty( $mailto ) )
			{
				//get all super administrator
				$query = 'SELECT name, email, sendEmail' .
						' FROM #__users' .
						' WHERE LOWER( usertype ) = "super administrator"';
				$db	=& JFactory::getDBO();
				$db->setQuery( $query );
				$rows = $db->loadObjectList();

				// Send email to user
				if ( ! $mailfrom  || ! $fromname ) {
					$fromname = $rows[0]->name;
					$mailfrom = $rows[0]->email;
				}
				
				$subject = "Form {$form->name} submission.";
				$message = self::_buildMessage( $data );
				
				JUtility::sendMail( $mailfrom, $fromname, $mailto, $subject, $message, true );
			}
		
			$uri = JRequest::getVar( 'return_url' );

			if( empty( $uri ) )
			{	
				$uri = JRequest::getVar( "uri" );
			
				if( strpos( $uri, '?' ) === false )
				{
					$uri = JRoute::_( $uri ."?return=1" );
				}
				else
				{
					$uri = JRoute::_( $uri ."&return=1" );
				}
			}


			header( "Location: {$uri}" );
			exit;
		}
	}
	
	protected static function _buildMessage( $data )
	{
		$message = '';
		var_dump( $data );
		if( !empty( $data ) ) foreach( $data as $field )
		{
			$message .= "<tr><th align='left'>{$field['text']}</th><td>{$field['data']}</td></tr>";
		}
		
		return "<html><body><table>{$message}</table></body></html>";
	}
}
