<?php

class Field_Option extends Entity
{
	protected $table_name = "#__field_option";
	protected $schema = array( 'id', 'field', 'name', 'value' );

	public static function retrieve( $id )
	{
		return parent::retrieve( $id, __CLASS__ );
	} 

	public static function fieldCollection( $field_id )
	{
		$entity = new Entity();
		$query = "SELECT * FROM #__field_option WHERE field = ? ORDER BY name";

		return $entity->collection( $query, $field_id, __CLASS__ );	
	} 
}
