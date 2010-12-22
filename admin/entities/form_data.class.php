<?php

class Form_Data extends Entity
{
	protected $table_name = '#__form_data';
	protected $schema = array( 'id', 'form', 'created', 'ip' );
	
	public static function retrieve( $id )
	{
		$object = parent::retrieve( $id, __CLASS__ );

		if ( !$object )
		{
			return false;
		}

		$object->form = Field::formCollection( $object->id );
		$object->data = Form_Field_Data::formDataCollection( $object->id );
		
		// Assign data to fields
		if( $object->data ) foreach( $object->data as $field_data )
		{
			$object->form->assignData( $field_data );
		}

		return $object;
	}

	public function save()
	{
		parent::save();

		if( $object->data ) foreach( $object->data as $field_data )
		{
			$field_data->form_data = $this->id;
			$field_data->save();
		}
	} 
}
