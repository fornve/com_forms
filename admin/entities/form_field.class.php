<?php

class Form_Field extends Form
{
	protected $table_name = "#__form_field";
	protected $schema = array( 'id', 'form', 'name', 'type', 'length', 'sort_order' );

	/*
	 * Data assigned
	 */
	public $data;

	public static function retrieve( $id )
	{
		$object = parent::retrieve( $id, __CLASS__ );

		if ( !$object )
		{
			return null;
		}

		$object->validations = Field_Validation::fieldCollection( $object->id );
		$object->options = Field_Options::fieldCollection( $object->id );

		return $object;
	} 

	public static function formCollection( $form_id )
	{
		$entity = new Entity();
		$query = "SELECT id, sort_order FROM #__form_field WHERE form = ?";

		$collection = $entity->collection( $query, $form_id, __CLASS__ );	
		$fields = array();

		if( $collection ) foreach( $collection as $item )
		{
			$fields[ $item->sort_order ] = self::retrieve( $item->id );
		}

		return $fields;
	} 
}
