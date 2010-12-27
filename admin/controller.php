<?php
/**
 * @version		$Id: controller.php 11633 2009-02-19 23:59:09Z willebil $
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

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport('joomla.application.component.controller');

/**
 * Content Component Controller
 *
 * @package		Joomla
 * @subpackage	Forms
 * @since 1.5
 */
class FormsController extends JController
{
	public function Index()
	{
	/*	$form_name = JRequest::getVar( 'form_name' ) ? urldecode( JRequest::getVar( 'form_name' ) ) : '';
		$delete = JRequest::getInt( 'delete' );
		$delete = Forms_Data::Retrieve( $delete );
		
		if( $delete )
		{
			$delete->Delete();
		}*/
		
		$view	= &$this->getView( 'index' );
	//	$view->groups 	= Forms_Data::FormGroupsCollection();
	//	$view->forms	= Forms_Data::FormGroupCollection( $form_name );
//		$view->selected_form = $form_name;
		$view->Display();
	}

	public function Edit_Form( $id = null )
	{
		global $mainframe;

		$post = JRequest::get( 'post' );
		$task = JRequest::getCmd( 'task' );

		if( $id )
		{
			$form = Form::retrieve( $id );
		}

		if( !$id || !$form )
		{
			$form = new Form();
		}

		if( $post && $task == 'save_form' || $task == 'apply_form' )
		{
			$form->name = $post[ 'name' ];
			$form->description = strip_tags( $post['description'], '<a>' );
			$form->save();
		}

		if( $task == 'save_form' )
		{
			$mainframe->redirect('index.php?option=com_forms' );
		}

		$view = $this->getView( 'edit' );
		$view->form = $form;
		$view->display();
	} 

	public function Delete_Form( $id = null )
	{
		global $mainframe;

		$form = Form::retrieve( $id );	

		if( $form->id > 0 )
		{
			$form->delete();
		}

		$mainframe->redirect('index.php?option=com_forms' );
	} 

	function Form_Data()
	{
		$form = Form::Retrieve( JRequest::getInt( 'id' ) );
		
		$view	= &$this->getView( 'index' );
		$view->form = $form;
		$view->data	= unserialize( $form->data );
		$view->Display( 'form' );
	}
	
	function Form_Data_CSV()
	{
		$form = Forms_Data::Retrieve( JRequest::getInt( 'id' ) );

		header( "Content-type: text/csv" );
		header( 'Content-Disposition: attachment; filename="'. "Form_{$form->name} ". date( "Y-m-d_H-i" ) .'.csv"' );
		
		$data = unserialize( $form->data );
		echo "[name],[data]\n";
		if( $data ) foreach( $data as $fiel_name => $field )
		{
			if( !empty( $field['text'] ) )
			{
				echo "\"{$field['text']}\",\"{$field['data']}\"\n";
			}
		}
		
		exit;
	}
	
	function Group_CSV()
	{
		$group = urldecode( JRequest::getVar( 'group' ) );
		
		header( "Content-type: text/csv" );
		header( 'Content-Disposition: attachment; filename="'. "{$group}_". date( "d-m-Y_H-i" ) .'.csv"' );
		
		$forms = Forms_Data::FormGroupCollection( $group );
		
		if( $forms )
		{
			$start = true;
			
			foreach( $forms as $form )
			{
				$data = unserialize( $form->data );
				$data_line = null;

				if( $data ) foreach( $data as $field_name => $field )
				{
					// generate header
					if( $start )
					{
						$data_header[] = "\"{$field_name}\"";
					}
					
					if( !empty( $field['text'] ) )
					{
						$data_line[] = "\"{$field['data']}\"";
					}
				}
				
				if( $start )
				{
					$data_header	= implode( ',', $data_header );
					echo "\"Date\",\"IP\",{$data_header}\n";
					$start = false;
				}
				
				if( $data_line )
				{
					$data_line		= implode( ',', $data_line );
					echo "\"". date( "d/m/Y H:i:s", $form->created ) ."\",\"{$form->ip}\",{$data_line}\n";
				}
			}
		}
		exit;
	}
	
	function All_CSV()
	{
		$group = urldecode( JRequest::getInt( 'group' ) );
		
		header( "Content-type: text/csv" );
		header( 'Content-Disposition: attachment; filename="'. "All_Forms_". date( "d-m-Y_H-i" ) .'.csv"' );
		
		$forms = Forms_Data::GetAll( 'Forms_Data' );
		
		if( $forms )
		{
			$start = true;
			
			foreach( $forms as $form )
			{
				$data = unserialize( $form->data );
				$data_line = null;

				if( $data )
				{
					$line = array();
					$line[ 'date' ] = $form->created;
					$line[ 'name' ] = $form->name;
					$line[ 'ip' ] = $form->ip;
					
					foreach( $data as $field_name => $field )
					{
						// generate header
						$all_fields[ $field_name ] = $field_name;
						
						$line[ $field_name ] = "\"{$field['data']}\"";
						
					}
			
					
					$lines[] = $line;
				}
			}

			if( $lines ) foreach( $lines as $line )
			{
				$data_line = array();
				
				foreach( $all_fields as $field )
				{
					if( empty( $data_header[ $field ] ) )
					{
						$data_header[ $field ]	= "\"{$field}\"";
					}
					
					if( empty( $data_line[ $field ] ) )
					{
						$data_line[ $field ] = $line[$field];
					}
				}

				if( $start )
				{
					$data_header	= implode( ',', $data_header );
					echo "\"Form\",\"Date\",\"IP\",{$data_header}\n";
					$start = false;
				}

				$data_line		= implode( ',', $data_line );
				echo "\"{$line['name']}\",\"". date( "d/m/Y H:i:s", $line['date'] ) ."\",\"{$line['ip']}\",{$data_line}\n";
			}
		}
		exit;
	}
}
