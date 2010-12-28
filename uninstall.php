<?php

function com_uninstall()
{
	$database = JFactory::getDBO();

	$database->setQuery( "DROP TABLE #__form" );
	$database->Query();

	$database->setQuery( "DROP TABLE #__form_field" );
	$database->Query();

	$database->setQuery( "DROP TABLE #__field_option" );
	$database->Query();

	$database->setQuery( "DROP TABLE #__field_validation" );
	$database->Query();

	$database->setQuery( "DROP TABLE #__form_data" );
	$database->Query();

	$database->setQuery( "DROP TABLE #__form_field_data" );
	$database->Query();


} 
