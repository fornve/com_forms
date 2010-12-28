<?php

class Field_Validation extends Entity
{
	protected $table_name = "#__field_validation";
	protected $schema = array( 'id', 'field', 'type', 'vars' );

	public static function retrieve( $id )
	{
		return parent::retrieve( $id, __CLASS__ );
	} 

	public static function fieldCollection( $field_id )
	{
		$entity = new Entity();
		$query = "SELECT * FROM #__field_validation WHERE field = ?";

		return $entity->collection( $query, $field_id, __CLASS__ );	
	} 
}
