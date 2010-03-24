<?php

function com_install()
{
	$database =& JFactory::getDBO();
	$database->setQuery( "CREATE TABLE #__forms_data ( id serial, created int(10), ip varchar(32), name varchar(255), data text )" );
	$database->Query();
}

