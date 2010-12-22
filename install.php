<?php

function com_install()
{
	if( !class_exists( 'Entity' ) )
	{
		ob_start();
		?>
			<table>
				<tr>
					<td>
						<a href="http://extensions.joomla.org/extensions/miscellaneous/development/11101">Missing DAO plugin</a>. Please install it and enable first.
					</td>
				</tr>
			</table>

		<?php
	
		$html = ob_get_contents();
		@ob_end_clean();

		echo $html;

		return false;
	}

	try
	{
		$database = JFactory::getDBO();

		$database->setQuery( "CREATE TABLE #__form ( id serial, name varchar(255) )" );
		$database->Query();

		$database->setQuery( "CREATE TABLE #__form_field ( id serial, form int(10), name varchar(255), type varchar(10), length int(10), sort_order int(10) )" );
		$database->Query();

		$database->setQuery( "CREATE TABLE #__form_option ( id serial, field int(10), name varchar(255), value varchar(255) )" );
		$database->Query();

		$database->setQuery( "CREATE TABLE #__form_validation ( id serial, field int(10), type varchar(10), vars text )" );
		$database->Query();

		$database->setQuery( "CREATE TABLE #__form_data ( id serial, form int(10), created int(10), ip varchar(32), field int(10), data text )" );
		$database->Query();

		$database->setQuery( "CREATE TABLE #__form_field_data ( id serial, form_data int(10), field varchar(10), data text )" );
		$database->Query();
	}
	catch( Exception $e )
	{
		echo 'Database update error: '. $e->getMessage();	

		return false;
	}

}

