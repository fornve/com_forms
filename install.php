<?php

function com_install()
{
	$database =& JFactory::getDBO();

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

