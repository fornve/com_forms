<?php

class Form_Field_Data extends Entity
{
	protected $table_name = '#__form_field_data';
	protected $schema = array( 'id', 'form_data', 'field', 'data' );
	
	public static function retrieve( $id )
	{
		return parent::retrieve( $id, __CLASS__ );
	}

	public static function formDataCollection( $form_data_id )
	{
		$entity = new Entity();
		$query = "SELECT * FROM #__form_field_data WHERE form_data = ?";

		return $entity->collection( $query, $form_data_id, __CLASS__ );	
	} 
}
